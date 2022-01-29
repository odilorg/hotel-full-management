@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Transport</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Transport</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid ">
            <form action="/transports/{{ $transport->id }}" method="POST">
                @csrf
                <div class="card card-primary bs-form-wrappe">
                    <div class="card-header">
                        <h3 class="card-title">Transport Detals</h3>
                    </div> <!-- /.card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Tour Group</label>
                            <select class="custom-select rounded-0" name="tourgroup_id" id="exampleSelectRounded0">
                                @foreach ($transports as $transport )
                                <option value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Transport Status</label>
                            <select class="custom-select rounded-0" name="transport_status" id="exampleSelectRounded0">
                                <option {{ $transports->transport_status == 'OK' ? 'selected' : '' }}>{{ $transports->transport_status }}</option>
                                <option {{ $transports->transport_status == 'Pending' ? 'selected' : '' }}>{{ $transports->transport_status }}</option>
                                <option {{ $transports->transport_status == 'Cancelled' ? 'selected' : '' }}>{{ $transports->transport_status }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Transport type</label>
                            <select class="custom-select rounded-0" name="transport_type" id="exampleSelectRounded0">
                                <option {{ $transports->transport_type == 'Auto' ? 'selected' : '' }}>{{ $transports->transport_type }}</option>
                                <option {{ $transports->transport_type == 'Air' ? 'selected' : '' }}>{{ $transports->transport_type }}</option>
                                <option {{ $transports->transport_type == 'Train' ? 'selected' : '' }}>{{ $transports->transport_type }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" value="Sedan" {{ $transports->auto_type == 'Sedan' ? 'checked' : '' }} type="radio" name="auto_type">
                                <label class="form-check-label">Sedan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" {{ $transports->auto_type == 'Mini Bus' ? 'checked' : '' }} value="Mini Bus" type="radio" name="auto_type">
                                <label class="form-check-label">Mini Bus</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="Bus" {{ $transports->auto_type == 'Bus' ? 'checked' : '' }} type="radio" name="auto_type">
                                <label class="form-check-label">Bus</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Car extra features</label>
                            <input type="text" value="{{ old('car_extra_features', 'car_extra_features') }}" name="car_extra_features" class="form-control @error('car_extra_features')
              {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Car Extra">
                            @error('car_extra_features')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card card-success ">
                    <!--start here -->
                    <div class="card-header ">
                        <h3 class="card-title">Itinarary</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Transport type</label>
                            <select class="custom-select rounded-0" name="pickup_or_dropoff_or_marshrut[]"
                                id="exampleSelectRounded0">
                                <option {{ $transports->pickup_or_dropoff_or_marshrut == 'Pickup' ? 'selected' : '' }}>{{ $transports->pickup_or_dropoff_or_marshrut }}</option>
                                <option {{ $transports->pickup_or_dropoff_or_marshrut == 'Dropoff' ? 'selected' : '' }}>{{ $transports->pickup_or_dropoff_or_marshrut }}</option>
                                <option {{ $transports->pickup_or_dropoff_or_marshrut == 'Marshrut' ? 'selected' : '' }}>{{ $transports->pickup_or_dropoff_or_marshrut }}</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Date and time:</label>
                            <div class="input-group date">
                                <input type="datetime-local" name="pickup_or_dropoff_date_time">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>From</label>
                                    <input type="text" class="form-control" name="pickup_or_dropoff_from"
                                        placeholder="From">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="text" class="form-control" name="pickup_or_dropoff_to"
                                        placeholder="TO">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Deiver Name</label>
                                    <input type="text" class="form-control" name="driver_name"
                                        placeholder="Driver Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Driver Tel</label>
                                    <input type="text" class="form-control" name="driver_tel"
                                        placeholder="Driver Tel">
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.card-body -->
                </div>
                <button type="submit" class="btn btn-block btn-primary">Submit</button>

            </form> <!-- /.card-body -->
        </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<!-- /.content -->
</div>
<!-- add jqury to add inputs for itinarary -->




@endsection
