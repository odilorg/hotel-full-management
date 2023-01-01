@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit new Room</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit room</li>
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
                            <form action="{{ route('rooms.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Name</label>
                                    <input type="text" value="{{ old('room_name') }}" name="room_name" class="form-control  @error('room_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Room Name">
                                    @error('room_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Id</label>
                                    <input type="text" value="{{ old('room_id') }}" name="room_id" class="form-control @error('room_id')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Beds24 Room Id">
                                    @error('room_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Number</label>
                                    <input type="text" value="{{ old('room_number') }}" name="room_number" class="form-control @error('room_number')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Room Number">
                                    @error('room_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Unit Id</label>
                                    <input type="text" value="{{ old('unit_id') }}" name="unit_id" class="form-control @error('unit_id')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Beds24 Unit Id">
                                    @error('unit_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Size</label>
                                    <input type="text" value="{{ old('room_size') }}" name="room_size" class="form-control @error('room_size')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Room size">
                                    @error('room_size')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Floor</label>
                                    <input type="text" value="{{ old('room_floor') }}" name="room_floor" class="form-control @error('room_floor')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Room floor">
                                    @error('room_floor')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="hidden" id="custId" name="hotel_id" value="{{ $id }}">
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
