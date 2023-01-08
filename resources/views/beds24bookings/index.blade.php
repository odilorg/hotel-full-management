@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Beds24 Reservations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Beds24 Reservations</li>
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
                        <h3 class="card-title">{{ __('Beds24 Hotel Jahongir') }}</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" id="search" class="form-control float-right"
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
                        
                        <div class="mt-1">
                            
                           
                            
                        </div>
                        <table class="table table-hover text-wrap" id="employee_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="150px">Name</th>
                                    <th>Room</th>
                                    <th>CI Date</th>
                                    <th>CO Date</th>
                                    <th style="width:25px">Adults</th>
                                    
                                    <th>Price</th>
                                  
                                    <th style="width:25px">Paid</th>
                                    <th style="width:25px">Balance</th>
                                    <th style="width:25px">Payment Method</th>
                                    <th style="width:25px">Payment Description</th>
                                    <th style="width:35px">Comission</th>
                                    <th>Referer</th>
                                    <th>Hotel</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beds24bookings as $beds24booking)
                                <tr>
                                    
                                    <td>{{ $beds24booking->bookId  }}</td>
                                    <td>{{ $beds24booking->guestName  }}</td>
                                    <td>{{ $beds24booking->room_name  }} - {{ $beds24booking->room_number }}</td>
                                    <td>{{ $beds24booking->firstNight  }}</td>
                                    <td>{{ $beds24booking->lastNight  }}</td>
                                    <td>{{ $beds24booking->numAdult  }}</td>
                                  
                                    <td>{{ $beds24booking->price  }}</td>
                                   
                                    <td>{{ $beds24booking->paid_amount }}</td>
                                    <td>{{ $beds24booking->payment_balance  }}</td>
                                    <td>{{ $beds24booking->payment_method  }}</td>
                                    <td>{{ $beds24booking->payment_description  }}</td>
                                    <td>{{ $beds24booking->commission  }}</td>
                                    <td>{{ $beds24booking->referer}}</td>
                                    <td>{{ $beds24booking->hotel_name}}</td>
                                    

                                </td>
                                <td><a class="btn btn-primary btn-sm"
                                    href="beds24bookings/1/show">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="beds24bookings/1/edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <form action="/beds24bookings/1" method="post"
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
                                    @endforeach
                                   
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="pagination-block">
                            {{ $beds24bookings->links('admin.layouts.paginationlinks') }}
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
