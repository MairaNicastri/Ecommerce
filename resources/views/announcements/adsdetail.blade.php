<x-layout>
<div class="riempimentobg py-5"></div>
    <div class="container-fluid">
        <div class="row bggreen justify-content-center align-items-center py-5">
            <h3 class="logodet text-center py-5 mt-5 fw-bolder "> <i class="logodet fw-bolder {{$announcement->category->icon}}"></i>
             {{$announcement->category->name}}</h3>
        </div>


        <div class="riga"></div>


        <div class="container py-4 px-0">
           <div class="row align-items-center justify-content-center">
               
               
               <div class="col-12 col-md-6 ">
                    @if(count($immagini)>0)
               

                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        @foreach($announcement->images as $key=>$image)
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <img src="{{$image->getUrl(300, 150)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                    
                    @else
                        
                        <img width="500px" src="http://via.placeholder.com/200/000000/FFFFFF/?text=Presto.it" alt="">      
                        
                    @endif
                </div>
                <div class="col-12 col-md-6 ps-5 ">
                    <p class="display-6  pb-0 mb-0">{{$announcement->user->name}} sta vendendo:</p>
                    <h3 class="display-3 fw-bold pb-4 mb-2">{{$announcement->title}}</h3>
                    <h3>{{$announcement->description}}</h3>
                    <h3 class="py-3">prezzo:{{$announcement->price}}$</h3>
                    <h3 class="py-3">data di creazione: {{$announcement->created_at->format('d/m/Y')}}</h3>
                    <p class="display-5">Categoria:
                    <a class="adet" href="{{route('adsbycat' , ['name'=>$announcement->category->name , 'id'=>$announcement->category->id])}}">{{$announcement->category->name}}</a>
                    </p>
                </div>
          </div>
        </div>
        @if($related_announcements->count() >1)
        <div class="riga py-1"></div>

        <div class="container mx-0 px-0 py-5 mt-5">
            <div class="row vw-100 text-center justify-content-center px-0 mx-0">
               <div class="col-12">
                   <h3>Questo annuncio e' stato pubblicato da {{$announcement->user->name}}</h3>
               </div>
                   
                   <h3 class="py-3 mb-5">vedi questi altri suoi annunci:</h3>                       
                    <div class="ultimiannunci wrap justify-content-center px-0 mx-0 d-flex">
                        @foreach($related_announcements as $announcement)
                        <div class="col-12 col-sm-3 col-md-4 col-xl-3 col-xxl-3">
                            <div class="card">
                                <div class="card-header">
                                    @if(count($announcement->images)>0)
                                    <img src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
                                    @else
                                    <img src="http://via.placeholder.com/200/000000/FFFFFF/?text=Presto.it" alt="user" />
                                    @endif
                                </div>
                                <div class="card-body">
                                    <a href="{{route('adsbycat' , ['name'=>$announcement->category->name , 'id'=>$announcement->category->id])}}"><span class="tag tag-teal"><i class="{{$announcement->category->icon}}"></i>{{$announcement->category->name}}</span></a>
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
                                            <a class="button" href="{{route('showads' , compact('announcement'))}}" class="btn">Vai al dettaglio</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        @endforeach
                    @endif
                    </div>


           </div>
        </div>

    </div>

</x-layout>
