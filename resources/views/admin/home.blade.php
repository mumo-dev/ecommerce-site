@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <h3 style="margin:2px"> Admin Dashboard </h3>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center"> You are logged in as admin!</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                           <h4>saseni</h4>
                        </div>
                        <div class="col-sm-9">
                           <h4>Hello world</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</div>
@endsection
