<x-layout>
    <!-- per il momento lasciamo il gradient che ha anche un'altezza se no si vedeva la foto dietro, appena che c'è sempre lo stesso bg cambiamo la classe in style.css -->
    <div class="container-fluid our-gradient min-vh-100 py-5 mt-5 text-white ">
        <div class="container pt-5">
            <div class="row h-100">
                <div class="col-12">
                <form method="POST" action="{{route('login')}}">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <button type="submit" class="btn button ms-3">Login</button>
                        </form>
                    </div>
                    <div class="col-3 d-flex justify-content-evenly mt-5"> 
                        <p>se non sei ancora registrato</p>
                        <a href="{{route('register')}}"><button type="button" class="btn button ms-3">registrati</button></a>
                    </div>
                       
                    
                </div>
            </div>
        </div>
     </div>

</x-layout>