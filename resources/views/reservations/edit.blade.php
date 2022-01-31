@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Hotel Reservation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Hotel Reservation</li>
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
                            <form action="/reservations/{{ $reservation->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{ old('guestFirstName', $reservation->guestFirstName) }}" name="guestFirstName" class="form-control @error('guestFirstName')
          {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Firma name">
                                    @error('guestFirstName')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Payment</label>
                                    <select class="custom-select rounded-0" name="payment_method"
                                        id="exampleSelectRounded0">
                                        <option value="">Select Payment</option>
                                        <option
                                            {{ old('referer', $reservation->payment_method) == "Naqd" ? "selected" : "" }}
                                            value="Naqd">Naqd</option>
                                        <option
                                            {{ old('referer', $reservation->payment_method) == "Karta" ? "selected" : "" }}
                                            value="Karta">Karta</option>
                                        <option
                                            {{ old('referer', $reservation->payment_method) == "Perech" ? "selected" : "" }}
                                            value="Perech">Perech</option>
                                    </select>
                                    @error('referer')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" value="{{ old('price', $reservation->price) }}" name="price" class="form-control @error('price')
          {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Firma name">
                                    @error('price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Firma Name</label>
                                    <input type="text" value="{{ old('company_name', $reservation->company_name) }}" name="company_name" class="form-control @error('company_name')
          {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Firma name">
                                    @error('company_name')
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
