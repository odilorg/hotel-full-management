@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Cargo kirting') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Cargo kirting') }}</li>
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
                            <form action="{{ route('cargos.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('Kelgan Sana') }}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('cargo_arrival_date') }}"
                                            name="cargo_arrival_date" class="date form-control @error('cargo_arrival_date')
                                          {{ 'is-invalid' }} @enderror datetimepicker-input"
                                             />
                                    </div>
                                    @error('cargo_arrival_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Vazni') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('total_cargo_weight') }}" name="total_cargo_weight"
                                            class="form-control  @error('total_cargo_weight')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('total_cargo_weight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Jami Summasi') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('cargo_total_sum') }}" name="cargo_total_sum"
                                            class="form-control  @error('cargo_total_sum')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('cargo_total_sum')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Foiz Nacenka') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('margin_cargo') }}" name="margin_cargo"
                                            class="form-control  @error('margin_cargo')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('margin_cargo')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Qoshimcha') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('cargo_extra_info') }}" name="cargo_extra_info"
                                            class="form-control  @error('cargo_extra_info')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('cargo_extra_info')
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
