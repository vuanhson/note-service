@extends('layouts.app')

@section('content')
<div class="mdl-layout mdl-js-layout mdl-color--grey-100">
	<main class="mdl-layout__content">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Register</h2>
			</div>
		{!! Form::open(['route' => 'signup.post']) !!}
	  	    <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield">
                    {!! Form::label('name', 'Your Name', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'mdl-textfield__input']) !!}
                </div>

                <div class="mdl-textfield mdl-js-textfield">
                    {!! Form::label('email', 'Email address', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'mdl-textfield__input']) !!}
                </div>

                <div class="mdl-textfield mdl-js-textfield">
                    {!! Form::label('password', 'Password', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::password('password', ['class' => 'mdl-textfield__input']) !!}
                </div>

                <div class="mdl-textfield mdl-js-textfield">
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'mdl-textfield__label']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'mdl-textfield__input']) !!}
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <div class="text-right">
                    {!! Form::submit('Submit', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
                </div>
			</div>
		{!! Form::close() !!}
	</main>
</div>
@endsection