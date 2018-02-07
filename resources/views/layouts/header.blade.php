<div class="container-fluid">
    <div class="jumbotron">
        <h2 class="text-center text-primary">Welcome to Murray Shopping Webiste</h2>
        <div class="row">
            <div class="col-md-4">
              <div class="img-rounded">
                  <img src="/images/shopping-cart.png" alt="Promotion" width="200px" height="200px">
              </div>
            </div>
            <div class="col-md-8">
                <p>The biggest online Shopping website in East and Central Africa.
                    <br>
                    We offer the best fast and secure service for our clients
                    </p>
                    <p id="advert">
                    <i>
                        Click this link  to hear what our customers are saying about us
                         <br></i>
                    <a href="" class="btn btn-lg btn-primary">Click Here </a>
                </p>
            </div>
        </div>
  </div>
  <div class="nav-bar pull-right clearfix">
    <ul class="nav nav-pills">
        
        @if (Route::has('login'))
            @auth
              
             <li role="presentation" class="active"><a href="{{ url('/')}}">Home</a></li>
             <li role="presentation"><a href="#">Our services</a></li>
             <li role="presentation"><a href="#">About us</a></li>
             <li role="presentation"><a href="{{ route('cart')}}">my cart
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
             </a></li>
            @else

                <li role="presentation"><a href="#">Our services</a></li>
                <li role="presentation"><a href="#">About us</a></li>
               <li role="presentation"><a href="{{ route('login') }}">Login</a></li>
               <li role="presentation"><a href="{{ route('register') }}">Register</a></li>
               <li role="presentation"><a href="{{ route('cart')}}">my cart
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
             </a></li>
            @endauth
        
         @endif 
    </ul>
  </div>
</div>