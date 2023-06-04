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
                    <h3 class="box-title">Edit Coupon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('coupon.update', $coupons->id) }}">
                            @csrf
                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5>Coupon Name<span class="text-danger">*</span></h5>
                                    <input type="text" name="coupon_name" value="{{ $coupons->coupon_name }}" class="form-control">
                                    @error ('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5>Coupon Discount (%)<span class="text-danger">*</span></h5>
                                    <input type="text" name="coupon_discount" value="{{ $coupons->coupon_discount }}" class="form-control">
                                    @error ('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <div class="controls col-md-6">
                                    <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                                    <input type="date" name="coupon_validity" value="{{ $coupons->coupon_validity }}" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error ('coupon_validity')
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
