<x-layout>

    <nav class="navrev">
        <a id="accettati" href="#first">✔</a>
        <a id="rifiutati" href="#second">✘</a>
      </nav>
<div id="istruzioni" class="vh-100  bgrev  d-flex justify-content-center flex-column align-items-center">
  <h1  class="home-title text-center">
    <span>Clicca su</span>
    <span>✔ per vedere gli annunci accettati</span>
    <span>✘ per vedere quelli rifiutati</span>
  </h1>
</div>
     <div id="sezioniannunci" class= 'd-none container-fluid ms-5 altezzapagina'> 

        <section class="secrev pt-more" id= 'first'>
          
            <div class="row ultimiannunci px-0 justify-content-evenly">
                        @if($announcementtrue)
                        @foreach($announcementtrue as $announcement)
                        <div class=" col-12 col-sm-6 col-md-4 col-xl-3 col-xxl-3 ">
                            <div class="card">
                            <div class="card-header">
                            @if(count($announcement->images)>0)
                                        <img class="img-fluid" src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
                            @else
                                        <img src="http://via.placeholder.com/200/000000/FFFFFF/?text=Presto.it" alt="user" />
                            @endif
                            </div>
                            <div class="card-body">
                                <a href="{{route('adsbycat' , ['name'=>$announcement->category->name , 'id'=>$announcement->category->id])}}"><span class="tag tag-teal">{{$announcement->category->name}}</span></a>
                                <h4>
                                    {{$announcement->title}}
                                </h4>
                                <p>
                                    {{$announcement->description}}
                                </p>
                                <p>{{$announcement->price}} $</p>
                                <div class="user">
                                <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
                                <div class="user-info">
                                    <h5>{{$announcement->user->name}}</h5>
                                    <small>{{$announcement->created_at->format('d/m/Y')}}</small>
                                    <div class="user-info">
                                        <form method="POST" action="{{route('rejectads1' , ['id'=>$announcement->id])}}">
                                            @csrf
                                                <button type="submit" class="btn btn-danger">Ritira Annuncio</button>              
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                          
                        @endforeach
                        @else
                        <h3>Non ci sono annunci accettati</h3>
                        @endif
                    </div>

        </section>
       
       <section class="secrev pt-more" id= 'second'>
        <div class="ms-5 ps-5 row ultimiannunci px-0 justify-content-evenly">
          @if($announcementfalse)
          @foreach($announcementfalse as $announcement)
          <div class=" col-12 col-sm-6 col-md-4 col-xl-3 col-xxl-3 ">
              <div class="card">
              <div class="card-header">
              @if(count($announcement->images)>0)
                          <img class="img-fluid" src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
              @else
                          <img src="http://via.placeholder.com/200/000000/FFFFFF/?text=Presto.it" alt="user" />
              @endif
              </div>
              <div class="card-body">
                  <a href="{{route('adsbycat' , ['name'=>$announcement->category->name , 'id'=>$announcement->category->id])}}"><span class="tag tag-teal">{{$announcement->category->name}}</span></a>
                  <h4>
                      {{$announcement->title}}
                  </h4>
                  <p>
                      {{$announcement->description}}
                  </p>
                  <p>{{$announcement->price}} $</p>
                  <div class="user">
                  <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" />
                  <div class="user-info">
                      <h5>{{$announcement->user->name}}</h5>
                      <small>{{$announcement->created_at->format('d/m/Y')}}</small>
                      <div class="user-info">
                          <form method="POST" action="{{route('acceptads1' , ['id'=>$announcement->id])}}">
                              @csrf
                                  <button type="submit" class="btn btn-success">Pubblica Annuncio</button>              
                          </form>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
            
          @endforeach
          @else
          <h3>Non ci sono annunci accettati</h3>
          @endif
      
      </div>
       </section>
     </div>

</x-layout>