@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Add new Expense') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Add new Expense') }}</li>
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
                            <form action="{{ route('expenses.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Report Number</label>
                                    <select class="custom-select rounded-0" name="tourgroup_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Report..</option>
                                        @foreach ($reports as $report )
                                        <option {{ old('report_id') == $report->id ? "selected" : "" }}
                                            value="{{ $report->id }}">{{ $report->report_number }}</option>
                                        @endforeach
                                    </select>
                                    @error('report_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Expense Date') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('expense_date') }}" name="expense_date" class="form-control date @error('expense_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('expense_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Expense Name') }}</label>
                                    <input type="text" value="{{ old('expense_name') }}" name="expense_name" class="form-control  @error('expense_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Expense Name">
                                    @error('expense_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Expense Category') }}</label>
                                    <select class="custom-select rounded-0" name="expense_name"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Category</option>
                                        <option {{ old('expense_name') == "Booked" ? "selected" : "" }}
                                            value="Booked">Booked</option>
                                        <option {{ old('expense_name') == "Not Booked" ? "selected" : "" }}
                                            value="Not Booked">Not Booked</option>
                                        <option {{ old('expense_name') == "Pending" ? "selected" : "" }}
                                            value="Pending">Pending</option>
                                        <option {{ old('expense_name') == "Cancelled" ? "selected" : "" }}
                                            value="Cancelled">Cancelled</option>
                                    </select>
                                    @error('expense_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Voucher Number') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-ticket-alt"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('voucher_number') }}" name="voucher_number"
                                            class="form-control  @error('voucher_number')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('voucher_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Voucher File') }}</label>
                                    <input type="file" value="{{ old('ticket_file') }}" name="ticket_file" class="form-control @error('ticket_file')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1">
                                    @error('ticket_file')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Extra Info') }}</label>
                                    <input type="text" value="{{ old('ticket_extra_info') }}" name="ticket_extra_info"
                                        class="form-control @error('ticket_extra_info')
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
                                        <option {{ old('ticket_status') == "Booked" ? "selected" : "" }} value="Booked">
                                            Booked</option>
                                        <option {{ old('ticket_status') == "Not Booked" ? "selected" : "" }}
                                            value="Not Booked">Not Booked</option>
                                        <option {{ old('ticket_status') == "Pending" ? "selected" : "" }}
                                            value="Pending">Pending</option>
                                        <option {{ old('ticket_status') == "Cancelled" ? "selected" : "" }}
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
