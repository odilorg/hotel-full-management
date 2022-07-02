@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Input Usage</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input Usage</li>
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
                            <form action="{{ route('utility_usages.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('Usage Date') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('usage_date') }}" name="usage_date" class="form-control date @error('usage_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('usage_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ko'rsatgich oxiri</label>
                                    <input type="text" value="{{ old('meter_latest') }}" name="meter_latest" class="form-control  @error('meter_latest')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Ko'rsatgich oxiri">
                                    @error('meter_latest')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ko'rsatgich Oldingi</label>
                                    <input type="text" value="{{ old('meter_previous') }}" name="meter_previous" class="form-control  @error('meter_previous')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Ko'rsatgich Oldingi">
                                    @error('meter_previous')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Choose a meter</label>
                                    <select class="custom-select rounded-0" name="utility_id" id="exampleSelectRounded0">
                                        <option value="">Choose meter</option>
                                        @foreach ($meters as $meter )
                                        <option value="{{ $meter->utility->id }}">{{ $meter->meter_number." ". $meter->utility->utility_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('utility_id')
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
