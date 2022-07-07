@extends('admin.layouts.layout')

@section('content')
<script>  
    $(document).ready(function(){  
         $('#search').keyup(function(){  
              search_table($(this).val());  
         });  
         function search_table(value){  
              $('#employee_table tr').each(function(){  
                   var found = 'false';  
                   $(this).each(function(){  
                        if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                        {  
                             found = 'true';  
                        }  
                   });  
                   if(found == 'true')  
                   {  
                        $(this).show();  
                   }  
                   else  
                   {  
                        $(this).hide();  
                   }  
              });  
         }  
    });  
</script> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Meters') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Meters') }}</li>
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
                                <input type="text" name="table_search" id="search" class="form-control float-right"
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
                            <a class="btn btn-info btn-sm" href="{{ route('meters.create') }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ __('Add Your Meter') }}
                            </a>
                        </div>
                        
                        <table class="table table-hover text-nowrap" id="employee_table">
                            <thead>
                                <tr>
                                    <th>{{ __('Utility') }}</th>
                                    <th>{{ __('Ko\'r Nomeri') }}</th>
                                    <th>{{ __('Sertif. muddati') }}</th>
                                    <th>{{ __('Sertif. rasmi') }}</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meters as $meter )
                                <tr>
                                    <td>{{ $meter->utility->utility_name }} </span></td>
                                    <td>{{ $meter->meter_number }} </span></td>
                                    <td>{{ $meter->sertificate_expiration_date  }}</td>
                                    <td>{{ $meter->sertificate_image }}</td>
                                    
                                  
                                    <td><a class="btn btn-primary btn-sm" href="expenses/{{ $meter->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                      
                                       <a class="btn btn-info btn-sm" href="expenses/{{ $meter->id }}/edit">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>  
                                       
                                       <form action="/expenses/{{ $meter->id }}" method="post"
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
                            {{ $meters->links('admin.layouts.paginationlinks') }}
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






@endsection
