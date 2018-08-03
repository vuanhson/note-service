@extends('layouts.app')

@section('content')
<style>
.demo-card-wide.mdl-card {
  width: 512px;
  height:400px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 300px;
  background: url('{{ Gravatar::src(Auth::user()->email, 300) . '&d=mm' }}') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>
<div class="mdl-grid">
<!-- Wide card with share menu button -->
    <div class="mdl-layout-spacer"></div>
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{{ Auth::user()->name }}</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <ul>
                <li>Email: <b>{{Auth::user()->email}}</b> </li>
                <li>Number of notebooks: <b>{{$notebook_count}}</b></li>
            </ul>
          </div>
 
        </div>
    <div class="mdl-layout-spacer"></div>
</div>
@endsection