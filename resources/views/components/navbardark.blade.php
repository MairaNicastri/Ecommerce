
<nav  class="navblurcolor nav-blur fs-5 navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand " href="{{route('index')}}"><p class="font2 display-2">Presto</p></a>
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __( 'ui.Annunci' )}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('indexads')}}">{{ __( 'ui.Tutti gli annunci' )}}</a></li>
                  <li><a class="dropdown-item {{strpos(Request::fullUrl(),'annunci#cate')!=false ? 'active':''}}" href="#cate">{{ __( 'ui.Categorie' )}}</a></li>
                </ul>
            </li>
            <li><a class="nav-link {{strpos(Request::fullUrl(),'annunci#cate')!=false ? 'active':''}}" href="#cate">{{ __( 'ui.Categorie' )}}</a></li>
            @if(Auth::user())
            <li class="nav-item">
                <a class="nav-link pill" href="{{route('formads')}}"><span>+</span>{{ __( 'ui.Pubblica un annuncio!' )}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-none" href="{{route('workWithUs')}}">{{ __( 'ui.Vuoi lavorare con noi?' )}}</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link text-center pill" href="{{route('login')}}"><i class="pe-1 fa-solid fa-plus"></i>{{ __( 'ui.Pubblica un annuncio!' )}}</a>
          </li>
          <li class="nav-item">
                <a class="nav-link d-none" href="{{route('login')}}">{{ __( 'ui.Vuoi lavorare con noi?' )}}</a>
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
            <li><a class="nav-link {{strpos(Request::fullUrl(),'annunci#cate')!=false ? 'active':''}}" href="#cate">Contattaci</a></li>
            <li class="nav-item rounded-circle d-none">
              <form action= "{{route('locale','it')}}" method="POST">
                @csrf
                 <button type=“submit” class="nav-link flag">
                 <span class="fi fi-it rounded-circle"></span>
                 </button>
                  </form>
              </li>
              <li class="nav-item rounded-circle d-none">
              <form action= "{{route('locale','en')}}" method="POST">
                @csrf
               <button type="submit" class="nav-link flag d-none">
               <span class="fi fi-gb rounded-circle"></span>
                </button>
                 </form>
              </li>
              <li class="nav-item rounded-circle d-none">
              <form action= "{{route('locale','es')}}" method="POST">
                @csrf
               <button type="submit" class="nav-link flag">
               <span class="rounded-circle fi fi-es"></span>
                </button>
                 </form>
              </li>
  
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Registrati o Accedi</a>
            </li>
            <li class="nav-item d-none">
              <a class="nav-link" href="{{route('register')}}">{{ __( 'ui.Registrati' )}}</a>
            </li>
            <li class="nav-item me-3 d-none">
              <a class="nav-link" href="{{route('login')}}">{{ __( 'ui.Login' )}}</a>
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
