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
                                <h3 class="card-title">Create Hotels</h3>
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
                            <form enctype="multipart/form-data" role="form" id="myform" method="post" action="{{ route('seller.hotels.store') }}">
                                @csrf

                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="form-group">
                                                <label for="price">Hotel Name <span class="required">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Hotel Name" />
                                                @if ($errors->has('name'))
                                                    <span class="required">
                                                    <strong>{{ $errors->first('name') }}</strong>
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
                                                <label>Price Description <span class="required">*</span></label>
                                                <textarea name="priceDescription" rows="4" placeholder="Enter Price Description" class="form-control">{{ old('priceDescription') }}</textarea>
                                                @if ($errors->has('priceDescription'))
                                                    <span class="required">
                                    <strong>{{ $errors->first('priceDescription') }}</strong>
                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Google Location Link <span class="required">*</span></label>
                                                <textarea name="google_location" rows="2" placeholder="Enter Description" class="form-control">{{ old('google_location') }}</textarea>
                                                @if ($errors->has('google_location'))
                                                    <span class="required">
                                    <strong>{{ $errors->first('google_location') }}</strong>
                                </span>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="price">Price <span class="required">*</span></label>
                                                        <input type="number" min="0" name="price" id="price" class="form-control" placeholder="Enter Price" value="{{ old('price') }}" />
                                                        @if ($errors->has('price'))
                                                            <span class="required">
                                                                <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="bed_size">Bed Type <span class="required">*</span></label>
                                                        <select name="bed_size" class="form-control">
                                                            <option value="Queen">Queen Size</option>
                                                            <option value="King">King Size</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="room_square_feet">Room Square feet <span class="required">*</span></label>
                                                        <input type="number" min="0" name="room_square_feet" id="room_square_feet" class="form-control" placeholder="Enter Room Square feet" value="{{ old('room_square_feet') }}" />
                                                        @if ($errors->has('room_square_feet'))
                                                            <span class="required">
                                                            <strong>{{ $errors->first('room_square_feet') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
											 <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="extra">Children Extra Charge <span class="required">*</span></label>
                                                        <input type="number" min="0" name="childrenExtra" id="childrenExtra" class="form-control" placeholder="Enter children Extra Charge" value="{{ old('childrenExtra') }}" />
                                                        @if ($errors->has('childrenExtra'))
                                                            <span class="required">
                                                                <strong>{{ $errors->first('childrenExtra') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                               
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="adultExtra">Adult Extra<span class="required">*</span></label>
                                                        <input type="number" min="0" name="adultExtra" id="adultExtra" class="form-control" placeholder="Enter Adult Extra" value="{{ old('adultExtra') }}" />
                                                        @if ($errors->has('adultExtra'))
                                                            <span class="required">
                                                            <strong>{{ $errors->first('adultExtra') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                             
<div class="form-group">
                                                <label for="price">Available Rooms <span class="required">*</span></label>
                                                <input type="number" min="0" name="available_rooms" id="available_rooms" class="form-control" value="{{ old('available_rooms') }}" placeholder="Enter Available Room" />
                                                @if ($errors->has('available_rooms'))
                                                    <span class="required">
                                                    <strong>{{ $errors->first('available_rooms') }}</strong>
                                                </span>
                                                @endif
                                            </div>
											<div class="form-group">
                                                <label for="price"> Room Capacity <span class="required">*</span></label>
                                                <input type="number" min="0" name="roomCapacity" id="roomCapacity" class="form-control" value="{{ old('roomCapacity') }}" placeholder="Enter Room Capacity" />
                                                @if ($errors->has('roomCapacity'))
                                                    <span class="required">
                                                    <strong>{{ $errors->first('roomCapacity') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Ameneties <span class="required">*</span></label> <br>
                                                @foreach($amenities as $amenity)
                                                <input value="{{$amenity->id}}" type="checkbox" name="amenities[]" checked>  {{$amenity->name}}
                                                @endforeach
                                            </div>
											<div class="form-group">
                                                <label for="image">Choose First Image <span class="required">*</span></label>
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
                                                <label for="image">Choose Second Image <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imageTwo" class="custom-file-input" id="imageTwo" required>
                                                        @if ($errors->has('imageTwo'))
                                                            <span class="required">
                                                                <strong>{{ $errors->first('imageTwo') }}</strong>
                                                            </span>
                                                        @endif
                                                        <label class="custom-file-label" for="imageTwo">Choose image file</label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="image">Choose Third Image <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imageThree" class="custom-file-input" id="imageThree" required>
                                                        @if ($errors->has('imageThree'))
                                                            <span class="required">
                                                                <strong>{{ $errors->first('imageThree') }}</strong>
                                                            </span>
                                                        @endif
                                                        <label class="custom-file-label" for="imageThree">Choose image file</label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="image">Choose Fourth Image </label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imageFour" class="custom-file-input" id="imageFour">
                                                        @if ($errors->has('imageFour'))
                                                            <span class="required">
                                                                <strong>{{ $errors->first('imageFour') }}</strong>
                                                            </span>
                                                        @endif
                                                        <label class="custom-file-label" for="imageFour">Choose image file</label>
                                                    </div>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <label for="image">Choose Fifth Image </label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="imageFive" class="custom-file-input" id="imageFive" >
                                                        @if ($errors->has('imageFive'))
                                                            <span class="required">
                                                                <strong>{{ $errors->first('imageFive') }}</strong>
                                                            </span>
                                                        @endif
                                                        <label class="custom-file-label" for="imageFive">Choose image file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Status <span class="required">*</span></label><br>
                                                <label for="chkYes">
                                                    <input type="radio" class="status" value="Active" name="status" checked="" />
                                                    @if ($errors->has('status'))
                                                        <span class="required">
                                                              <strong>{{ $errors->first('status') }}</strong>
                                                          </span>
                                                    @endif
                                                    Active
                                                </label>
                                                <label for="chkNo">
                                                    <input type="radio" class="status" value="Inactive" name="status"/>
                                                    @if ($errors->has('status'))
                                                        <span class="required">
                                      <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                                                    @endif
                                                    Inactive
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <button id="submit" type="submit" class="btn btn-primary">Create Hotel</button>
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
