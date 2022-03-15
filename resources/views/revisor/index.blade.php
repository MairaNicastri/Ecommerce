
<x-layout>
<div class="py-3"></div>
    <section class="container-fluid py-5 pt-5">
        <div class="container pt-5">
            <div class="row pt-5 justify-content-center">

            @if($announcement)
        
        
            <div class="col-12">
                <div class="card myborder">
                    <div class="card-header fw-bold display-5 bgg">Accettazione annunncio id {{$announcement->id}}</div>

                    <div class="card-body">

                        <div class="row align-items-center py-1 ">
                            <div class="col-sm-3 col-lg-2"><h3>Utente</h3></div>
                            <div class="col-sm-9 col-lg-10">
                                <p>
                                    id : {{$announcement->user->id}},
                                </p>
                                <p>
                                    nickname: {{$announcement->user->name}},
                                </p>
                                <p>

                                    email : {{$announcement->user->email}},
                                </p>
                                
                            </div>
                        </div>

                        <hr>
                        <div class="row  py-5">
                            <div class="col-sm-3 col-lg-2"><h3>Titolo</h3></div>
                            <div class="col-sm-9 col-lg-10">{{$announcement->title}}</div>
                        </div>

                        <hr>
                        <div class="row  vh-b align-items-center">
                            <div class="col-sm-3 col-lg-2">
                                <h3>Descrizione</h3>
                            </div>
                            <div class="col-sm-9 col-lg-10">{{$announcement->description}}</div>
                        </div>
<hr>
                        <hr>
                        <div class="row ">
                        <div class="my-3 py-3 col-12 text-center bg-ciel"><h3>Immagini</h3></div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                @foreach($announcement->images as $image )
                                <div class="row mb-2">
                                    <div class="col-md-4">
                                        <b class="py-3">Immagine</b><br>
                                        <img src="{{$image->getUrl(300 , 150)}}" class="rounded" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <b class="py-3">Verifica di contenuti non conformi</b><br>
                                    <p><span class="badge value rounded-circle
                                        {{$image->adult='VERY_UNLIKELY' ? 'bg-success' : 
                                        ($image->adult='UNLIKELY' ? 'bg-warning' : 
                                        ($image->adult='POSSIBLE' ? 'bg-orange' : 
                                        ($image->adult='LIKELY' ? 'bg-orangered' : 
                                        ($image->adult='VERY_LIKELY' ? 'bg-red' :
                                        ($image->adult='UNKOWN' ? 'bg-grey' : 'bg-transparent')))))}}">
                                        @if($image->adult='VERY_UNLIKELY' || 'UNLIKELY')
                                        ✔
                                        @else
                                        ✘
                                        @endif
                                        </span>
                                        ⮞ Adult</p>
                                    <p><span class="badge value rounded-circle 
                                        {{$image->spoof='VERY_UNLIKELY' ? 'bg-success' : 
                                        ($image->spoof='UNLIKELY' ? 'bg-warning' : 
                                        ($image->spoof='POSSIBLE' ? 'bg-orange' : 
                                        ($image->spoof='LIKELY' ? 'bg-orangered' : 
                                        ($image->spoof='VERY_LIKELY' ? 'bg-red' :
                                        ($image->spoof='UNKOWN' ? 'bg-grey' : 'bg-transparent')))))}}">
                                        ✔
                                        </span>
                                        ⮞ Spoof</p>
                                    <p><span class="badge value rounded-circle 
                                        {{$image->medical='VERY_UNLIKELY' ? 'bg-success' : 
                                        ($image->medical='UNLIKELY' ? 'bg-warning' : 
                                        ($image->medical='POSSIBLE' ? 'bg-orange' : 
                                        ($image->medical='LIKELY' ? 'bg-orangered' : 
                                        ($image->medical='VERY_LIKELY' ? 'bg-red' :
                                        ($image->medical='UNKOWN' ? 'bg-grey' : 'bg-transparent')))))}}">
                                        @if($image->adult='VERY_UNLIKELY' || 'UNLIKELY')
                                        ✔
                                        @else
                                        ✘
                                        @endif</span>
                                        ⮞ Medical</p>
                                    <p><span class="badge value rounded-circle 
                                        {{$image->violence='VERY_UNLIKELY' ? 'bg-success' : 
                                        ($image->violence='UNLIKELY' ? 'bg-warning' : 
                                        ($image->violence='POSSIBLE' ? 'bg-orange' : 
                                        ($image->violence='LIKELY' ? 'bg-orangered' : 
                                        ($image->violence='VERY_LIKELY' ? 'bg-red' :
                                        ($image->violence='UNKOWN' ? 'bg-grey' : 'bg-transparent')))))}}">
                                        @if($image->adult='VERY_UNLIKELY' || 'UNLIKELY')
                                        ✔
                                        @else
                                        ✘
                                        @endif</span>
                                        ⮞ Violence</p>
                                    <p><span class="badge value rounded-circle 
                                        {{$image->racy='VERY_UNLIKELY' ? 'bg-success' : 
                                        ($image->racy='UNLIKELY' ? 'bg-warning' : 
                                        ($image->racy='POSSIBLE' ? 'bg-orange' : 
                                        ($image->racy='LIKELY' ? 'bg-orangered' : 
                                        ($image->racy='VERY_LIKELY' ? 'bg-red' :
                                        ($image->racy='UNKOWN' ? 'bg-grey' : 'bg-transparent')))))}}">
                                        @if($image->adult='VERY_UNLIKELY' || 'UNLIKELY')
                                        ✔
                                        @else
                                        ✘
                                        @endif</span>
                                        ⮞ Racy</p>
                                   

                                    </div>
                                    <div class="col-md-4">
                                        
                                        <b>Contenuti trovati nella foto</b><br>
                                        
                                        @if($image->labels)
                                            @foreach ($image->labels as $label)
                                                <p class="pb-0 mb-0">{{$label}}</p>
                                            @endforeach
                                        @endif
                                        
    
                                        </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                        <div class="row py-5 justify-content-center">
                <div class="col-md-12 d-flex justify-content-evenly">
                    <form method="POST" action="{{route('rejectads' , ['id'=>$announcement->id])}}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>              
                    </form>
               
                    <form  method="POST" action="{{route('acceptads' , ['id'=>$announcement->id])}}">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept</button>              
                    </form>
                </div>
            </div>
                    

                    </div>

                    </div>

            </div>
        </div>  


        @else
            <h3 class="text-center">Non ci sono più annunci da revisionare!</h3>
        @endif

    </div>
    </section>  
    <div class="py-3"></div>
    
           
</x-layout>