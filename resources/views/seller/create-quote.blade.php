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
                                <h3 class="card-title">Create Quote</h3>
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
                            <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('seller.quote.store') }}">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Message <span class="required">*</span></label>
                                                <textarea name="message" rows="4" placeholder="Enter Message" class="form-control">{{ old('message') }}</textarea>
                                                @if ($errors->has('message'))
                                                    <span class="required">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <button id="submit" type="submit" class="btn btn-primary">Create Quote</button>
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
    </div>
@endsection
