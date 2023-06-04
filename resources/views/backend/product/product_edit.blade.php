@extends('admin.admin_master')
@section('admin')


    <div class="container-full">
      <!-- Content Header (Page header) -->	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit Product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('product-update', $products->id) }}">
                    @csrf
                    
                    <div class="row">
                      <div class="col-12">

                        <div class="row"> <!-- start 1st row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <h5 class="head-text">Brand Select <span class="text-danger">*</span></h5>
                                        <select name="brand_id" class="form-control" required="">
                                            <option value="" selected disabled="">Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error ('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <h5 class="head-text">Category Select <span class="text-danger">*</span></h5>
                                        <select name="category_id" class="form-control" required="">
                                            <option value="" selected disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error ('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <h5 class="head-text">SubCategory Select <span class="text-danger"></span></h5>
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected disabled="">Select SubCategory</option>
                                            @foreach($subcategory as $sub)
                                                <option value="{{ $sub->id }}" {{ $sub->id == $products->subcategory_id ? 'selected' : '' }}>{{ $sub->subcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error ('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 1st row -->


                        <div class="row"> <!-- start 2nd row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="controls">
                                        <h5 class="head-text">SubSubCategory Select <span class="text-danger"></span></h5>
                                        <select name="subsubcategory_id" class="form-control">
                                            <option value="" selected disabled="">Select SubSubCategory</option>
                                            @foreach($subsubcategory as $subsub)
                                                <option value="{{ $subsub->id }}" {{ $subsub->id == $products->subsubcategory_id ? 'selected' : '' }}>{{ $subsub->subsubcategory_name_en }}</option>
                                            @endforeach
                                        </select>
                                        @error ('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Name En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" value="{{ $products->product_name_en }}" class="form-control" required=""> 
                                        @error ('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Name Bn <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_bn" value="{{ $products->product_name_bn }}" class="form-control" required=""> 
                                        @error ('product_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 2nd row -->


                        <div class="row"> <!-- start 3rd row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" value="{{ $products->product_code }}" class="form-control"> 
                                        @error ('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" value="{{ $products->product_qty }}" class="form-control"> 
                                        @error ('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Tags En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput" required=""> 
                                        @error ('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 --> --}}
                        </div> <!-- end 3rd row -->


                        {{-- <div class="row"> <!-- start 4th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Tags Bn <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_bn" class="form-control" value="{{ $products->product_tags_bn }}" data-role="tagsinput" required=""> 
                                        @error ('product_tags_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Size En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_size_en }}" data-role="tagsinput" required=""> 
                                        @error ('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Size Bn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_bn" class="form-control" value="{{ $products->product_size_bn }}" data-role="tagsinput" required=""> 
                                        @error ('product_size_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 4th row --> --}}


                        {{-- <div class="row"> <!-- start 5th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Product Color En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control" value="{{ $products->product_color_en }}" data-role="tagsinput" required=""> 
                                        @error ('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Product Color Bn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_bn" class="form-control" value="{{ $products->product_color_bn }}" data-role="tagsinput" required=""> 
                                        @error ('product_color_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                        </div> <!-- end 5th row --> --}}


                        <div class="row"> <!-- start 6th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" value="{{ $products->selling_price }}" class="form-control" required=""> 
                                        @error ('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Product Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" value="{{ $products->discount_price }}" class="form-control" required=""> 
                                        @error ('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                        </div> <!-- end 6th row -->


                        <div class="row"> <!-- start 7th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">{!! $products->short_descp_en !!}</textarea> 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Short Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_bn" id="textarea" class="form-control" required placeholder="Textarea text">{!! $products->short_descp_bn !!}</textarea>
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                        </div> <!-- end 7th row -->
                        

                        <div class="row"> <!-- start 8th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_descp_en" rows="5" cols="50" required="">{{ strip_tags($products->long_descp_en) }}</textarea> 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Long Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_descp_bn" rows="5" cols="50" required="">{{ strip_tags($products->long_descp_bn) }}</textarea>
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                        </div> <!-- end 8th row -->


                        <hr>
                          

                        <div class="row head-text">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_2">Hot Deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_3">Featured</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_4">Special Offer</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked' : '' }}>
                                            <label for="checkbox_5">Special Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                      <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info float-right mb-5 mt-5" value="Update Product">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->



    {{-- //////////////// Thambnail Image Update Section Start //////////////////// --}}
    <section class="content">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                  <div class="box-header">
                    <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                  </div>
                  <form method="post" action="{{ route('update-product-thambnail', $products->id) }}" enctype="multipart/form-data">
                    @csrf

                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <input type="hidden" name="old_img" value="{{ $products->product_thambnail }}">

                        <div class="row row-sm">
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ URL::to('storage/products/thambnail', $products->product_thambnail) }}" class="card-img-top" style="height: 130px; width:280px;">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)">
                                                <img src="" id="mainThmb">
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info float-left mb-5 mt-5" value="Update Image">
                        </div>
                        <br>
                        <br>
                  </form>
                </div>
              </div>
        </div>
    </section>
    {{-- //////////////// Thambnail Image Update Section End //////////////////// --}}




    {{-- //////////////// Multiple Image Update Section Start //////////////////// --}}
    <section class="content">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                  <div class="box-header">
                    <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                  </div>
                  <form method="post" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row row-sm">
                            @foreach ($multiImgs as $img)   
                                <div class="col-md-3">
                                    <div class="card" style="width: 14rem;">
                                        <img src="{{ URL::to('storage/products/multi-image', $img->photo_name) }}" class="card-img-top" style="height: 130px; width:280px;">
                                        <div class="card-body">
                                          <h5 class="card-title">
                                             <a href="{{ route('product.multiimg.delete', $img->id) }}" class="btn btn-sm btn-danger delete_data" title="Delete Data"><i class="fa fa-trash"></i></a>
                                          </h5>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label for="" class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input type="file" class="form-control" name="multi_img[ {{ $img->id }} ]">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info float-left mb-5 mt-5" value="Update Image">
                        </div>
                        <br>
                        <br>
                        <br>
                  </form>
                </div>
              </div>
        </div>
  </section>
{{-- //////////////// Multiple Image Update Section End //////////////////// --}}



    </div>



    @push('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js') }}"></script> --}}
	<script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
	<script src="{{ asset('backend/js/pages/editor.js') }}"></script>

        {{-- Category Select And Sub Category, Sub-SubCategory Filtaring and Select Section Start Js --}}
        <script>
            $(document).ready(function() {
                $('select[name=category_id]').on('change', function() {
                    var category_id = $(this).val();
                    if (category_id) {
                        $.ajax({
                            url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                var d =$('select[name="subcategory_id"]').empty();
                                    $.each(data, function(key, value) {
                                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                                    });
                            },
                        });
                    }else {
                        alert('danger');
                    }
                });




                $('select[name=subcategory_id]').on('change', function() {
                    var subcategory_id = $(this).val();
                    if (subcategory_id) {
                        $.ajax({
                            url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('select[name="subsubcategory_id"]').html('');
                                var d =$('select[name="subsubcategory_id"]').empty();
                                    $.each(data, function(key, value) {
                                        $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                                    });
                            },
                        });
                    }else {
                        alert('danger');
                    }
                });

            });
        </script>
        {{-- Category Select And Sub Category, Sub-SubCategory Filtaring and Select Section End Js --}}


        {{-- Main Thambnail Image Show Section Start Js --}}
        <script>
            function mainThamUrl(input){
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        {{-- Main Thambnail Image Show Section End Js --}}


        {{-- Multiple Image Show Section Start Js --}}
        <script>
             $(document).ready(function(){
                $('#multiImg').on('change', function(){
                    if (window.File && window.FileReader && window.FileList && window.Blob) {
                        var data = $(this)[0].files;
                        $.each(data, function(index, file){
                            if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
                                var fRead = new FileReader();
                                fRead.onload = (function(file){
                                    return function(e) {
                                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).height(80);
                                        $('#preview_img').append(img);
                                    };
                                })(file);
                                fRead.readAsDataURL(file);
                            }
                        });
                    }else{
                        alert("Your browser doesn't support File API!");
                    }
                });
             });
        </script>
        {{-- Multiple Image Show Section End Js --}}


    @endpush


@endsection
