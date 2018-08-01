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
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation">
        @if (Auth::check())
          <a class="mdl-navigation__link" href="">Link</a>
          <a class="mdl-navigation__link" href="">Link</a>
          <a class="mdl-navigation__link" href="">Link</a>
          <a class="mdl-navigation__link" href="">Link</a>
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
          <a class="mdl-navigation__link" href="">Link</a>
          <a class="mdl-navigation__link" href="">Link</a>
          <a class="mdl-navigation__link" href="">Link</a>
        @else
          <a class="mdl-navigation__link" href="{{ route('signup.get') }}">Register</a>
          <a class="mdl-navigation__link" href="{{ route('login') }}">Member Login</a>
        @endif
    </nav>
  </div>
</div>