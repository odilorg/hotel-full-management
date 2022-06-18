@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Companies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Company</li>
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
                        
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Xona Raqami</th>
                                    <th>Xona Xonalti</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                  <td>1</td>
                                  <td>
                                    <div>
                                        <form action="/cleaning/ready/" method="post"
                                            class="float-left">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">
                                               
                                                Xona Tayor
                                            </button>
                                            <input type="hidden" name="xona" value="1" >
                                        </form>
                                        <form action="/cleaning/notready/" method="post"
                                            class="float-left">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                               
                                                Xona Tayor Emas
                                            </button>
                                            <input type="hidden" name="xona" value="1" >
                                        </form>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td> <div>
                                        <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="2" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="2" >
                                    </form>
                                    </div></td>
                                 </tr>
                                 <tr>
                                    <td>3</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="3" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="3" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>4</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="4" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="4" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>5</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="5" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="5" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>6</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="6" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="6" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>7</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="7" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="7" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>8</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="8" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="8" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>9</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="9" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="9" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>10</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="10" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="10" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>11</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="11" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="11" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>12</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="12" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="12" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>13</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="13" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="13" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>14</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="14" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="14" >
                                    </form></td>
                                 </tr>
                                 <tr>
                                    <td>15</td>
                                    <td> <form action="/cleaning/ready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                           
                                            Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="15" >
                                    </form>
                                    <form action="/cleaning/notready/" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                           
                                            Xona Tayor Emas
                                        </button>
                                        <input type="hidden" name="xona" value="15" >
                                    </form></td>
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





@endsection
