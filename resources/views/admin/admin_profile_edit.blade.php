@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">

             <div class="box bg-light">
               <div class="box-header with-border">
                 <h4 class="box-title">Admin Profile Edit</h4>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin User Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" value="{{ $editData->name }}" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Admin Email<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Profile Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="profile_photo_path" class="form-control" required="" id="image"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <img id="showImage" src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin_images/'.$editData->profile_photo_path) 
                                            : url('upload/no_image.jpg') }}" style="width: 300px; height: 250px;" alt="">
                                        </div>
                                    </div>
                                    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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


    @push('js')
        <script>
            $(document).ready(function() {
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showImage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endpush

@endsection