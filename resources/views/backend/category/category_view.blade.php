@extends('admin.admin_master')
@section('admin')

      <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">

        <div class="col-8">
           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Category List <span class="badge badge-pill badge-danger">{{ count($category) }}</span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body head-text">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" class="head-text">
                      <thead class="head-text">
                          <tr>
                              <th>Category Icon</th>
                              <th>Category En</th>
                              <th>Category Bn</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody class="head-text">
                        @foreach ($category as $item)
                          <tr>
                                <td>
                                    @if ($item->category_icon == '' || $item->category_icon == null)
                                        <img src="{{ asset('upload/no_image.jpg') }}" style="height: 50px; width:70px;" alt="No Image">
                                    @else
                                        <img src="{{ URL::to('storage/category_icon', $item->category_icon)}}" style="height: 50px; width:70px;">
                                    @endif
                                </td>
                                <td>{{ $item->category_name_en }}</td>
                                <td>{{ $item->category_name_bn }}</td>
                                <td width="30%">
                                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger btn-sm delete_data" title="Delete Data"><i class="fa fa-trash"></i></a>
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



          <!---------------- Add Category Page -------------->



            <div class="col-4">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5 class="head-text">Category English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" class="form-control" placeholder="Category english">
                                    @error ('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="head-text">Category Bangla<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_bn" class="form-control" placeholder="Category bangla">
                                    @error ('category_name_bn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="head-text">Category Icon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="category_icon" class="form-control" placeholder="Category icon">
                                    @error ('category_icon')
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

@endsection
