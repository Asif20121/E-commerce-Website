@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


      <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">

        <div class="col-8">
           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Upazila List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body head-text">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead class="head-text">
                          <tr>
                              <th>Division Name</th>
                              <th>District Name</th>
                              <th>Upazila Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody class="head-text">
                        @foreach ($upazila as $item)
                          <tr>

                          
                                <td>{{ $item->division->division_name }}</td>
                                <td>{{ $item->district->district_name }}</td>
                                <td>{{ $item->upazila_name }}</td>
                                <td width="40%">
                                    <a href="{{ route('upazila.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('upazila.delete',$item->id) }}" class="btn btn-danger btn-sm delete_data" title="Delete Data"><i class="fa fa-trash"></i></a>
                                </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->         
          </div>
          <!-- /.col -->



          <!---------------- Add Coupon Page -------------->



            <div class="col-4">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Upazila</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('upazila.store') }}">
                            @csrf

                            <div class="form-group">
								<h5 class="head-text">Divison Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="division_id" class="form-control">
										<option value="" selected disabled="">Select Divison</option>
                                        @foreach($division as $div)
                                            <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                        @endforeach
									</select>
                                    @error ('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group">
								<h5 class="head-text">District Select<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="district_id" class="form-control">
										<option value="" selected="" disabled="">Select District</option>
                                        {{-- @foreach($district as $dis)
                                            <option value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                                        @endforeach --}}
									</select>
                                    @error ('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="head-text">Upazila Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="upazila_name" class="form-control" placeholder="Upazila name">
                                    @error ('upazila_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info float-right mb-5" value="Add New">
                            </div>
                       </form>
                    </div>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->         
            </div>

        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>


    @push('js')
        {{-- Category Select And Sub Category, Sub-SubCategory Filtaring and Select Section Start Js --}}
        <script>
            $(document).ready(function() {
                $('select[name=division_id]').on('change', function() {
                    var division_id = $(this).val();
                    if (division_id) {
                        $.ajax({
                            url: "{{  url('/shipping/district-get/ajax') }}/"+division_id,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                var d =$('select[name="district_id"]').empty();
                                $('select[name="district_id"]').append('<option selected value="" >Select None</option>');
                                $.each(data, function(key, value) {

                                    $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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
    @endpush

@endsection
