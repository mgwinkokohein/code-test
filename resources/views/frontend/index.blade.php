@extends('frontend.layouts.app')

@section('title', __('Home'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">

                    <h1>{{appName()}}</h1>

                </div><!--row-->
                <div class="row">
                    HELLO HELLO WELCOME!
                </div>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection
