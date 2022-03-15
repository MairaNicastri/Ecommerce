<x-layout>



    <div class="container-fluid our-gradient-reverse py-5 mt-5">
        <h1 class="py-5">Hai cercato la parola :{{$q}}</h1>
        
        <div class="row justify-content-evenly  min-vh-100">   

            <div class="col-12">
            <div class="py-5 my-5">
            @if(count($announcements)>0)
            @foreach($announcements as $announcement)
        <div class="col-12 col-md-2">

        <div class="card">
        @if(count($announcement->images)>0)
            <img src="{{$announcement->images->first()->getUrl(400, 300)}}" alt="">
            @else
            <img src="http://via.placeholder.com/200/000000/FFFFFF/?text=Presto.it" alt="user" />
         @endif
            <div class="card-body">
                <h5 class="card-title">{{$announcement->title}}</h5>
                <h5>Creato il:{{$announcement->created_at}}</h5>
                <h5>Da:{{$announcement->user->name}}</h5>
                <p class="card-text">{{$announcement->desription}}</p>
                <h6>{{$announcement->price}} $</h6>
                <a href="{{route('showads' , compact('announcement'))}}" class="btn btn-primary">Vai al dettaglio</a>
            </div>
        </div>
        </div>
        @endforeach
        @else
        <h2>NON CI SONO ANNUNCI PER LA PAROLA CERCATA</h2>
        @endif  
            </div>
    

        </div>
       
    </div>

</x-layout>