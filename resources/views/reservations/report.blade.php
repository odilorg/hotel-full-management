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
                    <div style="margin: 20px auto; width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 10px 10px;">
                        Profits <!--Padding is optional-->
                      </span>
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Report Date {{ $first_night }} Reservations</b><br>
                        
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Naqd</th>
                            <th>Karta</th>
                            <th>Perech</th>
                            <th>Total</th>
                            <th>Booking Comission</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>{{ $report['Naqd'] }}</td>
                            <td>{{ $report['Karta'] }}</td>
                            <td>{{ $report['Perech'] }}</td>
                            <td>{{ $total_report }}</td>
                            <td>{{ $report['total_booking_comission'] }}</td>
                          </tr>
                         
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Report Dates {{ "2022-01-01" }} -  {{ $first_night }} Narastayushiy</b><br>
                        
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Naqd</th>
                            <th>Karta</th>
                            <th>Perech</th>
                            <th>Total</th>
                            <th>Booking Comission</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>{{ number_format($report_narast['Naqd'],2,',',' ') }} Usd</td>
                            <td>{{  number_format($report_narast['Karta'],2,',',' ') }} Usd</td>
                            <td>{{  number_format($report_narast['Perech'],2,',',' ') }} Usd</td>
                            <td>{{  number_format($total_report_narast,2,',',' ') }} Usd</td>
                            <td>{{  number_format($report_booking_narast['total_booking_comission'],2,',',' ') }} Usd</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <div style="margin: 20px auto; width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 10px 10px;">
                        Expenses <!--Padding is optional-->
                      </span>
                    </div>
                    @foreach ($expense_report as $key => $value )
                    <div class="row invoice-info">
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Report # {{ $first_night }} - {{ $key }} - Total: - {{ number_format($expense_total[$key],2,',',' ')  }}Uzs {{ round($expense_total[$key] / $exchange, 2) }}$</b><br>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            @foreach ($categories as $category)
                            <th>{{ $category->category_name }}</th>
                            @endforeach
                           
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            @foreach ($categories as $category)
                            <th>{{ number_format($expense_report[$key][ $category->category_name],2,',',' ')  }}</th>
                            @endforeach
                            
                          </tr>
                          <tr>
                            @foreach ($categories as $category)
                            <th>{{ number_format($expense_report_narast[$key][ $category->category_name],2,',',' ')  }}</th>
                            @endforeach
                            
                          </tr>
                         
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    @endforeach
                    <div class="container">
                     
                      <div class="row">
                        <div class="col">
                          <div class="table-responsive">
                            <p class="lead">Amount Due for Date {{ $first_night }} </p>
                            <table class="table">
                              <tbody>
                              <tr>
                                <th style="width:50%">Naqd:</th>
                                <td>{{ number_format($report['Naqd'],2,',',' ') }}</td>
                              </tr>
                              
                              <tr>
                                <th>Booking Comission</th>
                                <td>{{ number_format($report['total_booking_comission'],2,',',' ') }}</td>
                              </tr>
                              
                              <tr>
                                <th>Naqd Expense:</th>
                                <td>{{ number_format(round($expense_total['Naqd'] / $exchange, 1),2,',',' ') }}</td>
                              </tr>
                              
                              <tr>
                                <th>Due:</th>
                                <td>{{ number_format(($report['Naqd'] - $report['total_booking_comission'] - round($expense_total['Naqd'] / $exchange, 1)),2,',',' ') }}</td>
                              </tr>
                              
                            </tbody></table>
                          </div>
                        </div>
                        <div class="col">
                          <div class="table-responsive">
                            <p class="lead">Amount Due {{ "01-01-2022" }} - {{ $first_night }} </p>
                            <table class="table">
                              <tbody>
                              
                              <tr>
                                <th style="width:50%">Naqd Narast:</th>
                                <td>{{ number_format($report_narast['Naqd'],2,',',' ') }}</td>
                              </tr>
                              
                              <tr>
                                <th>Booking Com Narast</th>
                                <td>{{ number_format($report_booking_narast['total_booking_comission'],2,',',' ') }}</td>
                              </tr>
                              
                              <tr>
                                <th>Naqd Expense Narast:</th>
                                <td>{{ number_format(round($expense_total_narast['Naqd'] / $exchange, 1),2,',',' ') }}</td>
                              </tr>
                              
                              <tr>
                                <th>Due Narast:</th>
                                <td>{{ number_format(($report_narast['Naqd'] - $report_booking_narast['total_booking_comission'] - round($expense_total_narast['Naqd'] / $exchange, 1)),2,',',' ') }}</td>
                              </tr>
                            </tbody></table>
                          </div>
                        </div>
                        
                      </div>
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
