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
                                <h3 class="card-title">Services</h3>
                                <a href="{{route('seller.sellerservices.create')}}" class="btn btn-primary float-right">Create</a>
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>
                                                <img src="{{ URL::to('/') }}/uploads/images/{{ @$row->image }}" style="width: 200px;" />
                                            </td>
                                            <td>{{@$row->name}}</td>
                                            <td>&#x20B9;{{@$row->price}}</td>

                                            <td>{{@$row->status}}</td>
                                            <td>
                                                <a href="{{ route('seller.sellerservices.edit', $row->id) }}" class="btn"><i class="fas fa-edit" style="color: blue;"></i></a>
                                                <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                                                <form id="resource-delete-{{ $row->id }}" action="{{ route('seller.sellerservices.destroy', $row->id) }}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {!! $data->links() !!}
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
