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
                <h3 class="box-title">Product Stock List <span class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body head-text">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead class="head-text">
                          <tr>
                              <th>Image</th>
                              <th>Product En</th>
                              <th class="text-center">Product Price</th>
                              <th class="text-center">Quantity</th>
                              <th class="text-center">Discount</th>
                              <th class="text-center">Status</th>
                          </tr>
                      </thead>
                      <tbody class="head-text">
                        @foreach ($products as $item)
                          <tr>
                                <td>
                                    @if ($item->product_thambnail == '' || $item->product_thambnail == null)
                                        <img src="{{ asset('upload/no_image.jpg') }}" style="height: 50px; width:70px;" alt="No Image">
                                    @else
                                        <img src="{{ URL::to('storage/products/thambnail', $item->product_thambnail) }}" style="height: 50px; width:70px;">
                                    @endif
                                </td>
                                <td width="25%">{{ Str::limit($item->product_name_en, 100) }}</td>
                                <td class="text-center">{{ $item->selling_price }} Taka</td>
                                <td class="text-center">{{ $item->product_qty }} Pic</td>
                                <td class="text-center">
                                    @if ($item->discount_price == NULL)
                                      <span class="badge badge-pill badge-danger">No Discount</span>
                                    @else   
                                      @php
                                        $amount =  $item->selling_price - $item->discount_price;
                                        $discount = ($amount/$item->selling_price) * 100;
                                      @endphp
                                      <span class="badge badge-pill badge-danger">{{round($discount) }} %</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                  @if ($item->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                  @else
                                    <span class="badge badge-pill badge-danger">InActive</span>
                                  @endif
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
        </div>
        <!-- /.row -->

      </section>
      <!-- /.content -->
    
    </div>

@endsection
