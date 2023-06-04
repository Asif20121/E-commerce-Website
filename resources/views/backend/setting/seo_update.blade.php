@extends('admin.admin_master')
@section('admin')

    <style>
        
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">

             <div class="">
               <div class="box-header with-border">
                 <h4 class="box-title">Site Setting Page</h4>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="post" action="{{ route('update.seosetting', $seo->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="row card-body-color">
                                        <div class="col-md-12">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="head-text">Meta Title<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="head-text">Meta Author<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="head-text">Meta Keyword<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="head-text">Meta Description<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="meta_description" id="textarea" class="form-control" required placeholder="Textarea text">{{ $seo->meta_description }}</textarea> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5 class="head-text">Google Analytics<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="meta_description" id="textarea" class="form-control" required placeholder="Textarea text">{{ $seo->google_analytics }}</textarea> 
                                                        </div>
                                                    </div>
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