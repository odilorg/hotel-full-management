@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Update new Ticket') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Update new Ticket') }}</li>
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
                            <form action="/tickets/{{ $ticket->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Tour Group</label>
                                    <select class="custom-select rounded-0" name="tourgroup_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Tour Group..</option>
                                        @foreach ($tourgroups as $tourgroup )
                                        <option {{ old('tourgroup_id', $tourgroup->tourgroup_name) == $tourgroup_name ? "selected" : "" }} value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tourgroup_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Location') }}</label>
                                    <input type="text" value="{{ old('ticket_location', $ticket->ticket_location) }}" name="ticket_location"
                                        class="form-control  @error('ticket_location')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Ticket Location">
                                    @error('ticket_location')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Name') }}</label>
                                    <input type="text" value="{{ old('monument_name', $ticket->monument_name ) }}" name="monument_name" class="form-control @error('monument_name')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Monument Name">
                                    @error('monument_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Voucher Number') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('voucher_number', $ticket->voucher_number) }}" name="voucher_number"
                                            class="form-control  @error('voucher_number')
                                      {{ 'is-invalid' }} @enderror" >
                                    </div>
                                    @error('voucher_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Voucher File') }}</label>
                                    <input type="file" value="{{ old('ticket_file', $ticket->ticket_file) }}" name="ticket_file" class="form-control @error('ticket_file')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" >
                  <img src="{{ asset('storage/' . $ticket->ticket_file) }}" width="50px" height="50px" alt="">
                                    @error('ticket_file')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Ticket Date') }}</label>
                                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                          <input type="text" value="{{ old('ticket_date',$ticket->ticket_date) }}" name="ticket_date" class="form-control @error('ticket_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate"/>
                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                      @error('ticket_date')
                                      <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                  </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Extra Info') }}</label>
                                    <input type="text" value="{{ old('ticket_extra_info', $ticket->ticket_extra_info) }}"
                                        name="ticket_extra_info" class="form-control @error('ticket_extra_info')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Restaurant Extra Info">
                                    @error('ticket_extra_info')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Status') }}</label>
                                    <select class="custom-select rounded-0" name="ticket_status"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Status</option>
                                        <option {{ old('ticket_status', $ticket->ticket_status) == "Booked" ? "selected" : "" }}
                                            value="Booked">Booked</option>
                                        <option {{ old('ticket_status', $ticket->ticket_status) == "Not Booked" ? "selected" : "" }}
                                            value="Not Booked">Not Booked</option>
                                        <option {{ old('ticket_status', $ticket->ticket_status) == "Pending" ? "selected" : "" }}
                                            value="Pending">Pending</option>
                                        <option {{ old('ticket_status', $ticket->ticket_status) == "Cancelled" ? "selected" : "" }}
                                            value="Cancelled">Cancelled</option>
                                    </select>
                                    @error('ticket_status')
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
