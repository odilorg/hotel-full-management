@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cleaning</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Company</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <h3 >Jahongir hotel</h3>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Xona Raqami</th>
                                    <th>Xona Xonalti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms_jahongir as $jahongir)
                                <tr>
                                  <td>{{ $jahongir->room_number }}</td>
                                  <td>
                                    <div>
                                        <form action="/cleaning/ready" method="post"
                                            class="float-left">
                                            @csrf
                                            <button type="submit" class="button">
                                                {{ $jahongir->room_number }} Xona Tayor
                                            </button>
                                            <input type="hidden" name="room_id" value="{{ $jahongir->id }}" >
                                        </form>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <h3 >Jahongir Premium</h3>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Xona Raqami</th>
                                    <th>Xona Xonalti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms_premium as $jahongir)
                                <tr>
                                  <td> {{ $jahongir->room_number }}</td>
                                  <td>
                                    <div>
                                        <form action="/cleaning/ready" method="post"
                                            class="float-left">
                                            @csrf
                                            <button type="submit" class="button">
                                                {{ $jahongir->room_number }} Xona Tayor
                                            </button>
                                            <input type="hidden" name="room_id" value="{{ $jahongir->id }}"  >
                                        </form>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>





@endsection
