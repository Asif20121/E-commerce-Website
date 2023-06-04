@extends('admin.admin_master')
@section('admin')

      <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Upazila</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('upazila.update', $upazila->id) }}">
                            @csrf

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Divison Select<span class="text-danger">*</span></h5>
									<select name="division_id" class="form-control">
										<option value="" selected disabled="">Select Divison</option>
                                        @foreach($division as $div)
                                            <option value="{{ $div->id }}" {{ $div->id == $upazila->division_id ? 'selected' : '' }}>{{ $div->division_name }}</option>
                                        @endforeach
									</select>
                                    @error ('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">District Select<span class="text-danger">*</span></h5>
									<select name="district_id" class="form-control">
										<option value="" selected disabled="">Select District</option>
                                        @foreach($district as $dis)
                                            <option value="{{ $dis->id }}" {{ $dis->id == $upazila->district_id ? 'selected' : '' }}>{{ $dis->district_name }}</option>
                                        @endforeach
									</select>
                                    @error ('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror    
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5 class="head-text">Upazila Name<span class="text-danger">*</span></h5>
                                    <input type="text" name="upazila_name" value="{{$upazila->upazila_name  }}" class="form-control">
                                    @error ('upazila_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="text-xs-right d-flex justify-content-around" style="margin-left:600px;">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5 mt-5" value="Update">
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

@endsection
