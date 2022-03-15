<footer class="footer footer-blur">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title">Chi siamo</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>
            <h4 class="title">Dove ci trovi</h4>
            <ul class="social-icon">
            <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
            </ul>
            </div>
        <div class="col-sm-3">
            <h4 class="title">My Account</h4>
            <span class="acount-icon">          
            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>
            <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Carrello </a>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profilo</a>
            <h4 class="title">Lingue</h4>
            <div class="d-flex">
                <span class="nav-item rounded-circle">
                <form action= "{{route('locale','it')}}" method="POST">
                    @csrf
                     <button type=“submit” class="nav-link flag">
                     <span class="fi fi-it rounded-circle"></span>
                     </button>
                      </form>
                  </span>
                  <span class="nav-item rounded-circle">
                  <form action= "{{route('locale','en')}}" method="POST">
                    @csrf
                   <button type="submit" class="nav-link flag">
                   <span class="fi fi-gb rounded-circle"></span>
                    </button>
                     </form>
                  </span>
                  <span class="nav-item rounded-circle ">
                  <form action= "{{route('locale','es')}}" method="POST">
                    @csrf
                   <button type="submit" class="nav-link flag">
                   <span class="rounded-circle fi fi-es"></span>
                    </button>
                     </form>
                  </span>          
              </span>
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Categorie</h4>
            <div class="category">
                @foreach($categories as $category)
            <a href="{{route('adsbycat' , ['name'=>$category->name , 'id'=>$category->id])}}">{{$category->name}}</a>
             
            @endforeach       
            </div>
            </div>
        <div class="col-sm-3">
            <h4 class="title">Payment Methods</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="payment">
            <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>            
            <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
            </ul>
            </div>
        </div>
        <hr class="text-white">
        
        <div class="text-white row text-center"> © 2017. Made with  by sumi9xm.</div>
        </div>
        
        
    </footer>