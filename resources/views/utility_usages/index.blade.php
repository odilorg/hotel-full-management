@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Utilities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Utilities</li>
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
                        <div>
                            <a class="btn btn-info btn-sm" href="{{ route('utility_usages.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ __('Add Your Utility usage') }}
                            </a>
                            @foreach ( $utilities as $utility )
                            <a class="btn btn-info btn-sm" href="{{ route( $utility->utility_slug ) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ $utility->utility_name }}
                            </a>    
                            @endforeach
                           
                            
                        </div>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Sana</th>
                                    <th>Nomi</th>
                                    <th>Ko'r #</th>
                                    <th>Ko'r oxiri</th>
                                    <th>Ko'r oldingi</th>
                                    <th>Ko'r farqi</th>
                                    <th>Ko'r Rasmi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utility_usages as $usage )
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($usage->usage_date )->format('d/m/Y')    }} </td>
                                    <td>{{ $usage->meter->utility->utility_name }} </td>
                                    <td>{{ $usage->meter->meter_number }} </td>
                                    <td>{{ $usage->meter_latest }}</td>
                                    <td>{{ $usage->meter_previous }}</td>
                                    <td>{{ $usage->meter_difference }}</td>
                                    <td><a href="{{ asset('storage/' . $usage->meter_image) }}" data-lightbox="image-1"><img src="{{ asset('storage/' . $usage->meter_image) }}"  width="50px" height="50px" alt=""></a>  </td>
                                   
                                        
                                   
                                    <td><a class="btn btn-primary btn-sm" href="utility_usages/{{ $usage->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="utility_usages/{{ $usage->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/utility_usages/{{ $usage->id }}" method="post"
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
                            {{ $utility_usages->links('admin.layouts.paginationlinks') }}
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
