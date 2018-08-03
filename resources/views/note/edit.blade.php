@extends('layouts.app')

@section('content')
<div class="mdl-grid">
    <div class="mdl-layout-spacer"></div>
        <div class="demo-card-wide mdl-card mdl-card-edit mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Edit notebook details</h2>
          </div>
            {!! Form::model($editnote, ['route' => ['note.update', $editnote->id], 'method' => 'put']) !!}
            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! form::label('title', 'Title',['class' => 'mdl-textfield__label']) !!}
                    {!! form::text('title', old('title'), ['class' => 'mdl-textfield__input']) !!}
                </div>
                <br/>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! form::label('content', 'Content',['class' => 'mdl-textfield__label']) !!}
                    {!! form::textarea('content', old('content'), ['class' => 'mdl-textfield__input', 'type'=>'text','rows'=>'8']) !!}
                </div>
                    {!! form::text('notebook_id', $notebook_id, ['class' => 'hidden']) !!}
            </div>
            <div class="mdl-card__actions mdl-card--border">
            {!! form::submit('Update', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
            <a href="{{ url()->previous() }}"><button type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Cancel</button></a>
            </div>
            {!! form::close() !!}
        </div>
    <div class="mdl-layout-spacer"></div>
</div>
@endsection