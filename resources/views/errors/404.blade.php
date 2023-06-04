@extends('frontend.master')
@section('mainpage')

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="x-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 x-text text-center">
                        <h1 class="text-danger">404</h1>
                        <p>We are sorry, the page you've requested is not available. </p>
                        <a href="{{ url('/') }}">
                            <button class="btn-default le-button"><i class="fa fa-home"></i> Go To Homepage</button>
                        </a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

@endsection