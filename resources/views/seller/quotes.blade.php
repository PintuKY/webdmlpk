@extends('seller.layouts.app')
@section('content')
    <div class="content-wrapper"><br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Quotes</h3>
 <a href="{{route('seller.create.quote')}}" class="btn btn-primary float-right">Create Quote</a>
								
                            </div>
                            @if(Session::has('flash_success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ Session::get('flash_success') }}
                                </div>
                        @endif
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
										<th>Status</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quotes as $row)

                                        <tr>
                                           <td>{{@$row->status}}</td>
                                            <td>{{@$row->name}}</td>
                                            <td>{{@$row->phone}}</td>
                                            <td>{{@$row->email}}</td>
                                            <td>
                                                {{@$row->message}}
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>

                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
