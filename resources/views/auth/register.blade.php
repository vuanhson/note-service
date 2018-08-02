@extends('layouts.app')

@section('content')

<div class="mdl-grid">
    <div class="mdl-layout-spacer"></div>
        <div class="demo-card-wide mdl-card mdl-card-auth mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Create new account</h2>
          </div>
          
          
            {!! Form::open(['route' => 'signup.post']) !!}
            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::label('name', 'Your Name', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'mdl-textfield__input']) !!}
                </div>
                <br/>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::label('email', 'Email address', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'mdl-textfield__input']) !!}
                </div>
                <br/>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::label('password', 'Password', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::password('password', ['class' => 'mdl-textfield__input']) !!}
                </div>
                <br/>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'mdl-textfield__input']) !!}
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
            {!! Form::submit('Submit', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
            </div>
            {!! form::close() !!}


        </div>
    <div class="mdl-layout-spacer"></div>
</div>




@endsection