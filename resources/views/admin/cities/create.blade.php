@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Cities</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
              <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('city.add') }}">
                @csrf
                <div class="container">
                 <div class="row">
                    <div class="col-sm-12">
                          <div class="form-group">
                           
                            <label for="price">City<span class="required">*</span></label>
                            <input required type="text" name="name" id="question" class="form-control" placeholder="Enter City" />
                            @if ($errors->has('name'))
                                <span class="required">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif  
                          </div>
                         
                         
                           <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary">Create City</button>
                          </div>
                    </div>
                 </div>
                </div>
              </form>
          </div>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
