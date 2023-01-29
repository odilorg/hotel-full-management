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

                        <form action="/shifts/start" method="post" class="float-left">
                            @csrf
                            <h5 class="mb-2">Shift Info</h5>
                            @if (!$shift)
                            <div class="row">
                                
                                <select class="custom-select rounded-0 m-3" name="hotel_id" id="hotel_select">
                                    <option value="">Choose Hotel</option>
                                    @foreach ($hotels as $hotel)
                                    <option value="{{ ($hotel->id) }}" 
                                        <?php 
                                    if (empty($hotel_id)) {
                                        '';
                                    } elseif(($hotel->id == $hotel_id)) {
                                        echo 'selected';
                                    }
                                    ?> 
                                    >{{ ($hotel->hotel_name) }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('hotel_id')
                                <h5 class="text-danger m-3">{{ $message }}</>
                                @enderror
                             
                        </div>
                            @endif
                           
                            <div class="row m-1">
                                <div class="m-1">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-play">
                                        </i>
                                        Start Shift
                                    </button>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="m-1">
                                    <a class="btn btn-primary btn-sm" href="reservations/edit">
                                        <i class="fas fa-wallet">
                                        </i>
                                        Add Kassa
                                    </a>
                                    
                                    <!-- /.info-box -->
                                </div>
                                <div class="m-1">
                                    <a class="btn btn-primary btn-sm" href="reservations/edit">
                                        <i class="fa-solid fa-list-ul"></i>
                                        Add Logs
                                    </a>
                                    
                                    <!-- /.info-box -->
                                </div>
                                <div class="m-1">
                                    <a class="btn btn-danger btn-sm" href="reservations/edit">
                                        <i class="fa-solid fa-circle-stop"></i>
                                        Close Shift
                                    </a>
                                    
                                    <!-- /.info-box -->
                                </div>
                            </div>    
                                <div class="row m-1">
                                    <div class="col m-1">
                                       @if ($shift)
                                       <p><code>Started at {{ $shift->created_at->add(5, 'hour')->format('d/m/Y H:i:s') }} by {{ Auth::user()->name; }}</code></p>
                                       <div class="progress">
                                           <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                           <span class="sr-only">40% Complete (success)</span>
                                           </div>
                                       </div>
                                       @endif
                                        
                                    </div> 
                                </div>    
                                <!-- /.col -->
                               
                                <!-- /.col -->
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