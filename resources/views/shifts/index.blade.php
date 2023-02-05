@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Shifts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shift</li>
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
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
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
                        <form action="/shifts/start" method="post" class="float-left">
                            @csrf

                            @if (!$shift)
                            <div class="form-group">
                                <label for="exampleInputEmail1">Qoldiq</label>
                                <input type="text" value="{{ old('saldo_start') }}" name="saldo_start" class="form-control  @error('saldo_start')
                                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Boshlangich qoldiq">
                                @error('saldo_start')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <select class="custom-select rounded-0 m-3" name="hotel_id" id="hotel_select">
                                    <option value="">Choose Hotel</option>
                                    @foreach ($hotels as $hotel)
                                    <option value="{{ ($hotel->id) }}" <?php if (empty($hotel_id)) { '' ; }
                                        elseif(($hotel->id == $hotel_id)) {
                                        echo 'selected';
                                        }
                                        ?>
                                        >{{ ($hotel->hotel_name) }}</option>
                                    @endforeach
                                </select>
                                @error('hotel_id')
                                <h5 class="text-danger m-3">{{ $message }}</>
                                    @enderror
                            </div>
                            @endif
                            <div class="row m-1">
                                <div class="m-1">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-play">
                                        </i>
                                        Start Shift
                                    </button>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="m-1">
                                    <a class="btn btn-primary btn-sm" href="{{ route('shift_payments.create') }}">
                                        <i class="fas fa-wallet">
                                        </i>
                                        Add Payments
                                    </a>

                                    <!-- /.info-box -->
                                </div>
                                <div class="m-1">
                                    <a class="btn btn-primary btn-sm" href="{{ route('shifts.shift_expenses_create') }}">
                                        <i class="fa-solid fa-coins"></i>
                                        Add Expense
                                    </a>
                                    <!-- /.info-box -->
                                </div>
                                <div class="m-1">
                                    <a class="btn btn-primary btn-sm" href="{{ route('shift_logs.create') }}">
                                        <i class="fa-solid fa-list-ul"></i>
                                        Add Logs
                                    </a>
                                    <!-- /.info-box -->
                                </div>
                                <div class="m-1">
                                    <a class="btn btn-danger btn-sm" href="reservations/edit">
                                        <i class="fa-solid fa-circle-stop"></i>
                                        Close Shift
                                    </a>
                                    <!-- /.info-box -->
                                </div>
                            </div>
                            <div class="row m-1">
                                <div class="col m-1">
                                    @if ($shift)
                                    <p><code>Started at {{ $shift->created_at->add(5, 'hour')->format('d/m/Y H:i:s') }} by {{ Auth::user()->name; }} in {{ $shift->hotel->hotel_name }}</code>
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            <div class="invoice p-3 mb-3">  
                @if ($shift)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payments Start Saldo {{ number_format($shift->saldo_start,2,',',' ')   }}</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                   
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Xona N</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shift_payments as $payments)
                                <tr>
                                    <td>{{ $payments->id }}</td>
                                    <td>{{ $payments->payment_description }}</td>
                                    <td>{{ $payments->room->room_number }}</td>
                                    <td>{{  number_format($payments->payment_amount_uzs,2,',',' ')  }}</td>
                                    <td>{{ $payments->payment_type->payment_type_name }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="shift_payments/{{ $payments->id }}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="shift_payments/{{ $payments->id }}/edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="/shift_payments/{{ $payments->id }}" method="post"
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
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Expenses </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Expense Categoty</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shift_expenses as $expenses)
                                <tr>
                                    <td>{{ $expenses->id }}</td>
                                    <td>{{ $expenses->expense_name }}</td>
                                    <td>{{ $expenses->expense_category->category_name }}</td>
                                    <td>{{  number_format($expenses->expense_amount_uzs,2,',',' ') }}</td>
                                    <td>{{ $expenses->payment_type->payment_type_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shift Logs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Date Time</th>
                                    <th>Room N</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shift_logs as $logs)
                                <tr>
                                    <td>{{ $logs->id }}</td>
                                    <td>{{ $logs->shift_log_description }}</td>
                                    <td>{{ $logs->created_at->format('d/m/Y H:i:s')  }}</td>
                                    <td>{{ $logs->room->room_number }}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h5 class="mb-2">End Saldo 650 000</h5>
                    <!-- /.card-body -->
                </div>   
                @endif
               
                <!-- /.card-body -->
                </div>
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




@endsection