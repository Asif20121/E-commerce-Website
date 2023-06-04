@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Sub-SubCategory</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('subsubcategory.update', $subsubcategories->id) }}">
                            @csrf
                             
                            <input type="hidden" name="id" value="{{ $subsubcategories->id }}">

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Category Select <span class="text-danger">*</span></h5>
									<select name="category_id" class="form-control">
										<option value="" selected disabled="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected' : ''}}>{{ $category->category_name_en }}</option>
                                        @endforeach
									</select>
                                    @error ('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">SubCategory Select <span class="text-danger">*</span></h5>
									<select name="subcategory_id" class="form-control">
										<option value="" selected disabled="">Select SubCategory</option>
                                        @foreach($subcategories as $subsub)
                                            <option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected' : ''}}>{{ $subsub->subcategory_name_en }}</option>
                                        @endforeach
									</select>
                                    @error ('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Sub-SubCategory English<span class="text-danger">*</span></h5>
                                    <input type="text" name="subsubcategory_name_en" value="{{ $subsubcategories->subsubcategory_name_en }}" class="form-control">
                                    @error ('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Sub-SubCategory Bangla<span class="text-danger">*</span></h5>
                                    <input type="text" name="subsubcategory_name_bn" value="{{ $subsubcategories->subsubcategory_name_bn }}" class="form-control">
                                    @error ('subsubcategory_name_bn')
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
