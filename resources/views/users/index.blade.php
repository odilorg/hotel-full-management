@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
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
              <h3 class="card-title">Users</h3>
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
                <a class="btn btn-info btn-sm" href="{{ route('users.create') }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Add new User
              </a>
              </div>
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    
                    <th>Role</th>
                    <th>Profile Image</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user )
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                                       <td>{{ $user->role }}</span></td>
                    <td><img src="{{ asset('storage/' . $user->profile_image) }}" width="50px" height="50px" alt=""> </td>
                    
                    <td><a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user' =>1]) }}">
                      <i class="fas fa-folder">
                      </i>
                      View
                  </a>
                  <a class="btn btn-info btn-sm" href="users/{{ $user->id }}/edit">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                  </a>
                  <form action="/users/{{ $user->id }}" method="post" class="float-left">
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