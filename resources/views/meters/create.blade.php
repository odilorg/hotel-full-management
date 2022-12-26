@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create new Meter</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create new Meter</li>
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
                            <form action="{{ route('meters.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Choose Utility</label>
                                    <select class="custom-select rounded-0" name="utility_id" id="exampleSelectRounded0">
                                        <option value="">Choose Utility</option>
                                        @foreach ($meters as $meter )
                                        <option value="{{ $meter->utility->id }}">{{ $meter->utility->utility_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('utility_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kor'satgich zavod nomeri</label>
                                    <input type="text" value="{{ old('meter_number') }}" name="meter_number" class="form-control  @error('meter_number')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Kor'satgich zavod nomeri">
                                    @error('meter_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Sertifikat muddati') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('sertificate_expiration_date') }}" name="sertificate_expiration_date" class="form-control date @error('sertificate_expiration_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('sertificate_expiration_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sertificte image</label>
                                    <input type="file" value="{{ old('sertificate_image') }}" name="sertificate_image" class="form-control @error('sertificate_image')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" >
                                    @error('sertificate_image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shartnoma nomeri</label>
                                    <input type="text" value="{{ old('contract_number') }}" name="contract_number" class="form-control  @error('contract_number')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Shartnoma nomeri">
                                    @error('contract_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Shartnoma sanasi') }}</label>
                                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                                        <input type="text" value="{{ old('contract_date') }}" name="contract_date" class="form-control date @error('contract_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                            data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    @error('contract_date')
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
