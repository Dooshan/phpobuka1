<nav class="navbar navbar-expand-sm  transparent navbar_c">

              <!-- Branding Image -->
              <a class="navbar-brand" href="{{ url('/threads') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggler navbar-dark" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        <!-- Left Side Of Navbar -->

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            
            <ul class="navbar-nav mr-auto">

              <li class="nav-item"><a  class="nav-link" href="/threads/create">Nova tema</a></li>                                              
              <li class="nav-item"><a class="nav-link" href="/threads">Sve teme</a></li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" id="navbardrop" aria-haspopup="true" aria-expanded="false">Kategorije</a>
                    <div class="dropdown-menu">
                        @foreach(App\Category::all() as $category)
                            <a class="dropdown-item" href="/threads/{{$category->slug}}">{{$category->name}}</a>
                        @endforeach
                    </div>
              </li>
                    {{-- samo ulogovani mogu da vide ovo  --}}
                    {{-- @if(auth()->check()) --}}
              <li class="nav-item"><a  class="nav-link" href="/profiles">Profili</a></li>     
               
                                 
                    {{-- @endif --}}
            </ul>           
            <!-- Right Side Of Navbar -->
                           <!-- Authentication Links -->
                @if (Auth::guest())
                
                  <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Uloguj se </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registruj se </a></li>
                  </ul>

                @else


                  <ul class="navbar-nav">
                    <li><img src="/storage/avatars/{{  Auth::user()->avatar}}" width="50" /></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" id="navbardrop" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
                        <div class="dropdown-menu">
                                <a class="dropdown-item" href="/profiles/{{ Auth::user()->name }}">Moj Profil</a>
                                <a class="dropdown-item"href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                 Izloguj se 
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                        
                    </li>
                  </ul>
                @endif   
        </div>            
</nav>
