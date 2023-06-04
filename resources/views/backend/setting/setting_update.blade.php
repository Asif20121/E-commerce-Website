@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">

             <div class="box bg-light">
               <div class="box-header with-border">
                 <h4 class="box-title">Site Setting Page</h4>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="post" action="{{ route('update.sitesetting', $setting->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Site Logo<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="logo" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Phone One<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Phone Two<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone_two" class="form-control" value="{{ $setting->phone_two }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Email<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" value="{{ $setting->email }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Company Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Company Adderss<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Facebook<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Twitter<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Linkedin<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5 class="head-text">Youtube<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="youtube" class="form-control" value="{{ $setting->youtube }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info float-right mb-5" value="Update">
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