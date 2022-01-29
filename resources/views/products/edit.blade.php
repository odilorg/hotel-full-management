@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Maxsulotni \'Ozgartiring') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Maxsulotni \'Ozgartiring') }}</li>
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
                            <form action="/products/{{ $product->id }}" method="POST" >
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Nomi') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-air-freshener"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('product_name', $product->product_name) }}" name="product_name"
                                            class="form-control  @error('product_name')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('product_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Vazni') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('product_weight', $product->product_weight) }}" name="product_weight"
                                            class="form-control  @error('product_weight')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('product_weight')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Narxi') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('product_price', $product->product_price) }}" name="product_price"
                                            class="form-control  @error('product_price')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('product_price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Tavsifi') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('product_description', $product->product_description) }}" name="product_description"
                                            class="form-control  @error('product_description')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('product_description')
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
