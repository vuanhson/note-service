@extends('layouts.app')

@section('content')
<div class="mdl-grid">
    <div class="mdl-layout-spacer"></div>
        <div class="demo-card-wide mdl-card mdl-card-edit mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Edit notebook details</h2>
          </div>
            {!! Form::model($editnote, ['route' => ['home.update', $editnote->id], 'method' => 'put']) !!}
            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! form::label('name', 'Name',['class' => 'mdl-textfield__label']) !!}
                    {!! form::text('name', old('name'), ['class' => 'mdl-textfield__input']) !!}
                </div>
                <br/>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! form::label('description', 'Description',['class' => 'mdl-textfield__label']) !!}
                    {!! form::textarea('description', old('description'), ['class' => 'mdl-textfield__input', 'type'=>'text','rows'=>'8']) !!}
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
            {!! form::submit('Update', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
            <a href="{{ route('home.index') }}"><button type="button" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Cancel</button></a>
            </div>
            {!! form::close() !!}
        </div>
    <div class="mdl-layout-spacer"></div>
</div>
@endsection