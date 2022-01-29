@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Tickets') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Tickets') }}</li>
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
                            <a class="btn btn-info btn-sm" href="{{ route('tickets.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ __('Add Your Ticket') }}
                            </a>
                        </div>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>{{ __('Tour Group') }}</th>
                                    <th>{{ __('Location') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Voucher N') }}</th>
                                    <th>{{ __('File') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Extra Info') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    
                                    
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $item )
                                <tr>
                                    <td>{{ $item->tourgroup->tourgroup_name }} </span></td>
                                    <td>{{ $item->ticket_location }}</td>
                                    <td>{{ $item->monument_name }}</td>
                                    <td>{{ $item->voucher_number }}</td>
                                    <td><a href="{{ asset('storage/' . $item->ticket_file) }}" data-lightbox="image-1"><img src="{{ asset('storage/' . $item->ticket_file) }}"  width="50px" height="50px" alt=""></a>  </td>
                                    <td>{{ $item->ticket_date }}</td>
                                    <td>{{ $item->ticket_extra_info }}</td>
                                    <td>{{ $item->ticket_status }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="tickets/{{ $item->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="tickets/{{ $item->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/tickets/{{ $item->id }}" method="post"
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
                            {{ $tickets->links('admin.layouts.paginationlinks') }}
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
