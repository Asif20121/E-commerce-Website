@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">

             <div class="box bg-light">
               <div class="box-header with-border">
                 <h4 class="box-title">Admin Change Password</h4>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="post" action="{{ route('update.change.password') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-flex justify-content-center">
                                                <div class="controls col-md-6">
                                                    <h5 class="head-text">Current Password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="current_password" name="oldpassword" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group d-flex justify-content-center">
                                                <div class="controls col-md-6">
                                                    <h5 class="head-text">New Password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password" name="password" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group d-flex justify-content-center">
                                                <div class="controls col-md-6">
                                                    <h5 class="head-text">Confirm Password<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group d-flex justify-content-center">
                                        <div class="controls col-md-6">
                                            <input type="submit" class="btn btn-rounded btn-info float-right mb-5 mt-5" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </form>
   
                   </div>
                 </div>
               </div>
             </div>
   
        </section>
    </div>

@endsection