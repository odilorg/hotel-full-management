@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hotel Reservations</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Hotel Reservations</li>
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
              <h3 class="card-title">Group Jp-0154 Japan from 01/05-10/05/2022</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                <a class="btn btn-info btn-sm" href="{{ route('transports.create') }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Add Transport
              </a>
              </div>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Tour Group</th>
                    <th>Transport type</th>
                    <th>Extra Info</th>
                    <th>CI Date</th>
                    <th>CO Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($transports as $transport   )
                  <tr>
                    <td>{{ $transport->tourgroup_name }}</td>
                    <td>{{ $transport->transport_type }}</td>
                    <td>{{ $transport->extra_info }}</td>
                    <td>{{ $transport->tourgroup_ci }}</td>
                    <td>{{ $transport->tourgroup_co }}</td>
                    <td><a class="btn btn-primary btn-sm" href="transports/{{ $transport->id }}">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a>
                  <a class="btn btn-info btn-sm" href="#">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                  </a>
                  <form action="/transports/{{ $transport->id }}" method="post" class="float-left">
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