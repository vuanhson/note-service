@extends('layouts.app')

@section('content')
<div class="mdl-layout mdl-js-layout mdl-color--grey-100">
	<main class="mdl-layout__content">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Login</h2>
			</div>
			{!! Form::open(['route' => 'login.post']) !!}
    	  	<div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield">
                    {!! form::label('email', 'Email address',['class' => 'mdl-textfield__label']) !!}
                    {!! form::email('email', old('email'), ['class' => 'mdl-textfield__input']) !!}
                </div>

                <div class="mdl-textfield mdl-js-textfield">
                    {!! form::label('password', 'Password',['class' => 'mdl-textfield__label']) !!}
                    {!! form::password('password', ['class' => 'mdl-textfield__input']) !!}
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <div class="text-right">
                    {!! form::submit('Submit', ['class' => 'mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect']) !!}
                </div>
            </div>
            {!! form::close() !!}
    		
		</div>
	</main>
</div>
@endsection