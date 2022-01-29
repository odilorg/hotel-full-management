@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update the Hotel reservation</li>
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
                            <form action="/hotelreservations/{{ $hotelres->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Choose Tour Group</label>
                                    <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                        @foreach ($tourgroups as $tourgroup )
                                        <option {{ $tourgroup->tourgroup_name == $tourgroup_name ? 'selected' : '' }}>{{ $tourgroup->tourgroup_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                   
                                    <label for="exampleInputEmail1">Hotel City</label>
                                    <input type="text" name="hotel_city" class="form-control"
                                        value="{{ $hotelres->hotel_city }}" id="exampleInputEmail1"
                                        placeholder="Hotel City">
                                    @error('hotel_city')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hotel Name</label>
                                    <input type="text" value="{{ $hotelres->hotel_name }}" name="hotel_name"
                                        class="form-control" id="exampleInputEmail1" placeholder="Hotel Name">
                                    @error('hotel_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Check In Date:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ $hotelres->checkin_date }}" name="checkin_date"
                                            class="form-control datetimepicker-input" data-target="#reservationdate">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('checkin_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Check Out Date:</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" value="{{ $hotelres->checkout_date }}" name="checkout_date"
                                            class="form-control datetimepicker-input" data-target="#reservationdate2">
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('checkout_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Early Checkin</label>
                                    <input type="text" value="{{ $hotelres->early_checkin }}" name="early_checkin"
                                        class="form-control" id="exampleInputEmail1" placeholder="Hotel Name">
                                    @error('early_checkin')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Late Checkout</label>
                                    <input type="text" value="{{ $hotelres->late_checkout }}" name="late_checkout"
                                        class="form-control" id="exampleInputEmail1" placeholder="Hotel Name">
                                    @error('late_checkout')
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
