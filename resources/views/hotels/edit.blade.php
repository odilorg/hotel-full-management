@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="/hotels/{{ $hotel->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel Name</label>
                                    <input type="text" value="{{ old('hotel_name', $hotel->hotel_name) }}" name="hotel_name" class="form-control  @error('hotel_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Hotel Name">
                                    @error('hotel_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel slug</label>
                                    <input type="text" value="{{ old('hotel_slug', $hotel->hotel_slug) }}" name="hotel_slug" class="form-control @error('hotel_slug')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel Slug">
                                    @error('hotel_slug')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel Address</label>
                                    <input type="text" value="{{ old('hotel_address', $hotel->hotel_address) }}" name="hotel_address" class="form-control @error('hotel_address')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel Address">
                                    @error('hotel_address')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel Room Quantity</label>
                                    <input type="text" value="{{ old('hotel_room_quantity', $hotel->hotel_room_quantity) }}" name="hotel_room_quantity" class="form-control @error('hotel_room_quantity')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel room quantity">
                                    @error('hotel_room_quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel Phone</label>
                                    <input type="text" value="{{ old('hotel_phone', $hotel->hotel_phone) }}" name="hotel_phone" class="form-control @error('hotel_phone')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel phone">
                                    @error('hotel_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel Email</label>
                                    <input type="text" value="{{ old('hotel_email', $hotel->hotel_email) }}" name="hotel_email" class="form-control @error('hotel_email')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel Email">
                                    @error('hotel_email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Property Id</label>
                                    <input type="text" value="{{ old('property_id', $hotel->property_id) }}" name="property_id" class="form-control @error('property_id')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Propert Id">
                                    @error('property_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-6 -->



            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>



@endsection
