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
                <h3 class="box-title">Product List <span class="badge badge-pill badge-danger">{{ count($products) }}</span></h3>
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
                              <th class="text-center">Action</th>
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
                                <td width="20%">{{ Str::limit($item->product_name_en, 35) }}</td>
                                <td class="text-center">{{ $item->selling_price }} Taka</td>
                                <td class="text-center">{{ $item->product_qty }} Pic</td>
                                <td width="5%" class="text-center">
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
                                <td width="30%" class="text-center">
                                    <a href="{{ route('details-view-product',$item->id) }}" class="btn btn-primary btn-sm" title="Product Details Data"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger btn-sm delete_data" title="Delete Data"><i class="fa fa-trash"></i></a>

                                    {{-- ///////// Status Section Active In-active ///////// --}}
                                    @if ($item->status == 1)
                                      <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                    @else
                                      <a href="{{ route('product.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
