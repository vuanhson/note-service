@extends('layouts.app')

@section('content')

@if($msg!='nodata')
  <center><h3>
    @foreach($notebooks as $notebook)
      @if ($notebook->id == $notebook_id)
        Notes in {{ $notebook->name }}
      @endif
    @endforeach
  </h3></center>
@else
  <center><h3>This notebook didn't contain any notes. <br/>Click + icon below to create new note.</h3></center>
@endif

<div class="mdl-grid">
@foreach ($notes as $note)
  <div class="mdl-cell mdl-cell--3-col">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">{{ $note->title }}</h2>
      </div>
      <div class="mdl-card__supporting-text">
        {{ str_limit($note->content, $limit = 150, $end = '...') }}
      </div>
      <div class="mdl-card__actions mdl-card--border" style="display: flex;">
        @if ($note->is_bookmark == 0)
          {!! link_to_route('bookmark', 'Bookmark', ['id' => $note->id,'notebook_id'=>$notebook_id], ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        @else
          {!! link_to_route('unbookmark', 'Unbookmark', ['id' => $note->id,'notebook_id'=>$notebook_id], ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        @endif  
          
        {!! link_to_route('note.edit', 'View', ['id' => $note->id], ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        {!! Form::open(['route' => ['note.destroy', $note->id], 'method' => 'delete']) !!}
          {!! Form::submit('Delete', ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endforeach
</div>


{{ $notes->links('pagination.default') }}


<!--add button-->
<button class="mdl-button show-dialog mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-button--floating-action">
  <i class="material-icons">add</i>
</button>

<!--Trigger that modal when click add button :))))))))))) -->
  <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Add new note</h4>
    <div class="mdl-dialog__content">
      {!! Form::open(['route' => 'note.store']) !!}
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                {!! form::label('title', 'Title',['class' => 'mdl-textfield__label']) !!}
                {!! form::text('title', old('title'), ['class' => 'mdl-textfield__input']) !!}
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                {!! form::label('content', 'Content',['class' => 'mdl-textfield__label']) !!}
                {!! form::textarea('content', old('content'), ['class' => 'mdl-textfield__input', 'type'=>'text','rows'=>'8']) !!}
            </div>
                {!! form::text('notebook_id', $notebook_id, ['class' => 'hidden']) !!}
            <div class="mdl-card__actions mdl-card--border">
              {!! form::submit('Create', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
              <button type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect close">Cancel</button>
            </div>
      {!! form::close() !!}
    </div>
  </dialog>
  
<script>
  var dialog = document.querySelector('dialog');
  var showDialogButton = document.querySelector('.show-dialog');
  if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
  }
  showDialogButton.addEventListener('click', function() {
    dialog.showModal();
  });
  dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
  });
</script>

@endsection