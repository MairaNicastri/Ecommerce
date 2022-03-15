<x-layout>

    <section class="ultimiannunci bg-first py-5 mt-5 px-0 mx-0">
        <div class="py-2 my-2">
            <h1 class="text-center">ANNUNCI ACCETTATI</h1>
        </div>
                <div class="row px-0 mx-0 justify-content-evenly">
                    @if($announcementtrue)
                    @foreach($announcementtrue as $announcement)
                    <div class="col-12 col-sm-6 col-md-4 col-xl-3 col-xxl-2 ">
                        <div class="card">
                        <div class="card-header">
                        @if(count($announcement->images)>0)
                                    <img src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
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
                <div class="py-2 my-2">
                    <h1 class="text-center">QUI TROVERAI GLI ANNUNCI CHE HAI RIFIUTATO IN PRECEDENZA</h1>
                </div>
                <div class="row px-0 mx-0 justify-content-evenly">
                        @if($announcementfalse)
                        @foreach($announcementfalse as $announcement)
                        <div class="col-12 col-md-2">
                            <div class="card">
                                <div class="card-header">
                                
                                @if(count($announcement->images)>0)
                                    <img src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
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
                        <h3>Non ci sono più annunci rifiutati</h3>
                        @endif
    
                </div>

</section>
</x-layout>