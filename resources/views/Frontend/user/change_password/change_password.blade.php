@extends('frontend.master')
@section('mainpage')
@section('title')
FM SHOP|| Change Password
@endsection

<div class="content_one" style="padding-top:1%;padding-left: 350px;padding-right: 350px;padding-bottom: 8%; min-height: 607px;">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center; padding-top: 20px; width: 100%; font-size: 50px; color: coral;">Change Password</h5>
    </div>
    <div class="row">
        <div class="col-md" style="display: block;">
        <form method="post" action="{{ route('change.password') }}">
  			@csrf
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"><h3>Current Password:</h3> <span> </span></label>
            <input class="modal_input" type="password" id="current_password" name="oldpassword" class="form-control" >
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"><h3>New Password:</h3> <span> </span></label>
            <input class="modal_input" type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1"><h3>Confirm Password:</h3> <span> </span></label>
            <input class="modal_input" type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
         <div class="form-group">            
           <button class="modal_button" type="submit" class="btn btn-danger" style="margin-top: 25px;">Update</button>
        </div>         		
  		</form> 
        </div>
    </div>
</div>
@endsection