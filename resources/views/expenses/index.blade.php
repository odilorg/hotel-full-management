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
                    <h1>{{ __('Expenses') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('Expenses') }}</li>
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
                            @if ((!empty($hotel_id)))
                            <a class="btn btn-info btn-sm" href="{{ route('expenses.create2', ['id' => $hotel_id]) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{ __('Add Your Expense') }}
                            </a>
                            @endif
                            
                        </div>
                        <div class="mt-1">
                            <select class="custom-select rounded-0" name="guide_status" id="hotel_select">
                                <option value="">Choose Hotel</option>
                                @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" 
                                    <?php 
                                 if (empty($hotel_id)) {
                                    '';
                                } elseif($hotel->id == $hotel_id) {
                                    echo 'selected';
                                }
                                 ?> 
                                 >{{ $hotel->hotel_name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <hr>
                        <table style="width: 100%;" class="table table-hover text-nowrap" id="employee_table">
                            <thead>
                                <tr>
                                    <th>{{ __('Expense Date') }}</th>
                                    <th>{{ __('Expense Names') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Expense Type') }}</th>
                                    <th>{{ __('Payment Type') }}</th>
                                    
                                    <th>{{ __('Expense N') }}</th>
                                    @if (empty($hotel_id))
                                    <th>{{ __('Hotel') }}</th>
                                    @endif
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense )
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($expense->expense_date )->format('d/m/Y')   }} </td>
                                    <td> {{ $expense->expense_name }} </td>
                                    <td>{{ number_format($expense->expense_amount_uzs,2,',',' ')  }}</td>
                                    <td>{{ $expense->category_name }}</td>
                                    <td>{{ $expense->payment_type_name }}</td>
                                   
                                    <td>{{ $expense->expense_number }}</td>
                                    @if (empty($hotel_id))
                                    <td>{{ $expense->hotel_name }}</td>
                                    @endif
                                  
                                    <td><a class="btn btn-primary btn-sm" href="expenses/{{ $expense->id }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                      
                                       <a class="btn btn-info btn-sm" href="{{ route('expenses.edit', ['expense' => $expense->id]) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>  
                                       
                                       <form action="/expenses/{{ $expense->id }}" method="post"
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
                            {{ $expenses->links('admin.layouts.paginationlinks') }}
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
<div class="modal fade" id="exampleModal-report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                <button type="button" class="close" data-dismiss="modal-report" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('expenses.report') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleSelectRounded0">Report N</label>
                        <select class="custom-select rounded-0" name="report_number" id="exampleSelectRounded0">
                            <option class="font-weight-bold" value="">Select Report</option>
                            @foreach ($unique_report_number as $report )
                            <option>{{ $report->report_number }}</option>
                            @endforeach
                        </select>
                        @error('referer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal-range" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                <button type="button" class="close" data-dismiss="modal-report" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('expenses.report-range') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Arriva From</label>
                        <div class="input-group " id="reservationdate" data-target-input="nearest">
                            <input type="text" value="{{ old('from_date') }}" name="from_date" class="form-control date  @error('from_date')
                {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('from_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Arrival To:</label>
                        <div class="input-group " id="reservationdate" data-target-input="nearest">
                            <input type="text" value="{{ old('to_date') }}" name="to_date" class="form-control date @error('to_date')
                {{ 'is-invalid' }} @enderror datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('to_date')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#hotel_select").change (function () { 
            var id = $('#hotel_select option:selected').val()
          

            var url = window.location.origin;
           
            url = url + "/expenses/" +"view/"+id;  // this number is dynamic actually
           
            window.location.href = url;
 });
        
        
        
    });
</script>




@endsection
