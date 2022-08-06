@extends('admin.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Service</h3>
                <a href="{{route('services.create')}}" class="btn btn-primary float-right">Create</a>
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
                      <th>Service Name</th>
                      <th>Status</th>
                      <th>Commision</th>
                      <th>Action</th>
                    </tr> 
                  </thead> 
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <td>
                        <img src="{{ URL::to('/') }}/uploads/images/{{ @$row->image }}" style="width: 300px;" />
                      </td>
                      <td>{{@$row->name}}<br>
                            
                            @if(@$row->type=="ecom")
                             [ E-commerce ]
                            @elseif(@$row->type=="service")
                              [ Service ]
                          @elseif(@$row->type=="health")
                              [ Health ]
                          @elseif(@$row->type=="education")
                              [ Education ]
                          @elseif(@$row->type=="pd")
                              [ Pick Up And  Drop ]
                          @elseif(@$row->type=="professional")
                              [ Profession ]
                          @elseif(@$row->type=="staybooking")
                              [ Stay ]
                          @endif
                            </td>
                      <td>{{@$row->status}}</td>
                      <td>{{@$row->commission}}%</td>
                      
                      <td>
                        <a href="{{ route('services.edit', $row->id) }}" class="btn"><i class="fas fa-edit" style="color: blue;"></i></a>
                        <button form="resource-delete-{{ $row->id }}"><i style="color: red;" class="fas fa-trash-alt"></i></button>
                        <form id="resource-delete-{{ $row->id }}" action="{{ route('services.destroy', $row->id) }}" style="display: inline-block;" onSubmit="return confirm('Are you sure you want to delete this item?');" method="post">
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
@endsection
