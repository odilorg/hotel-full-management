@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Input new Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input New Company</li>
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
                            <form action="{{ route('companies.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Name</label>
                                    <input type="text" value="{{ old('company_name') }}" name="company_name" class="form-control  @error('company_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Name">
                                    @error('company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Official Company Name</label>
                                    <input type="text" value="{{ old('offical_company_name') }}" name="offical_company_name" class="form-control  @error('offical_company_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Official Company Name">
                                    @error('offical_company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Address Street</label>
                                    <input type="text" value="{{ old('company_address_street') }}" name="company_address_street" class="form-control  @error('company_address_street')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Address Street">
                                    @error('company_address_street')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Address City</label>
                                    <input type="text" value="{{ old('company_address_city') }}" name="company_address_city" class="form-control  @error('company_address_city')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Address City">
                                    @error('company_address_city')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Address Zip</label>
                                    <input type="text" value="{{ old('company_address_zip') }}" name="company_address_zip" class="form-control  @error('company_address_zip')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Address Zip">
                                    @error('company_address_zip')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Phone</label>
                                    <input type="text" value="{{ old('company_phone') }}" name="company_phone" class="form-control  @error('company_phone')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Phone">
                                    @error('company_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Email</label>
                                    <input type="text" value="{{ old('company_email') }}" name="company_email" class="form-control  @error('company_email')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Email">
                                    @error('company_email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company INN</label>
                                    <input type="text" value="{{ old('company_inn') }}" name="company_inn" class="form-control  @error('company_inn')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company INN">
                                    @error('company_inn')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Acc Number</label>
                                    <input type="text" value="{{ old('company_acc_number') }}" name="company_acc_number" class="form-control  @error('company_acc_number')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Acc Number">
                                    @error('company_acc_number')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Bank Name</label>
                                    <input type="text" value="{{ old('company_bank_name') }}" name="company_bank_name" class="form-control  @error('company_bank_name')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Bank Name">
                                    @error('company_bank_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Company Bank MFO</label>
                                    <input type="text" value="{{ old('company_bank_mfo') }}" name="company_bank_mfo" class="form-control  @error('company_bank_mfo')
                 {{ 'is-invalid' }} @enderror " id="inputError" placeholder="Company Bank MFO">
                                    @error('company_bank_mfo')
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
