@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hotel Reservations Unpaid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hotel Reservations </li>
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
                        <h3 class="card-title">{{ __(' Unpaid Reservations Total')   }} {{ number_format($total_unpaid_sum,2,',',' ')  }} Usd - {{ $sana1 }} to {{ $sana2 }} </h3>
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
                        
                        <table class="table table-hover text-wrap" id="employee_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="150px">Name</th>
                                    <th>Room</th>
                                    <th>CI Date</th>
                                    <th>CO Date</th>
                                    <th style="width:25px">Adults</th>
                                    <th>Price</th>
                                    <th style="width:125px">Price Uzs</th>
                                    <th style="width:35px">Comission</th>
                                    <th>Refferer</th>
                                    <th>Payment Method</th>
                                    <th>Company if Any</th>
                                    <th>Report N</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($total_unpaid as $unpaids )
                                <tr>
                                    <td>{{ $unpaids->bookId  }}</td>
                                    <td >{{ $unpaids->guestFirstName }} {{ $unpaids->guestName }}</td>
                                    <td>{{ $unpaids->room_number  }}</td>
                                    <td>{{ $unpaids->firstNight  }}</span></td>
                                    <td>{{ $unpaids->lastNight  }}</td>
                                    <td>{{ $unpaids->numAdult  }}</td>
                                    <td>{{ $unpaids->price  }}</td>
                                    <td>{{ number_format($unpaids->price_uzs,2,',',' ')   }}</td>
                                    <td>{{ $unpaids->commission }}</td>
                                    <td>{{ $unpaids->referer  }}</td>
                                    <td>{{ $unpaids->payment_method   }}</td>
                                    <td>{{ $unpaids->company_name   }}</td>
                                    <td>{{ $unpaids->report_number   }}</td>
                                   


                                    </td>

                                    <td><a class="btn btn-primary btn-sm"
                                            href="{{ route('reservations.show', ['reservation' =>1]) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="reservations/{{ $unpaids->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/reservations/{{ $unpaids->id }}" method="post"
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
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-block">
                            {{ $total_unpaid->links('admin.layouts.paginationlinks') }}
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
                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                <button type="button" class="close" data-dismiss="modal-report" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('reservations.report') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                        <input type="text" name="firstNight" class="form-control date @error('firstNight')
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
            <form action="{{ route('reservations.beds24') }}" method="POST">
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