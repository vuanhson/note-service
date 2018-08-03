@extends('layouts.app')

@section('content')

@if($msg!='nodata')
  <center><h3>
    Bookmarked Notes
  </h3></center>
@else
  <center><h3>No data</h3></center>
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
          {!! link_to_route('bookmark', 'Bookmark', ['id' => $note->id,'notebook_id'=>$note->notebook_id], ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
        @else
          {!! link_to_route('unbookmark', 'Unbookmark', ['id' => $note->id,'notebook_id'=>$note->notebook_id], ['class' => 'mdl-button mdl-js-button mdl-button--primary']) !!}
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


@endsection