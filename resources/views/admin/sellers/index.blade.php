@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Sellers</h3>
				  <form action="{{ route('search') }}" method="GET" class=" float-right">
    <input type="text" name="search" required/>
    <button type="submit" class="btn btn-primary">Search</button>
</form>
              </div>
              @if(Session::has('flash_success'))
                  <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_success') }}
                  </div>
              @endif
			   @if(Session::has('flash_danger'))
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  {{ Session::get('flash_danger') }}
                  </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>Status</th>
                      <th>Shop Name</th>
                      <th>Shop Image</th>
                      <th>Seller Orders</th>
                      <th>Seller Wallets</th>
                      <th>Action</th>
                    </tr> 
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>{{@$row->name}}</td>
                      <td>{{@$row->phone}}</td>
                      <td>{{@$row->city->name}}</td>
                      <td>{{@$row->seller->status}}</td>
                      <td>{{@$row->seller->shop_name}}</td>
                      <td><img src="{{ URL::to('/') }}/uploads/shops/{{ @$row->seller->shop_image }}" style="width: 100px;" /></td>
                      <td>
                        <a href="{{ route('admin.sellers.orders', $row->id) }}" class="btn"><i class="fas fa-eye" style="color: blue;"></i></a>
                        
                      </td>
                      <td>
                        <a href="{{ route('admin.sellers.wallets', $row->id) }}" class="btn"><i class="fas fa-eye" style="color: blue;"></i></a>
                        
                      </td>
                      <td>
                        <a href="{{ route('admin.sellers.edit', $row->id) }}" class="btn"><i class="fas fa-edit" style="color: blue;"></i></a>
                        <a href="{{ route('admin.sellers.show', $row->id) }}" class="btn"><i class="fas fa-eye" style="color: blue;"></i></a>
                    <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                        <form id="resource-delete-{{ $row->id }}" action="{{ route('admin.sellers.destroy', $row->id) }}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
                          @csrf
                        </form>
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
		{!! $data->links() !!}
    </section>
@endsection
