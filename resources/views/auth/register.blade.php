<x-layout>
    <div class="container-fluid our-gradient-reverse py-5">
        <div class="container py-5 my-5">
            <div class="row justify-content-center">
                <div class="col-8">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Conferma password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                        </div>
                        

                        <button type="submit" class="btn btn-primary ms-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</div>
</x-layout>