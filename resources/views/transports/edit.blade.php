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
            <form action="/transports/{{ $transports->id }}" method="POST">
                @csrf
                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title">Transport Detals</h3>
                    </div> <!-- /.card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Tour Group</label>
                            <select class="custom-select rounded-0" name="tourgroup_id" id="exampleSelectRounded0">
                                @foreach ($tourgroups as $tourgroup )
                                <option value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Transport Status</label>
                            <select class="custom-select rounded-0" name="transport_status" id="exampleSelectRounded0">
                                <option {{ $transports->transport_status == 'OK' ? 'selected' : '' }}>OK</option>
                                <option {{ $transports->transport_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option {{ $transports->transport_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="card card-success bs-form-wrappe ">
                    <!--start here -->
                    <div class="card-header ">
                        <h3 class="card-title">Itinarary</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Choose Transport type</label>
                            <select class="custom-select rounded-0" name="transport_type"  id="train">
                                <option value="Auto" {{ $transports->transport_type == 'Auto' ? 'selected' : '' }}>Auto</option>
                                <option value="Air" {{ $transports->transport_type == 'Air' ? 'selected' : '' }}>Air</option>
                                <option value="Train" {{ $transports->transport_type == 'Train' ? 'selected' : '' }}>Train</option>
                            </select>
                        </div>
                        <div id="trainFieldDiv">
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Choose Train Name</label>
                                <select class="custom-select rounded-0" name="train_name" id="trainField">
                                    <option {{ $transports->train_name == 'Afrosiab' ? 'selected' : '' }}>Afrosiab</option>
                                    <option {{ $transports->train_name == 'Shark' ? 'selected' : '' }}>Shark</option>
                                    <option {{ $transports->train_name == 'Standard' ? 'selected' : '' }}>Standard</option>
                                </select>
                            </div>
                            <div class="form-group" id="ticket_classFieldDiv">
                                <label for="exampleSelectRounded0">Choose Train Ticket Class</label>
                                <select class="custom-select rounded-0" name="train_ticket_class"
                                    id="ticket_classField">
                                    <option {{ $transports->train_ticket_class == 'Econom' ? 'selected' : '' }}>Econom</option>
                                    <option {{ $transports->train_ticket_class == 'Business' ? 'selected' : '' }}>Business</option>
                                    <option {{ $transports->train_ticket_class == 'VIP' ? 'selected' : '' }}>VIP</option>
                                    <option {{ $transports->train_ticket_class == 'Plaskard' ? 'selected' : '' }}>Plaskard</option>
                                    <option {{ $transports->train_ticket_class == 'Kupe' ? 'selected' : '' }}>Kupe</option>
                                </select>
                            </div>
                        </div>
                        <div id="auto">
                            <div class="form-group" id="auto_type">
                                <div class="form-check">
                                    <input class="form-check-input"  value="Sedan" {{ $transports->auto_type == 'Sedan' ? 'checked' : '' }} type="radio" name="auto_type">
                                    <label class="form-check-label">Sedan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Mini Bus" {{ $transports->auto_type == 'Mini Bus' ? 'checked' : '' }} type="radio" name="auto_type">
                                    <label class="form-check-label">Mini Bus</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Bus" {{ $transports->auto_type == 'Bus' ? 'checked' : '' }} type="radio" name="auto_type">
                                    <label class="form-check-label">Bus</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Car Make</label>
                                <input type="text" value="{{ old('car_make', $transports->car_make) }}" class="form-control" name="car_make" placeholder="Car make">
                            </div>
                        </div>
                        <div class="form-group" id="air">
                            <label for="exampleSelectRounded0">Choose Air Ticket Class</label>
                            <select class="custom-select rounded-0" name="air_ticket_class" id="ticket_classField">
                                <option {{ $transports->air_ticket_class == 'Econom' ? 'selected' : '' }}>Econom</option>
                                <option {{ $transports->air_ticket_class == 'Business' ? 'selected' : '' }}>Business</option>
                                <option {{ $transports->air_ticket_class == 'VIP' ? 'selected' : '' }}>VIP</option>
                            </select>
                        </div>
                        <div class="form-group" id="car_extra_features">
                            <label for="exampleInputEmail1">Extra Info Transport</label>
                            <input type="text" value="{{ old('extra_info_transport', $transports->extra_info_transport) }}" name="extra_info_transport" class="form-control @error('extra_info_transport')
                                      {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Extra Info Transport">
                            @error('extra_info_transport')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Choose Transport type</label>
                                    <select class="custom-select rounded-0" name="pickup_or_dropoff_or_marshrut"
                                        id="exampleSelectRounded0">
                                        <option {{ $transports->pickup_or_dropoff_or_marshrut == 'Pickup' ? 'selected' : '' }}>Pickup</option>
                                        <option {{ $transports->pickup_or_dropoff_or_marshrut == 'Dropoff' ? 'selected' : '' }}>Dropoff</option>
                                        <option {{ $transports->pickup_or_dropoff_or_marshrut == 'Marshrut' ? 'selected' : '' }}>Marshrut</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Extra Info</label>
                                    <input type="text" class="form-control" value="{{ old('extra_info', $transports->extra_info) }}" name="extra_info" placeholder="Extra info">
                                </div>
                            </div>
                            @error('extra_info')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>From</label>
                                    <input type="text" class="form-control" value="{{ old('pickup_or_dropoff_from', $transports->pickup_or_dropoff_from) }}" name="pickup_or_dropoff_from"
                                        placeholder="From">
                                </div>
                                @error('pickup_or_dropoff_from')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <input type="text" class="form-control" value="{{ old('pickup_or_dropoff_to', $transports->pickup_or_dropoff_to) }}" name="pickup_or_dropoff_to"
                                        placeholder="TO">
                                </div>
                            </div>
                            @error('pickup_or_dropoff_to')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Driver Name</label>
                                    <input type="text" class="form-control" value="{{ old('driver_name', $transports->driver_name) }}" name="driver_name"
                                        placeholder="Driver Name">
                                </div>
                                @error('driver_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Driver Tel</label>
                                    <input type="text" class="form-control" value="{{ old('driver_tel', $transports->driver_tel) }}" name="driver_tel"
                                        placeholder="Driver Tel">
                                </div>
                                @error('driver_tel')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date and time:</label>
                                      <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                          <input type="text" value="{{ old('pickup_or_dropoff_date_time', $transports->pickup_or_dropoff_date_time) }}"   name="pickup_or_dropoff_date_time" class="form-control datetimepicker-input" data-target="#reservationdatetime">
                                          <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                            
                        </div>
                        @error('pickup_or_dropoff_date_time')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
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
