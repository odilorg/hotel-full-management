@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Add new Payment') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Add new Payment') }}</li>
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
                            <form action="{{ route('shifts.shift_expenses_store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Expense Description') }}</label>
                                    <input type="text" value="{{ old('expense_name') }}" name="expense_name" class="form-control  @error('expense_name')
                                    {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Expense Description">
                                    @error('expense_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Expense Amount') }}</label>
                                    <input type="text" value="{{ old('expense_amount_uzs') }}" name="expense_amount_uzs" class="form-control  @error('expense_amount_uzs')
                                    {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Expense Amount">
                                    @error('expense_amount_uzs')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Payment type') }}</label>
                                    <select class="custom-select rounded-0" name="payment_type_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Payment</option>
                                        @foreach ($payments as $payment )
                                        <option value="{{ $payment->id }}">{{ $payment->payment_type_name }}
                                        </option>
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
