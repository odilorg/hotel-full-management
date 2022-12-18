@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  @if (!empty($hotel_name->hotel_name))
                  <h1>Hotel Report for {{ $hotel_name->hotel_name }}</h1>
                  @else
                  <h1>Hotel Report for {{ __('All Hotels') }}</h1>
                  @endif
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
                      
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                    
                    @foreach ($expense_report as $key => $value )
                    <div class="row invoice-info">
                      
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Date Range {{ $from_date }} - {{  $to_date }} - {{ $key }} - Total: - {{ number_format($expense_total[$key],2,',',' ')  }}Uzs {{ round($expense_total[$key] / $exchange, 2) }}$</b><br>
                        
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
                            @if (!empty($hotel_name->hotel_name))
                              @foreach ($categories as $category)
                               <th><a href="{{ url("/reports/{$category->id}/{$key}/{$from_date}/{$to_date}/{$hotel_name->id}"); }}">{{ number_format($expense_report[$key][ $category->category_name],2,',',' ')  }}</a>  </th>
                              @endforeach
                            @else
                             @foreach ($categories as $category)
                                <th><a href="{{ url("/reports/{$category->category_name}/{$key}/{$from_date}/{$to_date}"); }}">{{ number_format($expense_report[$key][ $category->category_name],2,',',' ')  }}</a>  </th>
                             @endforeach
                            @endif

                          
                          </tr>
                         
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    @endforeach
                    <h3>Total -{{  \Carbon\Carbon::parse($from_date )->format('d/m/Y') }} 
                      - {{  \Carbon\Carbon::parse($to_date )->format('d/m/Y') }} - {{ number_format(array_sum($expense_total),2,',',' ')  }}Uzs 
                      ({{ number_format((array_sum($expense_total)/ $exchange),2,',',' ')  }}$) For - {{ $hotel_name->hotel_name }} </h3>
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
