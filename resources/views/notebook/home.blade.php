@extends('layouts.app')

@section('content')


@if($msg!='nodata')
  <center><h3>{{ $user->name }}'s Notebooks</h3></center>
@else
  <center><h3>You don't have any notebooks. <br/>Click + icons below to create new notebook.</h3></center>
@endif

<div class="mdl-grid">
@foreach ($notebooks as $notebook)
  <div class="mdl-cell mdl-cell--3-col">
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">{{ $notebook->name }}</h2>
      </div>
      <div class="mdl-card__supporting-text">
        {{ str_limit($notebook->description, $limit = 150, $end = '...') }}
      </div>
      <div class="mdl-card__actions mdl-card--border" style="display: flex;">
        <a class="mdl-button mdl-js-button mdl-button--primary">
          Open
        </a>
        {!! link_to_route('home.edit', 'Edit', ['id' => $notebook->id], ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        {!! Form::open(['route' => ['home.destroy', $notebook->id], 'method' => 'delete']) !!}
          {!! Form::submit('Delete', ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endforeach
</div>
{{ $notebooks->links() }}


<!--add button-->
<button class="mdl-button show-dialog mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-button--floating-action">
  <i class="material-icons">add</i>
</button>

<!--Trigger that modal when click add button :))))))))))) -->
  <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Add new notebook</h4>
    <div class="mdl-dialog__content">
      {!! Form::open(['route' => 'home.store']) !!}
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                {!! form::label('name', 'Name',['class' => 'mdl-textfield__label']) !!}
                {!! form::text('name', old('name'), ['class' => 'mdl-textfield__input']) !!}
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                {!! form::label('description', 'Description',['class' => 'mdl-textfield__label']) !!}
                {!! form::textarea('description', old('description'), ['class' => 'mdl-textfield__input', 'type'=>'text','rows'=>'8']) !!}
            </div>
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