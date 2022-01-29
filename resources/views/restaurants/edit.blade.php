@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Restaurant') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit Restaurant') }}</li>
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
                            <form action="/restaurants/{{ $restaurant->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Tour Group</label>
                                    <select class="custom-select rounded-0" name="tourgroup_id" id="exampleSelectRounded0">
                                        <option value=""  >Select Tour Group..</option>
                                        @foreach ($tourgroups as $tourgroup )
                                        <option {{ old('tourgroup_id', $tourgroup->tourgroup_name) == $tourgroup_name ? "selected" : "" }} value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tourgroup_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Location') }}</label>
                                    <input type="text" value="{{ old('restaurant_city', $restaurant->restaurant_city) }}" name="restaurant_city" class="form-control  @error('restaurant_city')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Restaurant Location">
                                    @error('restaurant_city')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Name') }}</label>
                                    <input type="text" value="{{ old('restaurant_name', $restaurant->restaurant_name) }}" name="restaurant_name" class="form-control @error('restaurant_name')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Restaurant Name">
                                    @error('restaurant_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Phone Number') }}</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                      </div>
                                      <input type="text" value="{{ old('restaurant_tel', $restaurant->restaurant_tel) }}" name="restaurant_tel" class="form-control  @error('restaurant_name')
                                      {{ 'is-invalid' }} @enderror" data-inputmask='"mask": "(99) 999-9999"' data-mask>
                                    </div>
                                    @error('restaurant_tel')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                  </div>
                                <div class="form-group">
                                    <label>{{ __('Date and time:') }}</label>
                                      <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                          <input type="text" name="book_date_time" value="{{ old('book_date_time', $restaurant->book_date_time) }}" class="form-control datetimepicker-input class="form-control @error('book_date_time')
                                          {{ 'is-invalid' }} @enderror"" data-target="#reservationdatetime">
                                          <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                      @error('book_date_time')
                                      <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Extra Info') }}</label>
                                    <input type="text" value="{{ old('extra_info_restaurant', $restaurant->extra_info_restaurant) }}" name="extra_info_restaurant" class="form-control @error('extra_info_restaurant')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Restaurant Extra Info">
                                    @error('extra_info_restaurant')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">{{ __('Status') }}</label>
                                    <select class="custom-select rounded-0" name="restaurant_status" id="exampleSelectRounded0">
                                        <option value="" >Select Status</option>
                                        <option {{ old('restaurant_status', $restaurant->restaurant_status) == "Booked" ? "selected" : "" }} value="Booked">Booked</option>
                                        <option {{ old('restaurant_status', $restaurant->restaurant_status) == "Not Booked" ? "selected" : "" }} value="Not Booked">Not Booked</option>
                                        <option {{ old('restaurant_status', $restaurant->restaurant_status) == "Pending" ? "selected" : "" }} value="Pending">Pending</option>
                                        <option {{ old('restaurant_status', $restaurant->restaurant_status) == "Cancelled" ? "selected" : "" }} value="Cancelled">Cancelled</option>
                                    </select>
                                    @error('restaurant_status')
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
