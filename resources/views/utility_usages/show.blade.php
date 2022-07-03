@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hotel Report for Jahongir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hotel Report Jahongir</li>
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
        <div class="row" >
            <div class="col-12" id="invoice">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-12">
                        <h4>
                          <i class="fas fa-globe"></i> Jahongir Travel
                          <small class="float-right">Date: {{ now() }}</small>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Date Range  Reservations</b><br>
                        
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                  
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <div class="card-body p-0">
                          <div class="card " style="width: 25rem;" >
                            <table class="table table-sm ">
                              
                              <tbody>
                                <tr>
                                  <td>Мижоз:</td>
                                  <td>{{ $company->offical_company_name }}</td>
                                  
                                </tr>
                                <tr>
                                  <td>Шартнома:</td>
                                  <td>{{ $company->company_acc_number }}</td>
                                  
                                </tr>
                                <tr>
                                  <td>Х/р:</td>
                                  <td>{{ $company->company_acc_number }}</td>
                                 
                                </tr>
                                <tr>
                                  <td>Банк номи:</td>
                                  <td>{{ $company->company_acc_number }}</td>
                                 
                                </tr>
                                <tr>
                                    <td>Банк коди:</td>
                                    <td>Fix and squish bugs</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>ИНН:</td>
                                    <td>Fix and squish bugs</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>Манзил:</td>
                                    <td>Fix and squish bugs</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>Тел:</td>
                                    <td>Fix and squish bugs</td>
                                   
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div> 
                      <!-- /.col -->
                    </div>
                 
                    <!-- /.row -->
      
                    
                    <!-- /.row -->
      
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                          Payment
                        </button>
                        <button onclick="generatePDF()" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> Generate PDF
                        </button>
                      </div>
                    </div>
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
