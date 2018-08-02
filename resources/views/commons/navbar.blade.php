<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      @if (Auth::check())
      <a href="{{ route('home.index') }}" style="text-decoration:none; color:white;"><span class="mdl-layout-title">My Notes</span></a>
      @else
        <a href="{{ route('landing') }}" style="text-decoration:none; color:white;"><span class="mdl-layout-title">My Notes</span></a>
      @endif
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
  <!----------------------------------------------------- Navigation ---------------------------------------->
      <nav class="mdl-navigation">
        @if (Auth::check())
          <!--<a class="mdl-navigation__link" href="">Link</a>-->

            <button type="button" class="mdl-chip mdl-chip--contact" id="demo-menu-lower-right">
                  <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="mdl-chip__contact mdl-color--teal mdl-color-text--white">
                  <span class="mdl-chip__text">{{ Auth::user()->name }}</span>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect"
                for="demo-menu-lower-right">
              <li class="mdl-menu__item">Profile</li>
              <div class="mdl-card__actions mdl-card--border"></div>
              <a href="{{ route('logout.get') }}" style="text-decoration:none; color:black;"><li class="mdl-menu__item">Sign out</li></a>
            </ul>
        @else
          <a class="mdl-navigation__link" href="{{ route('login') }}">Member Login</a>
        @endif
      </nav>
    </div>
  </header>
  
  <!----------------------------------------------------- Drawer ---------------------------------------->
  <div class="mdl-layout__drawer">
      @if (Auth::check())
        <span class="mdl-layout-title">My Notebooks</span>
        <nav class="mdl-navigation">
        @foreach ($notebooks as $notebook)
          <a class="mdl-navigation__link" href="">{{ $notebook->name }}</a>
        @endforeach
        {{ $notebooks->links() }}
      @else
          <span class="mdl-layout-title">My Notes</span>
          <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="{{ route('signup.get') }}">Register</a>
          <a class="mdl-navigation__link" href="{{ route('login') }}">Member Login</a>
      @endif
    </nav>
  </div>
</div>