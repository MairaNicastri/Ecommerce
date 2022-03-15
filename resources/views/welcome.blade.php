<x-layout>



<section  class="sectionsearch masthead pt-5">

    <div class="container-fluid  mt-5 pt-5" >
        @if (Session::has('annunciocreato'))
        <div class="alert alert-success">
        <ul>
            <li>{{Session::get('annunciocreato')}}</li>
        </ul>
        </div>
        @endif
     
        @if(Session('access.denied.revisor.only'))
        <div class="alert alert-danger">
            Pagina riservata ai revisori!
        </div>
        @endif
        <div class="mt-5 pt-5"></div>
                                
                                
            <div class="row mt-5 ">


                <h1 class="home-title text-center py-5 font display-1 text-white">Fai la tua ricerca</h1>

                <form class="d-flex justify-content-center align-items-center" action="{{route('search')}}">
                            
                            <div class="d-flex searchform justify-content-center align-items-center">
                                
                                <div class="col-5 ricerca ">
                                    <i class="fa-solid fa-magnifying-glass color-trans"></i>
                                    <input type="search" name="q" class="form-control form-controlMaira rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                </div>
    
                                <div class="col-5  ricerca">
                                    <img src="https://assets.subito.it/static/icons/cactus/category-squares.svg" width="24" height="24" alt="" class="">
                                    <select name="categoria" class="form-select form-controlMaira">
                                        <option value="">Tutte le categorie</option>
                                        @foreach($categorie as $categoria)
                                            <option value="{{$categoria->id}}" >{{$categoria->name}}</option>
                                        @endforeach
                                        @error('categoria')
                                            <div>{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                                <div class="col-2 d-flex justify-content-end">    
                                    <button class="btn buttonsearch" type="submit">Cerca</button>
                                </div>
                            </div>
                </form>
                            
            </div>

            
    </div>



    <!-- {{-- <div class="container section1 pt-5 mt-5 "> --}}
        {{-- @if (Session::has('annunciocreato'))
        <div class="alert alert-danger">
        <ul>
            <li>{{Session::get('annunciocreato')}}</li>
        </ul>
        </div>
        @endif
     
        @if(Session('access.denied.revisor.only'))
        <div class="alert alert-danger">
            Pagina riservata ai revisori!
        </div>
        @endif --}}
        {{-- <div class="row ">
            <div class="col-9 position-absolute top-50 start-50 translate-middle">

            <div class="input-group bg-danger">
                
            <form method="GET" action="{{route('search')}}">
                <input type="search" name="q" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                

                <select name="categoria" class="form-select">
                        @foreach($categorie as $categoria)
                            <option value="{{$categoria->id}}" >{{$categoria->name}}</option>
                        @endforeach
                        @error('categoria')
                            <div>{{ $message }}</div>
                        @enderror
                </select>

                    <button type="submit" class="btn btn-outline-primary">search</button>
            </form> --}}
                  
            {{-- </div>   
            </div>
           
        </div>
    </div> --}} -->
</section>
<div  id="cate" class="pb-5 mb-5 "></div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center py-5 font display-1">Esplora per categoria</h1>
        </div>
    </div>
</div>

<div class="container-fluid d-flex justify-content-center align-items-center">    
        <div class="row justify-content-around larghezza">
            @foreach($categorie as $categoria)
                <div class="col py-3">
                    <a href="{{route('adsbycat' , ['name'=>$categoria->name , 'id'=>$categoria->id])}}" class="card-text">
                                                                 
                      <div class="card-body w-100 cardcat flex-column d-flex align-items-start justify-content-evenly">
                           <h5 class="card-title w-100">{{$categoria->name}}</h5>
                           <i class="w-100 {{$categoria->icon}} fa-4x text-icon pt-1"></i>
                           <p class="w-100">{{rand( 1,  100)}} annunci</p>
                       </div>
                              
                    </a>
                </div>
            @endforeach
        </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center  my-5 py-5 font display-1">Ultimi annunci</h1>
        </div>
    </div>
</div>
<div class="container-fluid  mx-0 px-0 vw-100 pb-5">
    <div class="row  justify-content-evenly">
        <div class="ultimiannunci  container-fluid ">
                <div class="ultimiannunci wrap justify-content-center px-0 mx-0 d-flex">

                    @foreach($announcements as $announcement)
                    <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xxl-2 d-flex justify-content-evenly">
                        <div class="card">
                        <div class="card-header">
                        @if(count($announcement->images)>0)
                                    <img src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
                        @else
                                    <img src="http://via.placeholder.com/200/000000/FFFFFF/?text=Presto.it" alt="user" />
                        @endif
                        </div>
                        <div class="card-body mt-3">
                            <a href="{{route('adsbycat' , ['name'=>$announcement->category->name , 'id'=>$announcement->category->id])}}">
                                <span class="tag tag-teal">
                                    <i class="me-2 {{$announcement->category->icon}}"></i>{{$announcement->category->name}}
                                </span>
                            </a>
                            <h4 class="mt-2 fw-bold">
                                {{$announcement->title}}
                            </h4>
                            <p class="fs-5 mb-5">{{$announcement->price}} $</p>
                            <div class="user">
                            <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
                            <div class="user-info text-center">
                                <h5>{{$announcement->user->name}}</h5>
                                <small>{{$announcement->created_at->format('d/m/Y')}}</small>
            
                                    <a class="btn mt-4 button" href="{{route('showads' , compact('announcement'))}}">Dettaglio</a>
            
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            

                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-center py-5">
            <button class="btn btn-ads shadow-sm" > <a class="btn-ads" href="{{route('indexads')}}">Tutti gli annunci</a></button>
        </div>
    </div>



    
</div>
<section  class="sectionwork">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-1 pt-1 font display-4">Lavora con noi</h1>
                <h2 class="text-center font display-4">diventa revisore!</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid workformsection" >
        
        <form method="POST" class="formwork" action="{{route("submit")}}">
            @csrf
            <div class="mb-3 input-group">
                <input type="text" class="" name="name">
                <label for="exampleInputEmail1" class="">Nome e Cognome</label>
              </div>
          <div class="mb-3 input-group">
              <input type="number" class="form-control" name="eta">
              <label for="number" class="form-label">La tua età</label>
          </div>
          <div class="mb-3 input-group">
              <select name="disponibilita" id="select" class="form-select">
                  <option selected></option>
                  <option  value="Part-time">Part-time</option>
                  <option  value="Full-time">Full-time</option>
                </select>
             
                <label for="select">Disponibilità</label>
          </div> 
                
          <div class="mb-3 input-group">
              <input type="email" class="form-control" name="email">
              <label for="exampleInputEmail1" class="form-label">E-Mail</label>

            </div>

            <div class="form-floating input-group">
                <textarea class="form-control" name="message" placeholder="scrivi qui il tuo commento" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Scrivi qui il tuo messaggio</label>
              </div>

            <div class="d-flex pt-5 justify-content-center">
            <button type="submit" class="btn button">Submit</button>
          </div>
          </form>

            
    </div>

</x-layout>    
