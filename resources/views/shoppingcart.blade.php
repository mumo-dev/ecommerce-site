@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h3> Your Shopping cart</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <app-cart :id="{{ Auth::user()->id }}"></app-cart>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection