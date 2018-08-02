@extends('layouts.app')
@section('cover')
    <body class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Welcome to My Notes</h1>
                <a href="{{ route('signup.get') }}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                  Register Now
                </a>
            </div>
        </div>
    </body>
@endsection