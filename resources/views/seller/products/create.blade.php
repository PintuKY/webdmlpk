@extends('seller.layouts.app')
@section('content')
<div class="content-wrapper"><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              @if(Session::has('flash_error'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_error') }}
                  </div>
              @endif
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('seller.products.store') }}">
                @csrf
                @if(isset($_REQUEST['category_id']) && $_REQUEST['category_id'] != '')
                  <input type="hidden" name="parent_category_id" value="{{@$_REQUEST['category_id']}}">
                @else
                  <input type="hidden" name="parent_category_id" value="{{@$firstcategory->id}}">
                @endif
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                            <label>Select Category <span class="required">*</span></label><br>
                            @if(count($categories))
                              <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option @if(@$_REQUEST['category_id'] == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                            @else
                              No Category Found.  Please Create a Category <a href="{{ route('seller.category.create') }}">Here</a>
                            @endif
                          </div>  
                          <div class="form-group">
                            <label for="price">Product Name <span class="required">*</span></label>
                            <input type="text" name="productname" id="productname" class="form-control" value="{{ old('productname') }}" placeholder="Enter Product Name" />
                            @if ($errors->has('productname'))
                                <span class="required">
                                    <strong>{{ $errors->first('productname') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label>Description <span class="required">*</span></label>
                            <textarea name="description" rows="4" placeholder="Enter Description" class="form-control">{{ old('description') }}</textarea>
                             @if ($errors->has('description'))
                                <span class="required">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Unit <span class="required">*</span></label>
                            <input type="text" name="unit" class="form-control" placeholder="Enter Product Unit" value="{{ old('unit') }}" />
                            @if ($errors->has('unit'))
                                <span class="required">
                                    <strong>{{ $errors->first('unit') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Mrp Price <span class="required">*</span></label>
                            <input type="number" min="0" name="mrp_price" id="mrp_price" class="form-control" placeholder="Enter Mrp Price" value="{{ old('mrp_price') }}" />
                            @if ($errors->has('mrp_price'))
                                <span class="required">
                                    <strong>{{ $errors->first('mrp_price') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Selling Price <span class="required">*</span></label>
                            <input type="number" min="0" name="selling_price" id="selling_price" class="form-control" placeholder="Enter Selling Price" value="{{ old('selling_price') }}" />
                            @if ($errors->has('selling_price'))
                                <span class="required">
                                    <strong>{{ $errors->first('selling_price') }}</strong>
                                </span>
                            @endif  
                          </div>
                          <div class="form-group">
                            <label for="price">Stock Quantity <span class="required">*</span></label>
                            <input type="number" min="0" name="stock_quantity" id="stock_quantity" class="form-control" placeholder="Enter Stock Quantity" value="{{ old('stock_quantity') }}" />
                            @if ($errors->has('stock_quantity'))
                                <span class="required">
                                    <strong>{{ $errors->first('stock_quantity') }}</strong>
                                </span>
                            @endif  
                          </div>
                          
                          <div class="form-group">
                            <label for="image">Choose Image <span class="required">*</span></label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="image" required>
                                  @if ($errors->has('image'))
                                    <span class="required">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                  @endif  
                                  <label class="custom-file-label" for="image">Choose image file</label>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="price">Status <span class="required">*</span></label><br>
                              <label for="chkYes">
                                <input type="radio" class="productstatus" value="Active" name="productstatus" checked="" />
                                @if ($errors->has('productstatus'))
                                  <span class="required">
                                      <strong>{{ $errors->first('productstatus') }}</strong>
                                  </span>
                              @endif  
                                Active
                            </label>
                            <label for="chkNo">
                                <input type="radio" class="productstatus" value="Inactive" name="productstatus"/>
                                @if ($errors->has('productstatus'))
                                  <span class="required">
                                      <strong>{{ $errors->first('productstatus') }}</strong>
                                  </span>
                              @endif  
                                Inactive
                            </label>
                          </div>
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Create Product</button>
                          </div>
                    </div>
                 </div>
                </div>
              </form>
            </div>
          </div>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
