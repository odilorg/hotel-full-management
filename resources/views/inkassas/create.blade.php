@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Add new Inkassa') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Add new Inkassa') }}</li>
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
                            <form action="{{ route('inkassas.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Report Number</label>
                                    <select class="custom-select rounded-0" name="report_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Report..</option>
                                        @foreach ($reports as $report )
                                        <option value="{{ $report->report_number }}">{{ $report->report_number }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('report_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Inkassa Date') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('date_inkassa') }}" name="date_inkassa" class="form-control date @error('date_inkassa')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('date_inkassa')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Inkassa Amount') }}</label>
                                    <input type="text" value="{{ old('amount_inkassa') }}" name="amount_inkassa" class="form-control  @error('amount_inkassa')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Inkassa Amount">
                                    @error('amount_inkassa')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Firma') }}</label>
                                    <select class="custom-select rounded-0" name="firm_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Category</option>
                                        @foreach ($firmas as $firm )
                                        <option value="{{ $firm->id }}">{{ $firm->firm_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('firm_id')
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
