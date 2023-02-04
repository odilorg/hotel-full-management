@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Add new Log') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Add new Log') }}</li>
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
                            <form action="{{ route('shift_logs.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Log Description') }}</label>
                                    <input type="text" value="{{ old('shift_log_description') }}" name="shift_log_description" class="form-control  @error('shift_log_description')
                                    {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Log Description">
                                    @error('shift_log_description')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Room N') }}</label>
                                    <select class="custom-select rounded-0" name="room_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Room</option>
                                        @foreach ($rooms as $room )
                                        <option value="{{ $room->id }}">{{ $room->room_number }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
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