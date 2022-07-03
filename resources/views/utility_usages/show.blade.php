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
                      
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                  
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <div class="card-body p-0" style="margin: 73px 0;">
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
                                  <td>{{ $company->company_bank_name }}</td>
                                 
                                </tr>
                                <tr>
                                    <td>Банк коди:</td>
                                    <td>{{ $company->company_bank_mfo }}</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>ИНН:</td>
                                    <td>{{ $company->company_inn }}</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>Манзил:</td>
                                    <td>{{ $company->company_address_city . " ".$company->company_address_street }}</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>Тел:</td>
                                    <td>{{ $company->company_phone }}</td>
                                   
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="card">
                            <div  class="card-header">
                              <h3 style="float:none; text-align:center; font-weight:600;" class="card-title" >{{ "Сарфланган " .$utility_name->utility_name. " буйича хисобот" }}</h3>
                              <h3 style="float:none; text-align:center; font-weight:600;" class="card-title" >{{ Str::ucfirst($sana)  . " учун" }}</h3>
                              <div class="card-tools">
                                
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                <thead>
                                  <tr>
                                    <th style="padding: 0 0 40px 30px;" width="20%" colspan="2">Объектни номи ва манзили</th>
                                    
                                    <th style="text-align:center;">Сув улчагич<br> асбобнинг<br> раками</th>
                                    <th style="padding: 25px 0;">Олдинги<br> курсатгич</th>
                                    <th style="padding: 25px 0;">Охирги<br> курсатгич</th>
                                    <th style="padding: 25px 0;">Фарки (Cувни<br> сарфи кум м.) </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{ $company->company_address_city . " ".$company->company_address_street }}</td>
                                    <td></td>
                                    <td style="text-align:center;">{{ $meters->meter_number }}</td>
                                    <td>{{ $utilityUsage->meter_previous }}</td>
                                    <td>{{ $utilityUsage->meter_latest }}</td>
                                    <td>{{ $utilityUsage->meter_difference }}</td>
                                    
                                  </tr>
                                 
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div> 
                      <!-- /.col -->
                      <hr style="margin:70px 20px; height:2px;border-width:0;color:gray;background-color:gray">
                    </div>
                    


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
                                  <td>{{ $company->company_bank_name }}</td>
                                 
                                </tr>
                                <tr>
                                    <td>Банк коди:</td>
                                    <td>{{ $company->company_bank_mfo }}</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>ИНН:</td>
                                    <td>{{ $company->company_inn }}</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>Манзил:</td>
                                    <td>{{ $company->company_address_city . " ".$company->company_address_street }}</td>
                                   
                                  </tr>
                                  <tr>
                                    <td>Тел:</td>
                                    <td>{{ $company->company_phone }}</td>
                                   
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="card">
                            <div  class="card-header">
                              <h3 style="float:none; text-align:center; font-weight:600;" class="card-title" >{{ "Сарфланган " .$utility_name->utility_name. " буйича хисобот" }}</h3>
                              <h3 style="float:none; text-align:center; font-weight:600;" class="card-title" >{{ Str::ucfirst($sana)  . " учун" }}</h3>
                              <div class="card-tools">
                                
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                              <table class="table table-hover text-nowrap">
                                <thead>
                                  <tr>
                                    <th style="padding: 0 0 40px 30px;" width="20%" colspan="2">Объектни номи ва манзили</th>
                                    
                                    <th style="text-align:center;">Сув улчагич<br> асбобнинг<br> раками</th>
                                    <th style="padding: 25px 0;">Олдинги<br> курсатгич</th>
                                    <th style="padding: 25px 0;">Охирги<br> курсатгич</th>
                                    <th style="padding: 25px 0;">Фарки (Cувни<br> сарфи кум м.) </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{ $company->company_address_city . " ".$company->company_address_street }}</td>
                                    <td></td>
                                    <td style="text-align:center;">{{ $meters->meter_number }}</td>
                                    <td>{{ $utilityUsage->meter_previous }}</td>
                                    <td>{{ $utilityUsage->meter_latest }}</td>
                                    <td>{{ $utilityUsage->meter_difference }}</td>
                                    
                                  </tr>
                                 
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div> 
                      <!-- /.col -->
                    </div>
                 
                    <!-- /.row -->
      
                    
                    <!-- /.row -->
      
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="javascript:window.print();"  class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
