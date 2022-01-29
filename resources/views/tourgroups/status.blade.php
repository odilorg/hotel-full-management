@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tour Groups</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tour Groups</li>
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
                        
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Tourgroup</th>
                                    <th>Transport</th>
                                    <th>TourGr Country</th>
                                    <th>CI Date</th>
                                    <th>CO Date</th>
                                    <th>TourGr pax</th>
                                    <th>TourGr Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tourgroups as $item )
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tourgroup_name }}</td>
                                    <td>{{ $item->tourgroup_country }}</td>
                                    <td>{{ $item->tourgroup_ci }} </span></td>
                                    <td>{{ $item->tourgroup_co }}</td>
                                    <td>{{ $item->tourgroup_pax }}</td>
                                    <td>{{ $item->tourgroup_status }}</td>

                                    <td><a class="btn btn-primary btn-sm" href="tourgroups/{{ $item->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="tourgroups/{{ $item->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/tourgroups/{{ $item->id }}" method="post" class="float-left">
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
                            {{ $tourgroups->links('admin.layouts.paginationlinks') }}
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
