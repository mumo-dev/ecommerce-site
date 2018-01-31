<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Laravel</title>

        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="/css/app.css" rel="stylesheet"/>
        <style>
            .nav-bar{
                margin-right: 50px;
            }
            #advert{
                font-size:24px;
                font-weight:bolder;
                
            }
            .image {
                width:100%;
                height:150px;
            
            }
            #app{
                max-width:100%;
                margin:20px;
            }
           
        </style>
        
    </head>
    <body>

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
                              
                             <li role="presentation" class="active"><a href="{{ route('home')}}">Home</a></li>
                             <li role="presentation"><a href="#">Our services</a></li>
                             <li role="presentation"><a href="#">About us</a></li>
                             <li role="presentation"><a href="#">my cart
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                             </a></li>
                            @else
                
                                <li role="presentation"><a href="#">Our services</a></li>
                                <li role="presentation"><a href="#">About us</a></li>
                               <li role="presentation"><a href="{{ route('login') }}">Login</a></li>
                               <li role="presentation"><a href="{{ route('register') }}">Register</a></li>
                               <li role="presentation"><a href="#">my cart
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                             </a></li>
                            @endauth
                        
                         @endif 
                    </ul>
                  </div>
                </div>
                  <hr>
                  <div id="app">
                      <div class="row">

                          <div class="col-md-3">
                            <div class="sidebar">
                                <h4>sidebar</h4>
                            </div>
                        </div>
                     
                        <div class="col-md-9">
                            <div class="main">
                                    <div class="row">
                                        <?php 
                                         $index = 1;
                                        ?>
                                        @foreach($products as $product)
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                    <div class="panel-body">
                                                     <p> <strong style="font-size:20px;">{{ $product->name }}</strong>
                                                        <button class="btn  btn-default pull-right" type="button">
                                                                Price:<span class="badge">${{ $product->price }}</span>
                                                              </button>
                                                          </p>
                                                    <?php 
                                                    $image = $product->images->first()['image_url'];
                                                    $img = $image !='' ? $image: 'photo1.jpg';
                                                    
                                                    ?>
                                                    <img src= "{{ asset('/images/'.$img) }}" class="image"
                                                        width="100px" height="100px">
                                                    {{  $product->details }}
                                                    <p>
                                                        <br>
                                                        <button class="btn btn-primary" style="width:100%">
                                                                Add to cart
                                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                        </button>
                                                    </p>
                                                  
                                                    </div>
                                            </div>
                                        </div>

                                        <?php 
                                        if($index % 3 ==0){
                                            ?>
                                            <div class="clearfix">
                                            </div>

                                            <?php
                                        }
                                        $index++;
                                        ?>
                                        @endforeach
                                        <div class="clearfix">
                                        </div>
                                        <div class="text-center">
                                              {{ $products->links() }}
                                        </div>
                                </div>
                                
                            </div>
                       

                        </div>
                    </div>
                  </div>
            
    
        <script src="/js/app.js"> </script>
    </body>
</html>
