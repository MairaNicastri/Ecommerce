<x-layout>

    
<div class="container-fluid py-5 min-vh-100 our-gradient-reverse">
    <div class="d-flex mt-5 pt-5 align-items-center">
        <i class="logodet {{$category->icon}}"></i>
        <h3 class="fw-bolder logodet">{{$category->name}}</h3>
    </div>


    <div class="container py-5">

    
    <div class="row justify-content-evenly pt-3">
        <div class="ultimiannunci wrap px-0 mx-0 d-flex">
        @foreach($announcements as $announcement)
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
    </div>
        {{$announcements->links()}}
    </div>
    </div>
</div>






</x-layout>