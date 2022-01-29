@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Sklad') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Maxsulotlar Skladda') }}</li>
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
                        <div class="card-header">
                            <h3 class="card-title">
                              <i class="fas fa-bullhorn"></i>
                               Cargo kelgan sana - {{ $cargo->cargo_arrival_date }}; Vazni - {{ $cargo->total_cargo_weight }}kg; Summa - {{ $cargo->cargo_total_sum }}$; Kurs - {{ number_format($kurs_dol,2,","," ")  }}
                            </h3>
                          </div>
                        
                        <table >
                            <thead>
                                <tr>
                                    
                                    <th>{{ __('Maxsulot Nomi') }}</th>
                                    <th>{{ __('Maxsulot miqdori, d') }}</th>
                                    <th>{{ __('Maxsulot narxi, $') }}</th>
                                    <th>{{ __('Maxsulot vazni, gr') }}</th>
                                    <th>{{ __('Maxsulot jami qiymati, $') }}</th>
                                    <th>{{ __('Maxsulot jami vazni, gr') }}</th>
                                    <th>{{ __('Maxsulot o\'zi narxi $') }}</th>
                                    <th>{{ __('Maxsulot o\'zi narxi Uzs') }}</th>
                                    <th>{{ __('Maxsulot narxi nacenka bn  $') }}</th>
                                    <th>{{ __('Maxsulot narxi nacenka bn Uzs') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($w  as $item )
                                <tr>
                                    
                                    
                                    <td>{{ $item['product_name'] }}</td>    
                                    <td>{{ $item['product_quantity'] }}</td>    
                                    <td>{{ $item['product_price'] }}</td>    
                                    <td>{{ $item['product_weight'] }}</td>    
                                    <td>{{ $item['product_price_total'] }}</td>    
                                    <td>{{ $item['product_total_weight'] }}</td>    
                                    <td>{{ round($item['sell_price'], 2) }}</td> 
                                    <td>{{  number_format($item['sell_price_uzs'],2,","," ") }}</td>  
                                    <td>{{  number_format($item['sell_price_margin'],2,","," ") }}</td>  
                                    <td>{{  number_format($item['sell_price_margin_uzs'],2,","," ") }}</td>    
                                   
                                   
                                    @endforeach
                                    
                                    
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
<style>
    table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
 @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "Cargo Sana"; }
	td:nth-of-type(2):before { content: "Maxsulot Nomi"; }
	td:nth-of-type(3):before { content: "Maxsulot miqdori"; }
	td:nth-of-type(4):before { content: "Maxsulot narxi"; }
	td:nth-of-type(5):before { content: "Maxsulot vazni"; }
	td:nth-of-type(6):before { content: "Maxsulot jami qiymati"; }
	td:nth-of-type(7):before { content: "Maxsulot jami vazni"; }
	td:nth-of-type(8):before { content: "Actions"; }

}   
</style>





@endsection
