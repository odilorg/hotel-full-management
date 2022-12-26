@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Beds24 Reservations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Beds24 Reservations</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Beds24 Hotel Jahongir') }}</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" id="search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <div>
                            <a class="btn btn-info btn-sm" href="{{ route('beds24bookings.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Add Hotel Reservation
                            </a>
                        </div>
                        <div class="mt-1">
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fas fa-hotel">
                                </i>
                                Add Beds24Reservation
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal-report">
                                <i class="fas fa-scroll">
                                </i>
                                Reports
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal-range">
                                <i class="fas fa-scroll">
                                </i>
                                Reports Date Range
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal-unpaid">
                                <i class="fas fa-scroll">
                                </i>
                                Unpaid 
                            </button>
                        </div>
                        <table class="table table-hover text-wrap" id="employee_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="150px">Name</th>
                                    <th>Room</th>
                                    <th>CI Date</th>
                                    <th>CO Date</th>
                                    <th style="width:25px">Adults</th>
                                    <th style="width:25px">N/P</th>
                                    <th>Price</th>
                                    <th style="width:125px">Price Uzs</th>
                                    <th style="width:35px">Comission</th>
                                    <th>Referer</th>
                                    <th>Payment Method</th>
                                    <th>Report Date</th>
                                    <th>Company if Any</th>
                                    <th>Ok Ytt</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td></td>
                                  
                                   


                                    </td>

                                    <td><a class="btn btn-primary btn-sm"
                                        href="beds24bookings/1/show">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="beds24bookings/1/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/beds24bookings/1" method="post"
                                            class="float-left">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="pagination-block">
                           
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<div class="modal fade" id="exampleModal-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Close the Day</h5>
                <button type="button" class="close" data-dismiss="modal-report" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('reservations.closeday') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                        <input type="text" name="report_number" class="form-control date @error('report_number')
        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                        <div class="input-group-append" data-target="#reservationdate"
                            data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal-unpaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Close the Day</h5>
                <button type="button" class="close" data-dismiss="modal-report" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('reservations.unpaid') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                        <input type="text" name="unpaid" class="form-control date @error('unpaid')
        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                        <div class="input-group-append" data-target="#reservationdate"
                            data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Beds24</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('beds24bookings.getbookings') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>From</label>
                        <div class="input-group " id="reservationdate" data-target-input="nearest">
                            <input type="text" value="{{ old('from_date') }}" name="from_date" class="form-control date  @error('from_date')
                {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('from_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>To Date:</label>
                        <div class="input-group " id="reservationdate" data-target-input="nearest">
                            <input type="text" value="{{ old('to_date') }}" name="to_date" class="form-control date @error('to_date')
                {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('to_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal-range" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                <button type="button" class="close" data-dismiss="modal-report" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('reservations.report-range') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Arriva From</label>
                        <div class="input-group " id="reservationdate" data-target-input="nearest">
                            <input type="text" value="{{ old('from_date') }}" name="from_date" class="form-control date  @error('from_date')
                {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('from_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Arrival To:</label>
                        <div class="input-group " id="reservationdate" data-target-input="nearest">
                            <input type="text" value="{{ old('to_date') }}" name="to_date" class="form-control date @error('to_date')
                {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('to_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection