@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Hotel Reservation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Hotel Reservation</li>
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
                <form action="{{ route('hotelreservations.store') }}" method="POST">
                  <div class="form-group">
                    <label for="exampleSelectRounded0">Choose Tour Group</label>
                    <select class="custom-select rounded-0" name="tour_id" id="exampleSelectRounded0">
                      @foreach ($tourgroups as $tourgroup )
                      <option  value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>  
                      @endforeach
                      
                      
                    </select>
                  </div>
                  <div class="form-group">
                    @csrf
                  <label for="exampleInputEmail1">Hotel City</label>
                  <input type="text" value="{{ old('hotel_city') }}" name="hotel_city" class="form-control  @error('hotel_city')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Hotel City">
                  @error('hotel_city')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hotel Name</label>
                  <input type="text" value="{{ old('hotel_name') }}" name="hotel_name" class="form-control @error('hotel_name')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel Name">
                  @error('hotel_name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Check In Date:</label>
                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                        <input type="text" value="{{ old('checkin_date') }}" name="checkin_date" class="form-control date @error('checkin_date')
                        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('checkin_date')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Check Out Date:</label>
                    <div class="input-group " id="reservationdate2" data-target-input="nearest">
                        <input type="text" value="{{ old('checkout_date') }}" name="checkout_date" class="form-control date @error('checkout_date')
                        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('checkout_date')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Early Checkin</label>
                  <input type="text" value="{{ old('early_checkin') }}" name="early_checkin" class="form-control @error('early_checkin')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Early Checkin">
                  @error('early_checkin')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Late Checkout</label>
                  <input type="text" value="{{ old('late_checkout') }}" name="late_checkout" class="form-control @error('late_checkout')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Late checkout">
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