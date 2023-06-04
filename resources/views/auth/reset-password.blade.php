@extends('frontend.master')
@section('mainpage')
@section('title')
Home Easy Online Shop
@endsection

<div class="content_one">
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Reset Password </h4>
     <form method="POST" action="{{ route('password.update') }}">
            @csrf
     <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
    </form>   
</div>
</div>
@endsection
