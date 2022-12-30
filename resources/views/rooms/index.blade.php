@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hotels</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Rooms</li>
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
                        <div class="card-body table-responsive p-0">
                            <div>
                                @if ((!empty($hotel_id)))
                                <a class="btn btn-info btn-sm" href="{{ route('rooms.create', ['id' => $hotel_id]) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    {{ __('Add Your Room') }}
                                </a>
                                @endif
                                
                            </div>
                        <div class="mt-1">
                            <select class="custom-select rounded-0" name="guide_status" id="hotel_select">
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
                        </div>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Room Name</th>
                                    <th>Room Number</th>
                                    <th>Unit Id</th>
                                    <th>Room Id</th>
                                    <th>Room size</th>
                                    <th>Room floor</th>
                                    <th>Hotel name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $item )
                                <tr>
                                    <td>{{ $item->room_name }} </span></td>
                                    <td>{{ $item->room_number }}</td>
                                    <td>{{ $item->unit_id }}</td>
                                    <td>{{ $item->room_id }}</td>
                                    <td>{{ $item->room_size }}</td>
                                    <td>{{ $item->room_floor }}</td>
                                    <td>{{ $item->hotel->hotel_name }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="rooms/{{ $item->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="rooms/{{ $item->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/rooms/{{ $item->id }}" method="post"
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
                            {{ $rooms->links('admin.layouts.paginationlinks') }}
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
<script>
    $(document).ready(function(){
        $("#hotel_select").change (function () { 
            var id = $('#hotel_select option:selected').val()
          

            var url = window.location.origin;
           
            url = url + "/rooms/" +"view/"+id;  // this number is dynamic actually
           
            window.location.href = url;
 });
        
        
        
    });
</script>





@endsection
