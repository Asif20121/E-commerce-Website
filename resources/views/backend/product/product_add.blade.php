@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
      <!-- Content Header (Page header) -->	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add Product</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data">
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
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
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
                                                <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                            
                                        </select>
                                        @error ('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror    
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" required="" placeholder="Product name english"> 
                                        @error ('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Name Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_bn" class="form-control" required="" placeholder="Product name bnngla"> 
                                        @error ('product_name_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 2nd row -->


                        <div class="row"> <!-- start 3rd row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Code <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" placeholder="Product code"> 
                                        @error ('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Quantity <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" placeholder="Product quantity"> 
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
                                        <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required=""> 
                                        @error ('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 --> --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" required="" placeholder="selling price"> 
                                        @error ('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                            
                        </div> <!-- end 3rd row -->


                        {{-- <div class="row"> <!-- start 4th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Tags Bn <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_bn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" required=""> 
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
                                        <input type="text" name="product_size_en" class="form-control" value="Small,Midium,Large" data-role="tagsinput" required=""> 
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
                                        <input type="text" name="product_size_bn" class="form-control" value="Small,Midium,Large" data-role="tagsinput" required=""> 
                                        @error ('product_size_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 4th row --> --}}


                        {{-- <div class="row"> <!-- start 5th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Color En <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control" value="Red,Black,Amet" data-role="tagsinput" required=""> 
                                        @error ('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Color Bn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_bn" class="form-control" value="Red,Black,Large" data-role="tagsinput" required=""> 
                                        @error ('product_color_bn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Selling Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" required="" placeholder="selling price"> 
                                        @error ('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 5th row --> --}}


                        <div class="row"> <!-- start 6th row -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Product Discount Price <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" required="" placeholder="discount price"> 
                                        @error ('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Main Thambnail <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required=""> 
                                        @error ('product_thambnail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="" id="mainThmb">
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5 class="head-text">Multiple Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required=""> 
                                        @error ('multi_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row" id="preview_img"></div>
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->
                        </div> <!-- end 6th row -->


                        <div class="row"> <!-- start 7th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Short Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea> 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Short Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_descp_bn" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->
                        </div> <!-- end 7th row -->
                        

                        <div class="row"> <!-- start 8th row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Long Description English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_descp_en" rows="5" cols="50" required=""></textarea> 
                                    </div>
                                </div>
                            </div> <!-- end col md 6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5 class="head-text">Long Description Bangla <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_descp_bn" rows="5" cols="50" required=""></textarea>
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
                                            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                            <label for="checkbox_2">Hot Deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                            <label for="checkbox_3">Featured</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                <div class="controls">
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                            <label for="checkbox_4">Special Offer</label>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                            <label for="checkbox_5">Special Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                      <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info float-right mb-5 mt-5" value="Add Product">
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
                                $('select[name="subcategory_id"]').append('<option selected value="" >Select None</option>');
                                    $.each(data, function(key, value) {

                                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                                    });
                            },
                        });
                    }
                    // else {
                    //     alert('danger');
                    // }
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
                                $('select[name="subsubcategory_id"]').append('<option selected value=""  >Select None</option>');
                                    $.each(data, function(key, value) {
                                        $('select[name="subsubcategory_id"]').append('<option  value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                                    });
                            },
                        });
                    }
                    // else {
                    //     alert('danger');
                    // }
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
