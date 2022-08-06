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
                                <h3 class="card-title">Update Service</h3>
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
                            <div class="container">
                                <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('seller.sellerservices.update',$data->id) }}">
                                    @csrf
                                    @method('PATCH')

                                    <input type="hidden" id="id" value="{{$data->id}}">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="price">Service Name <span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $data->name }}" placeholder="Enter Service Name" />
                                                @if ($errors->has('name'))
                                                    <span class="required">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" rows="4" placeholder="Enter Description" class="form-control">{{ $data->description }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="required">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price <span class="required">*</span></label>
                                                <input type="number" min="0" name="price" id="price" class="form-control" placeholder="Enter Price" value="{{ $data->price }}" />
                                                @if ($errors->has('price'))
                                                    <span class="required">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <img src="{{ URL::to('/') }}/uploads/images/{{ @$data->image }}" style="width: 200px;" /><br>
                                                <label for="image">Choose Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="image">
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
                                                    <input type="radio" class="status" value="Active" name="status" @if($data->status == 'Active') checked @endif/>
                                                    @if ($errors->has('status'))
                                                        <span class="required">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                                    @endif
                                                    Active
                                                </label>
                                                <label for="chkNo">
                                                    <input type="radio" class="status" value="InActive" name="status" @if($data->status == 'InActive') checked @endif />
                                                    @if ($errors->has('status'))
                                                        <span class="required">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                                    @endif
                                                    Inactive
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <button id="submit" type="submit" class="btn btn-primary">Update Service</button>
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
