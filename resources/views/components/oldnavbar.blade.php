
<nav id="bgnav" class="navbg fs-5 navbar fixed-top navbar-expand-lg navbar-dark">
  <div class="container-fluid ms-3">
    <a class="navbar-brand " href="{{route('index')}}"><p class="font display-2">Presto.it</p></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      

            {{-- <li class="nav-item">
              <a class="nav-link {{strpos(Request::fullUrl(),'Home')!=false ? 'active':''}}" aria-current="page" href="{{route('index')}}">Home</a>
            </li> --}}
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __( 'ui.Lingue' )}}
              </a>
              <ul class="dropdown-menu a" aria-labelledby="navbarDropdown">
                <li class="nav-item">
                  <form action= "{{route('locale','it')}}" method="POST">
                    @csrf
                     <button type=“submit” class="nav-link flag">
                     <span class="fi fi-it"></span>
                     </button>
                      </form>
                  </li>
                  <li class="nav-item">
                  <form action= "{{route('locale','en')}}" method="POST">
                    @csrf
                   <button type="submit" class="nav-link flag">
                   <span class="fi fi-gb"></span>
                    </button>
                     </form>
                  </li>
              </ul>
            </li> -->
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{strpos(Request::fullUrl(),'Annunci')!=false ? 'active':''}}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __( 'ui.Annunci' )}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item {{strpos(Request::fullUrl(),'annunci')!=false ? 'active':''}}" href="{{route('indexads')}}">{{ __( 'ui.Tutti gli annunci' )}}</a></li>
                  <li><a class="dropdown-item {{strpos(Request::fullUrl(),'annunci#cate')!=false ? 'active':''}}" href="#cate">{{ __( 'ui.Categorie' )}}</a></li>
                </ul>
            </li>
            @if(Auth::user())
            <li class="nav-item">
                <a class="nav-link {{strpos(Request::fullUrl(),'')!=false ? 'active':''}}" href="{{route('formads')}}">{{ __( 'ui.Pubblica un annuncio!' )}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{strpos(Request::fullUrl(),'lavora_con_noi')!=false ? 'active':''}}" href="{{route('workWithUs')}}">{{ __( 'ui.Vuoi lavorare con noi?' )}}</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link  {{strpos(Request::fullUrl(),'http://127.0.0.1:8000/annunci/form')!=false ? 'active':''}}" href="{{route('login')}}">{{ __( 'ui.Pubblica un annuncio!' )}}</a>
          </li>
          <li class="nav-item">
                <a class="nav-link " href="{{route('login')}}">{{ __( 'ui.Vuoi lavorare con noi?' )}}</a>
            </li>
          @endif
          @if(Auth::user() && Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link" href="{{route('indexrevisor')}}">Area Revisor</a>
          </li>
          <span class= 'badge rounded-circle navred bg-transparent'>{{App\Models\Announcement::ToBeRevisionedCount()}}</span>
          <li class="nav-item">
            <a class="nav-link" href="{{route('indexconferm')}}">Check Annunci</a>
        </li>
          @endif

          <li class="nav-item rounded-circle">
            <form action= "{{route('locale','it')}}" method="POST">
              @csrf
               <button type=“submit” class="nav-link flag">
               <span class="fi fi-it rounded-circle"></span>
               </button>
                </form>
            </li>
            <li class="nav-item rounded-circle">
            <form action= "{{route('locale','en')}}" method="POST">
              @csrf
             <button type="submit" class="nav-link flag">
             <span class="fi fi-gb rounded-circle"></span>
              </button>
               </form>
            </li>
            <li class="nav-item rounded-circle">
            <form action= "{{route('locale','es')}}" method="POST">
              @csrf
             <button type="submit" class="nav-link flag">
             <span class="rounded-circle fi fi-es"></span>
              </button>
               </form>
            </li>

          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">{{ __( 'ui.Registrati' )}}</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{strpos(Request::fullUrl(),'login')!=false ? 'active':''}}" href="{{route('login')}}">{{ __( 'ui.Login' )}}</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST">
              @csrf
            </form>
          </li>
          @endauth
      </ul>

    </div>
  </div>
</nav>