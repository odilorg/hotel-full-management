@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Companies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shift</li>
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
                       
                        <form action="/shifts/start" method="post"
                            class="float-left">
                            @csrf
                           
                        <div class="mt-1">
                            <select class="custom-select rounded-0" name="hotel_id" id="hotel_select">
                                <option value="">Choose Hotel</option>
                                @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" 
                                    <?php 
                                 if (empty($hotel_id)) {
                                    '';
                                } elseif($hotel->id == $hotel_id) {
                                    echo 'selected';
                                }
                                 ?> 
                                 >{{ $hotel->hotel_name }}</option>
                                @endforeach
                                
                            </select>
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </button>
                        </div>
                    </form>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Shift Start </th>
                                    <th>Hotel</th>
                                    <th>Admin Name</th>
                                    <th>Shift Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shifts as $shift )
                                <tr>
                                    <td>{{  \Carbon\Carbon::parse($shift->created_at )->add(5, 'hour')->format('d/m/Y H:i:s')   }} </td>
                                    <td>{{ $shift->hotel->hotel_name }}</td>
                                    <td>{{ $shift->user->name }} </td>
                                    
                                    
                                    
                                    <td><a class="btn btn-primary btn-sm" href="shifts/{{ $shift->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="shifts/{{ $shift->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/shifts/{{ $shift->id }}" method="post"
                                            class="float-left">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="pagination-block">
                            {{ $shifts->links('admin.layouts.paginationlinks') }}
                          </div>
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
