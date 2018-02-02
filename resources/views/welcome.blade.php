<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token()}}">

        <title>Online Shopping</title>

        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="/css/app.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        
    </head>
    <body>

              @include('layouts.header')
                  <hr>
                 
                  <div id="app">
                        <div class="text-center">
                             <input type="search" v-model="searchItem" placeholder="search..." class="searchbar"/>
                             <button class="btn btn-primary">search 
                                 <i class="fa fa-search"></i>
                             </button>
                        </div>
                         
                      <div class="row">

                          <div class="col-md-3">
                            <div class="sidebar">
                                <h4>sidebar</h4>
                            </div>
                          </div>
                     
                        <div class="col-md-9">
                            <div class="main">
                                <app-products :products="products"></app-products>
                            </div>

                            <nav class="text-center">
                                <div class="pagination">
                                  <button @click="fetchProducts(pagination.previous_url)"
                                    :disabled="!pagination.previous_url"
                                    class="btn btn-primary">Previous</button>
                                  <span>
                                    @{{ pagination.current_page }} / @{{ pagination.last_page }}
                                  </span>
                                  <button @click="fetchProducts(pagination.next_url)" class="btn btn-primary"
                                    :disabled="!pagination.next_url">Next</button>
                                  </div>
                            </nav>

                        </div>
                    </div>
                </div>
                  
            
    
        <script src="/js/app.js"> </script>
    </body>
</html>
