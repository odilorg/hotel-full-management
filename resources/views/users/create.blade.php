@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create new User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create new User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control  @error('name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Email</label>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" value="{{ old('password') }}" name="password" class="form-control @error('password')
                {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Password">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Role</label>
                                    <select class="custom-select rounded-0" name="role" id="exampleSelectRounded0">
                                        
                                        <option value="1">Admin</option>
                                        <option value="2">Tour operator</option>
                                        <option value="3">Booking agent</option>
                                        <option value="4">Transport</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Profile image</label>
                                  <input type="file" value="{{ old('profile_image') }}" name="profile_image" class="form-control @error('profile_image')
                {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" >
                                  @error('profile_image')
                                  <p class="text-danger">{{ $message }}</p>
                                  @enderror
                              </div>


                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-6 -->



            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>



@endsection
