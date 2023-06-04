@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit SubCategory</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('subcategory.update', $subcategory->id ) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $subcategory->id }}">
                            {{-- <input type="hidden" name="old_image" value="{{ $category->category_icon }}"> --}}

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Category Select <span class="text-danger">*</span></h5>
									<select name="category_id" class="form-control">
										<option value="" selected disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error ('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">SubCategory English<span class="text-danger">*</span></h5>
                                    <input type="text" name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}" class="form-control">
                                    @error ('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">SubCategory Bangla<span class="text-danger">*</span></h5>
                                    <input type="text" name="subcategory_name_bn" value="{{ $subcategory->subcategory_name_bn }}" class="form-control">
                                    @error ('subcategory_name_bn')
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
