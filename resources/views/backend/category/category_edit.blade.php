@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <input type="hidden" name="old_image" value="{{ $category->category_icon }}">

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Category English<span class="text-danger">*</span></h5>
                                    <input type="text" name="category_name_en" value="{{ $category->category_name_en }}" class="form-control">
                                    @error ('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Category Bangla<span class="text-danger">*</span></h5>
                                    <input type="text" name="category_name_bn" value="{{ $category->category_name_bn }}" class="form-control">
                                    @error ('category_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Category Icon<span class="text-danger">*</span></h5>
                                    <input type="file" name="category_icon" value="{{ $category->category_icon }}" class="form-control">
                                    @error ('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <input type="submit" class="btn btn-rounded btn-info float-right mb-5 mt-5" value="Update">
                                </div>
                            </div>

                       </form>
                    </div>
                </div>
                </div>
            </div>

        </div>
      </section>
    </div>

@endsection
