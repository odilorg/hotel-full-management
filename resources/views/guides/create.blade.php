@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Assign new Guide</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Assign new Guide</li>
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
                            <form action="{{ route('guides.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Choose Tour Group</label>
                                    <select class="custom-select rounded-0" name="tourgroup_id" id="exampleSelectRounded0">
                                        @foreach ($tourgroups as $tourgroup )
                                        <option value="{{ $tourgroup->id }}">{{ $tourgroup->tourgroup_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Guide Name</label>
                                    <input type="text" value="{{ old('guide_name') }}" name="guide_name" class="form-control  @error('guide_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Guide Name">
                                    @error('guide_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Guide Tel</label>
                                    <input type="text" value="{{ old('guide_phone') }}" name="guide_phone" class="form-control @error('guide_phone')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Guide Tel">
                                    @error('guide_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Guide Language</label>
                                    <input type="text" value="{{ old('guide_lang') }}" name="guide_lang" class="form-control @error('guide_lang')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Guide Language">
                                    @error('guide_lang')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectRounded0">Guide Status</label>
                                    <select class="custom-select rounded-0" name="guide_status" id="exampleSelectRounded0">
                                        <option value="">Choose status</option>
                                        <option value="OK">OK</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                    @error('guide_status')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Extra Info</label>
                                    <input type="text" value="{{ old('guide_extra_info') }}" name="guide_extra_info" class="form-control @error('guide_extra_info')
                  {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Guide extra info">
                                    @error('guide_extra_info')
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
