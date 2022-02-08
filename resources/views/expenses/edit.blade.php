@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Update Expense') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Update Expense') }}</li>
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
                            <form action="/expenses/{{ $expenses->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Report Number</label>
                                    <select class="custom-select rounded-0" name="report_number"
                                        id="exampleSelectRounded0">
                                        @foreach ($report_numbers as $number)
                                        <option
                                            {{ old('report_number', $expenses->report_number) == $number->report_number ? "selected" : "" }}
                                            value="{{ $number->report_number }}">{{ $number->report_number }}</option>
                                        @endforeach
                                    </select>
                                    @error('report_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Expense Date') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('expense_date', $expenses->expense_date) }}"
                                            name="expense_date" class="form-control date @error('expense_date')
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
                                    <input type="text" value="{{ old('expense_name', $expenses->expense_name) }}"
                                        name="expense_name" class="form-control  @error('expense_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Expense Name">
                                    @error('expense_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Expense Amount') }}</label>
                                    <input type="text"
                                        value="{{ old('expense_amount_uzs', $expenses->expense_amount_uzs ) }}"
                                        name="expense_amount_uzs" class="form-control  @error('expense_amount_uzs')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Expense Amount">
                                    @error('expense_amount_uzs')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Expense Category') }}</label>
                                    <select class="custom-select rounded-0" name="expense_category_id"
                                        id="exampleSelectRounded0">
                                        @foreach ($expense_categories as $category )
                                        <option
                                            {{ old('expense_category_id', $expenses->expense_category_id) == $category->id ? "selected" : "" }}
                                            value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('expense_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Payment type') }}</label>
                                    <select class="custom-select rounded-0" name="payment_type_id"
                                        id="exampleSelectRounded0">
                                        @foreach ($payment_types as $payment )
                                        <option
                                            {{ old('payment_type_id', $expenses->payment_type_id) == $payment->id ? "selected" : "" }}
                                            value="{{ $payment->id }}">{{ $payment->payment_type_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('payment_type_id')
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
