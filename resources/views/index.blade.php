@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            {{--  <img src="{{ asset('/images/'.$product->images->first()->image_url)}}"
             width ="100%" height="300px" class="img-rounded" />  --}}
             @if(count($product->images))
             <app-image-slider :images="{{ $product->images}}" ></app-image-slider>
             @else
             <img src="{{ asset('/images/photo1.jpg')}}"
               width ="100%" height="300px" class="img-rounded" />
            @endif

        </div>
        <div class="col-md-8">
            <app-single-product :product="{{$product}}"></app-single-product>
        </div>
    </div>
    <hr>

    <div class="reviews">
       
        <div>

                <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Product Reviews</a>
            </li>
            
            <li role="presentation">
                 <a href="#creview" aria-controls="creview" role="tab" data-toggle="tab">Create Review</a>
             </li>

             <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Q/A</a>
             </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="reviews">
                <app-reviews :product_id="{{$product->id }}"></app-reviews>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile">
                
            </div>
            <div role="tabpanel" class="tab-pane fade" id="creview">
                @if(Auth::check())
                <div class="row">
                    <div style="margin-top:20px" class="col-md-6 col-md-offset-2">
                            <h3>Create your Review</h3>
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        <div class="form-group">
                            <textarea class="form-control" v-model="review"></textarea>
                        </div>
                        
                        <a class="btn btn-primary pull-right" href="#" 
                        @click.prevent="submitReview({{ $product->id }}, {{Auth::id() }})">
                        Submit</a>
                    </div>
                    <div style="margin-bottom :30px"></div>
                </div>
                @else
                  <div class="alert alert-warning">
                      You need to be logged in to create a review
                  </div>
                @endif
            </div>
            </div>

        </div>
        
        </div>
    </div>

</div>
@endsection
