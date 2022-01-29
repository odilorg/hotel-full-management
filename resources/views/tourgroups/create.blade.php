@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Tour Group</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Tour Group</li>
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
                <form action="{{ route('tourgroups.store') }}" method="POST">
                    @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tourgroup Name</label>
                    <input type="text" value="{{ old('tourgroup_name') }}" name="tourgroup_name" class="form-control  @error('tourgroup_name')
                     {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Tour Group Name">
                    @error('tourgroup_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tourgroup Country</label>
                  <input type="text" value="{{ old('tourgroup_country') }}" name="tourgroup_country" class="form-control @error('tourgroup_country')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Tourgroup Country">
                  @error('tourgroup_country')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tourgroup Pax</label>
                    <input type="text" value="{{ old('tourgroup_pax') }}" name="tourgroup_pax" class="form-control @error('tourgroup_pax')
                    {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Tourgroup Pax">
                    @error('tourgroup_pax')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                <div class="form-group">
                  <label>Check In Date:</label>
                    <div class="input-group " id="reservationdate" data-target-input="nearest">
                        <input type="text" value="{{ old('tourgroup_ci') }}" name="tourgroup_ci" class="form-control date @error('tourgroup_ci')
                        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tourgroup_ci')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Check Out Date:</label>
                    <div class="input-group " id="reservationdate2" data-target-input="nearest">
                        <input type="text" value="{{ old('tourgroup_co') }}" name="tourgroup_co" class="form-control date @error('tourgroup_co')
                        {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate2"/>
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    @error('tourgroup_co')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleSelectRounded0">Choose Tour Group</label>
                    <select class="custom-select rounded-0" name="tourgroup_status" id="exampleSelectRounded0">
                      <option>OK</option>  
                      <option>Cancelled</option>  
                      <option>Pending</option>  
                    </select>
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