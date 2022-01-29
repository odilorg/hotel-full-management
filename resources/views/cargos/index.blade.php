@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Tickets') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Cargo') }}</li>
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
                                @error('cargo_arrival_date')
                                    <p class="text-danger">{{ $error }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <div>
                            <a class="btn btn-info btn-sm" href="{{ route('cargos.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ __('Cargo kiriting') }}
                            </a>
                        </div>
                        <table >
                            <thead>
                                <tr>
                                    <th>{{ __('Cargo kelgan sana') }}</th>
                                    <th>{{ __('Cargo vazni, kg') }}</th>
                                    <th>{{ __('Cargo jami summa') }}</th>
                                    <th>{{ __('Cargo foiz nacenka') }}</th>
                                    <th>{{ __('Cargo qo\'shimcha') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cargos as $item )
                                <tr>
                                    <td>{{ $item->cargo_arrival_date }} </span></td>
                                    <td>{{ $item->total_cargo_weight }}</td>
                                    <td>{{ $item->cargo_total_sum }}</td>
                                    <td>{{ $item->margin_cargo }}</td>
                                    <td>{{ $item->cargo_extra_info }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="cargos/{{ $item->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="cargos/{{ $item->id }}/edit">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/cargos/{{ $item->id }}" method="post"
                                            class="float-left">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                               
                               
                          
                            </tbody>
                        </table>
                      
                        <div class="pagination-block">
                            {{ $cargos->links('admin.layouts.paginationlinks') }}
                          </div>
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
    td:nth-of-type(1):before { content: "Cargo kelgan sana"; }
	td:nth-of-type(2):before { content: "Cargo vazni"; }
	td:nth-of-type(3):before { content: "Cargo jami summa"; }
	td:nth-of-type(4):before { content: "Cargo qo\'shimcha"; }
	td:nth-of-type(5):before { content: "Actions"; }

}   
</style>




@endsection
