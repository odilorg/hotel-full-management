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
                        <b>Report for {{ $report_date }}</b><br>
                        
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
                            <th>Total w/out unpaid</th>
                            <th>Total w/unpaid</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>{{ number_format($reservations_totals_by_payment_types['Naqd'],2,',',' ') }}</td>
                            <td>{{ number_format($reservations_totals_by_payment_types['Karta'],2,',',' ') }}</td>
                            <td>{{ number_format($reservations_totals_by_payment_types['Perech'],2,',',' ') }}</td>
                            <td>{{ number_format($total_sum_reservations,2,',',' ') }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    @foreach ($expenses_by_categories as $key => $value )
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Report for {{ $report_date }} </b><br>
                        
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
                            <th>{{ number_format($expenses_by_categories[$key][ $category->category_name],2,',',' ')  }}</th>
                            @endforeach
                          </tr>
                         
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    @endforeach
                    <div class="col-6">
                      <p class="lead">Amount Due for report N {{ $report_date }}</p>
                      <div class="table-responsive">
                        <table class="table">
                          <tbody><tr>
                            <th style="width:50%">Naqd:</th>
                            <td>{{ number_format($total_sum_reservations['Naqd'],2,',',' ') }}</td>
                          </tr>
                          <tr>
                            <th>Booking Comission</th>
                            <td>{{ number_format($total_sum_reservations['total_booking_comission'],2,',',' ') }}</td>
                          </tr>
                          <tr>
                            <th>Naqd Expense:</th>
                            <td>{{ number_format(round($expense_total['Naqd'] / $exchange, 1),2,',',' ') }}</td>
                          </tr>
                          <tr>
                            <th>Karta Expense:</th>
                            <td>{{ number_format(round($expense_total['Karta'] / $exchange, 1),2,',',' ') }}</td>
                          </tr>
                          <tr>
                            <th>Perech Expense:</th>
                            <td>{{ number_format(round($expense_total['Perech'] / $exchange, 1),2,',',' ') }}</td>
                          </tr>
                          <tr>
                            <th>Due:</th>
                            <td>{{ number_format(($report['Naqd'] - $report['total_booking_comission'] - round($expense_total['Naqd'] / $exchange, 1)),2,',',' ') }}</td>
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
