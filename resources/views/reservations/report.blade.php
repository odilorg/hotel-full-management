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
        <div class="row">
            <div class="col-12">
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
                        <b>Report # {{ $report_number }} Reservations</b><br>
                        
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
                    @foreach ($expense_report as $key => $value )
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Report # {{ $report_number }} - {{ $key }} - Total: - {{ number_format($expense_total[$key],2,',',' ')  }}Uzs {{ round($expense_total[$key] / $exchange, 2) }}$</b><br>
                        
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
                            <th>Breakfast</th>
                            <th>Room</th>
                            <th>Oylik</th>
                            <th>General</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <th>{{ number_format($expense_report[$key]['Breakfast'],2,',',' ')  }}</th>
                            <th>{{ number_format($expense_report[$key]['Room'],2,',',' ')  }}</th>
                            <th>{{ number_format($expense_report[$key]['Oylik'],2,',',' ')  }}</th>
                            <th>{{ number_format($expense_report[$key]['General'],2,',',' ')  }}</th>
                          </tr>
                         
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    @endforeach
                    <div class="col-6">
                      <p class="lead">Amount Due for report N {{ $report_number }} - {{ now() }}</p>
    
                      <div class="table-responsive">
                        <table class="table">
                          <tbody><tr>
                            <th style="width:50%">Naqd:</th>
                            <td>{{ $report['Naqd'] }}</td>
                          </tr>
                          <tr>
                            <th>Booking Comission</th>
                            <td>{{ $report['total_booking_comission'] }}</td>
                          </tr>
                          <tr>
                            <th>Naqd Expense:</th>
                            <td>{{ round($expense_total['Naqd'] / $exchange, 1)  }}</td>
                          </tr>
                          <tr>
                            <th>Due:</th>
                            <td>{{ $report['Naqd'] - $report['total_booking_comission'] - round($expense_total['Naqd'] / $exchange, 1)  }}  </td>
                          </tr>
                        </tbody></table>
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
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
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
