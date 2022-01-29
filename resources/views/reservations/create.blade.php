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
                            <form action="{{ route('reservations.store') }}" method="POST">
                              @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Booking ID</label>
                                    <input type="text" value="{{ old('bookId') }}" name="bookId" class="form-control  @error('bookId')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Booking ID">
                                    @error('bookId')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">FName</label>
                                    <input type="text" value="{{ old('guestFirstName') }}" name="guestFirstName" class="form-control @error('guestFirstName')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="First Name">
                                    @error('guestFirstName')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{ old('guestName') }}" name="guestName"  class="form-control @error('guestName')
                {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Hotel Name">
                                    @error('guestName')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room</label>
                                    <input type="text" value="{{ old('roomId') }}" name="roomId" class="form-control @error('roomId')
              {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Room">
                                    @error('roomId')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Check In Date:</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('firstNight') }}" name="firstNight" class="form-control date @error('firstNight')
                        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('firstNight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Check Out Date:</label>
                                    <div class="input-group " id="reservationdate2" data-target-input="nearest">
                                        <input type="text" value="{{ old('lastNight') }}" name="lastNight" class="form-control date @error('lastNight')
                        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate2" />
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('lastNight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adults</label>
                                    <input type="text" value="{{ old('numAdult') }}" name="numAdult" class="form-control @error('numAdult')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Adults">
                                    @error('numAdult')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" value="{{ old('price') }}" name="price" class="form-control @error('price')
                {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Price">
                                    @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Comission</label>
                                    <input type="text" value="{{ old('commission') }}" name="commission" class="form-control @error('commission')
              {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="commission">
                                    @error('commission')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Referer</label>
                                    <select class="custom-select rounded-0" name="referer"
                                        id="exampleSelectRounded0">
                                        <option value="" >Select Referer</option>
                                        <option {{ old('referer') == "Booking" ? "selected" : "" }} value="Booking">Booking</option>
                                        <option {{ old('referer') == "Firma" ? "selected" : "" }} value="Firma">Firma</option>
                                        <option {{ old('referer') == "Ind" ? "selected" : "" }} value="Ind">Ind</option>
                                    </select>
                                    @error('referer')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleSelectRounded0">Payment</label>
                                  <select class="custom-select rounded-0" name="payment_method"
                                      id="exampleSelectRounded0">
                                      <option value="" >Select Referer</option>
                                      <option {{ old('referer') == "Naqd" ? "selected" : "" }} value="Naqd">Naqd</option>
                                      <option {{ old('referer') == "Karta" ? "selected" : "" }} value="Karta">Karta</option>
                                      <option {{ old('referer') == "Perech" ? "selected" : "" }} value="Perech">Perech</option>
                                  </select>
                                  @error('referer')
                                  <p class="text-danger">{{ $message }}</p>
                                  @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Firma Name</label>
                                <input type="text" value="{{ old('company_name') }}" name="company_name" class="form-control @error('company_name')
          {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Firma name">
                                @error('company_name')
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
