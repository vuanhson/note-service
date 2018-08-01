<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      @if (Auth::check())
      <a href="{{ route('home') }}" style="text-decoration:none; color:white;"><span class="mdl-layout-title">My Notes</span></a>
      @else
        <a href="{{ route('landing') }}" style="text-decoration:none; color:white;"><span class="mdl-layout-title">My Notes</span></a>
      @endif
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        @if (Auth::check())
          <a class="mdl-navigation__link" href="">Link</a>

            <button type="button" class="mdl-chip mdl-chip--contact" id="demo-menu-lower-right">
                  <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="mdl-chip__contact mdl-color--teal mdl-color-text--white">
                  <span class="mdl-chip__text">{{ Auth::user()->name }}</span>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect"
                for="demo-menu-lower-right">
              <li class="mdl-menu__item">Some Action</li>
              <li class="mdl-menu__item">Another Action</li>
              <li class="mdl-menu__item"><a href="{{ route('logout.get') }}" style="text-decoration:none; color:black;">Sign out</a></li>
            </ul>
          
          
          
          <!--<li class="drop">-->
          <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">-->
          <!--      <span class="gravatar">-->
          <!--          <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">-->
          <!--      </span>-->
                
          <!--      <span class="caret"></span>-->
          <!--  </a>-->
          <!--  <ul class="dropdown-menu">-->
          <!--      <li>-->
          <!--          <a href="#">マイページ</a>-->
          <!--      </li>-->
          <!--      <li role="separator" class="divider"></li>-->
          <!--      <li>-->
          <!--          <a href="{{ route('logout.get') }}">ログアウト</a>-->
          <!--      </li>-->
          <!--  </ul>-->
          <!--</li>-->
          

        @else
          <a class="mdl-navigation__link" href="{{ route('login') }}">Member Login</a>
        @endif
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">My Notes</span>
    <nav class="mdl-navigation">
      @if (Auth::check())
          <a class="mdl-navigation__link" href="">Link</a>
        @else
          <a class="mdl-navigation__link" href="{{ route('signup.get') }}">Register</a>
          <a class="mdl-navigation__link" href="{{ route('login') }}">Member Login</a>
        @endif
    </nav>
  </div>
</div>