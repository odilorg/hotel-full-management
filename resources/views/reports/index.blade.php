@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reports</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
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
                            <form action="{{ route('reports.report') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Choose Hotel</label>
                                    <select class="custom-select rounded-0" name="hotel_id" id="hotel_select">
                                        <option value="">Choose Hotel</option>
                                    @foreach ($hotels as $hotel )
                                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                    @endforeach    
                                        
                                    </select>
                                 
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Start Report Date') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('start_report_date') }}" id="start_date" name="start_report_date" class="form-control date @error('start_report_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('start_report_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('End Report Date') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('end_report_date') }}" id="end_date" name="end_report_date" class="form-control date @error('end_report_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('end_report_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h2>Financial</h2>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Report Name</th>
                                        <th>Action</th>
                                        <th>Report Desc.</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td>Revenue</td>
                                        <td>  <button type="submit" name="report_type" value ="1" class="btn btn-primary btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Report
                                        </button></td>
                                        <td>Revenue by Date</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Expenses</td>
                                        <td> <button type="submit" name="report_type" value ="2" class="btn btn-primary btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Report
                                        </button></td>
                                        <td>Expense by Date</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>Profits and Expenses</td>
                                        <td> <button type="submit" name="report_type" value ="3" class="btn btn-primary btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Profir and Expense
                                        </button></td>
                                        <td>Profits and Expenses by Date</td>
                                       
                                    </tr>
                                   
    
                                </tbody>
                            </form>
                            </table>
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
