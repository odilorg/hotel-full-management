@extends('admin.layouts.layout')

@section('content')
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
      $('input.typeahead').typeahead({
          source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
          }
      });
  </script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Maxsulotni kirting') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Maxsulotni kirting') }}</li>
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
                            <form action="{{ route('inventories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Cargo Sana') }}</label>
                                    <select class="custom-select rounded-0" name="cargo_id"
                                        id="exampleSelectRounded0">
                                        <option value="">Cargoni Tanlang..</option>
                                        @foreach ($cargos as $cargo )
                                        <option {{ old('cargo_id') == $cargo->id ? "selected" : "" }}
                                            value="{{ $cargo->id }}">{{ $cargo->cargo_arrival_date }}</option>
                                        @endforeach
                                    </select>
                                    @error('cargo_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Nomi') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-air-freshener"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('product_name') }}" id="product_name" name="product_name"
                                            class="form-control typeahead @error('product_name')
                                      {{ 'is-invalid' }} @enderror">
                                      <div id="productList"></div>
                                    </div>
                                    @error('product_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>{{ __('Miqdori') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('product_quantity') }}" name="product_quantity"
                                            class="form-control  @error('product_quantity')
                                      {{ 'is-invalid' }} @enderror">
                                    </div>
                                    @error('product_quantity')
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
