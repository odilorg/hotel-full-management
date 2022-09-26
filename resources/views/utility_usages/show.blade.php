@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $utilityUsage->meter->utility->utility_name. " Jahongir hotel"}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $utilityUsage->meter->utility->utility_name. " Jahongir hotel"}}</li>
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
                        <div class="card-body p-0" style="margin: 13px 0;">
                          <div class="card " style="width: 800px;" >
                            <table class="table table-sm" style="font-size: 16px">
                              
                              <tbody>
                                <tr>
                                  <td>Мижоз:</td>
                                  <td>{{ $company->offical_company_name }}</td>
                                  
                                </tr>
                                <tr>
                                  <td>Шартнома:</td>
                                  <td>{{ $meters->contract_number }} sana {{ \Carbon\Carbon::parse($meters->contract_date )->format('d/m/Y')   }}</td>
                                  
                                </tr>
                                <tr>
                                  <td>Х/р:</td>
                                  <td>{{ $company->company_acc_number }}</td>
                                 
                                </tr>
                                <tr>
                                  <td width="40%">Банк номи:</td>
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
                              <table class="table-bordered table-hover text-nowrap" style="font-size: 16px">
                                <thead>
                                  <tr>
                                    <th style=" text-align:center;" width="20%" colspan="2">Объектни номи ва манзили</th>
                                    
                                    <th style="text-align:center;">Курсатгич<br>завод раками</th>
                                    <th style="padding: 25px 0; text-align:center;">Олдинги<br> курсатгич</th>
                                    <th style="padding: 25px 0; text-align:center;">Охирги<br> курсатгич</th>
                                    <th style="padding: 25px 0; text-align:center;">Фарки (Cувни<br> сарфи кум м.) </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{ $company->company_address_city . " ".$company->company_address_street }}</td>
                                    <td></td>
                                    <td style="text-align:center;">{{ $meters->meter_number }}</td>
                                    <td style="text-align:center;">{{ $utilityUsage->meter_previous }}</td>
                                    <td style="text-align:center;">{{ $utilityUsage->meter_latest }}</td>
                                    <td style="text-align:center;">{{ $utilityUsage->meter_difference }}</td>
                                    
                                  </tr>
                                 
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div> 
                        <table class="table-borderless" style="font-size: 18px" >
                      
                          <tbody>
                            <tr>
                              
                              <td style="padding:10px 0 0 120px">{{  $company->offical_company_name }}</td>
                              <td style="padding:10px 0 0 285px">{{ $utility_name->utility_name }}</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Жавобгар шахс (исми ва шарифи):</td>
                              <td style="padding:10px 0 0 170px">Кабул килувчи (Исми ва шарифи):_____________________</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Имзо_________________________________</td>
                              <td style="padding:10px 0 0 170px">Имзо_________________________________</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Сана:   {{ \Carbon\Carbon::parse($utilityUsage->usage_date)->format('d/m/Y') }}</td>
                              <td style="padding:10px 0 0 170px">Сана:   {{ \Carbon\Carbon::parse($utilityUsage->usage_date)->format('d/m/Y') }}</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Мухр:</td>
                              <td style="padding:10px 0 0 170px">Мухр:</td>
                              
                            </tr>
                          </tbody>
                        </table>
                      <!-- /.col -->
                      <hr style="height:5px;border-width:0;color:gray;background-color:gray">
                    </div>
                   


                    <div class="row">
                      <div class="col-12 table-responsive">
                        <div class="card-body p-0" style="margin: 13px 0;">
                          <div class="card " style="width: 800px;" >
                            <table class="table table-sm" style="font-size: 16px">
                              
                              <tbody>
                                <tr>
                                  <td>Мижоз:</td>
                                  <td>{{ $company->offical_company_name }}</td>
                                  
                                </tr>
                                <tr>
                                  <td>Шартнома:</td>
                                  <td>{{ $meters->contract_number }} sana {{ \Carbon\Carbon::parse($meters->contract_date )->format('d/m/Y')   }}</td>
                                  
                                </tr>
                                <tr>
                                  <td>Х/р:</td>
                                  <td>{{ $company->company_acc_number }}</td>
                                 
                                </tr>
                                <tr>
                                  <td width="40%">Банк номи:</td>
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
                              <table class="table-bordered table-hover text-nowrap" style="font-size: 16px">
                                <thead>
                                  <tr>
                                    <th style=" text-align:center;" width="20%" colspan="2">Объектни номи ва манзили</th>
                                    
                                    <th style="text-align:center;">Курсатгич завод<br> раками</th>
                                    <th style="padding: 25px 0; text-align:center;">Олдинги<br> курсатгич</th>
                                    <th style="padding: 25px 0; text-align:center;">Охирги<br> курсатгич</th>
                                    <th style="padding: 25px 0; text-align:center;">Фарки (Cувни<br> сарфи кум м.) </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>{{ $company->company_address_city . " ".$company->company_address_street }}</td>
                                    <td></td>
                                    <td style="text-align:center;">{{ $meters->meter_number }}</td>
                                    <td style="text-align:center;">{{ $utilityUsage->meter_previous }}</td>
                                    <td style="text-align:center;">{{ $utilityUsage->meter_latest }}</td>
                                    <td style="text-align:center;">{{ $utilityUsage->meter_difference }}</td>
                                    
                                  </tr>
                                 
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                        </div> 
                        <table class="table-borderless" style="font-size: 18px" >
                      
                          <tbody>
                            <tr>
                              
                              <td style="padding:10px 0 0 120px">{{  $company->offical_company_name }}</td>
                              <td style="padding:10px 0 0 285px">{{ $utility_name->utility_name }}</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Жавобгар шахс (исми ва шарифи):</td>
                              <td style="padding:10px 0 0 170px">Кабул килувчи (Исми ва шарифи):_____________________</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Имзо_________________________________</td>
                              <td style="padding:10px 0 0 170px">Имзо_________________________________</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Сана:   {{ \Carbon\Carbon::parse($utilityUsage->usage_date)->format('d/m/Y') }}</td>
                              <td style="padding:10px 0 0 170px">Сана:   {{ \Carbon\Carbon::parse($utilityUsage->usage_date)->format('d/m/Y') }}</td>
                              
                            </tr>
                            <tr>
                             
                              <td>Мухр:</td>
                              <td style="padding:10px 0 0 170px">Мухр:</td>
                              
                            </tr>
                          </tbody>
                        </table>
                      <!-- /.col -->
                      <hr style="height:5px;border-width:0;color:gray;background-color:gray">
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
