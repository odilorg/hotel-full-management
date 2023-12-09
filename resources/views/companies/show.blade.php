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
                        <li class="breadcrumb-item active">Company</li>
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
                            <a class="btn btn-info btn-sm" href="{{ route('companies.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ __('Add New Company') }}
                            </a>
                        </div>
                        <table  id="customers" role="table">
                            <thead role="rowgroup">
                              <tr role="row">
                                <th role="columnheader">Company Name</th>
                                <th role="columnheader">Offical Company Name</th>
                                <th role="columnheader">INN</th>
                                <th role="columnheader">Company Street</th>
                                <th role="columnheader">Company Phone</th>
                                <th role="columnheader">Company Email</th>
                                <th role="columnheader">Company Acc #</th>
                                <th role="columnheader">Company Bank</th>
                                <th role="columnheader"> Bank MFO</th>
                                <th role="columnheader"> Company Address City</th>
                                
                               
                              </tr>
                            </thead>
                            <tbody role="rowgroup">
                              <tr role="row">
                                <td role="cell">{{ $company->company_name }}</td>
                                <td role="cell">{{ $company->offical_company_name }}</td>
                                <td role="cell">{{ $company->company_inn }}</td>
                                <td role="cell">{{ $company->company_address_street }}</td>
                                <td role="cell">{{ $company->company_phone }}</td>
                                <td role="cell">{{ $company->company_email }}</td>
                                <td role="cell">{{ $company->company_acc_number }}</td>
                                <td role="cell">{{ $company->company_bank_name }}</td>
                                <td role="cell">{{ $company->company_bank_mfo }}</td>
                                <td role="cell">{{ $company->company_address_city }}</td>
                                
                                
                                
                                
                                
                              </tr>
                             
                             
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
