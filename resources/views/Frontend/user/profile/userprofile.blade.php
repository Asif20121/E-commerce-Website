@extends('frontend.master')
@section('mainpage')
@section('title')
FM SHOP|| Change Password
@endsection

<div class="content_one" id="profile_content_one" >
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center; padding-top: 20px; width: 100%; font-size: 50px; color: coral;">Profile</h5>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ URL::to('storage/user/profile_image/', $user_data->profile_photo_path) }}" alt="{{$user_data->profile_photo_path}}" width="200px" height="200px">
                <h1 style="margin-top: 25px; padding-left:35px; color:crimson;">{{  $user_data->name==null ? "User name not set yet!" : $user_data->name }}</h1>
                <div><span>
                        <h3>Email:</h3>
                    </span>
                    <span>
                        <h3 style="color:blueviolet; padding-left:25px;">{{  $user_data->email==null ? "" : $user_data->email }} </h3>
                    </span>
                </div>
                <div>
                    <span>
                        <h3>Phone:</h3>
                    </span>
                    <span>
                        <h3 style="padding-left:25px; color:cornflowerblue;">{{ $user_data->phone==null ? "User Phone not set yet!" : $user_data->phone}}</h3>
                    </span>
                </div>
                <div><span>
                        <h3>Date of Birth:</h3>
                    </span>
                    <span>
                    <h3 style="padding-left:25px; color:cornflowerblue;">
                    {{ $user_data->date_of_birth==null ? "User Date of birth not set yet!" : $user_data->date_of_birth }}
                    </h3>
                </span>
            </div>
            </div>
            <div class="col-md-6 mt-5" style="display: block;">
                <form method="POST" action="{{ route('user.profile.update',$user_data->id) }}" enctype="multipart/form-data" style="margin: 15px;">
                    @csrf
                    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="text-align: center; padding-top: 20px; width: 100%; font-size: 30px; color: coral;">Profile Update:</h5>
    </div>
                    <h3>User Name:</h3>
                    <input class="modal_input" type="text" name="name" placeholder="User Name" required value="{{$user_data->name}}">
                    <h3>Email Address:</h3>
                    <input class="modal_input" type="email" name="email" placeholder="Email Address" required value="{{$user_data->email}}">
                    <h3>Phone Number:</h3>
                    <input class="modal_input" type="phone" name="phone" placeholder="Phone Number" required value="{{$user_data->phone}}">
                    <h3>Birthday:</h3>
                    <input class="modal_input" type="date" name="birthdate" placeholder="Birthday" required value="{{$user_data->date_of_birth}}">
                    <h3>Profile Image:</h3>
                    <input class="modal_input" type="file" name="profile_image">
                    <button class="modal_button" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection