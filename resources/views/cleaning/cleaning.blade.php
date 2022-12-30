@extends('admin.layouts.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cleaning</h1>
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
                        <h3 >Jahongir hotel</h3>
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
                                        <form action="/cleaning/ready" method="post"
                                            class="float-left">
                                            @csrf
                                            <button type="submit" class="button">
                                               
                                                1 Xona Tayor
                                            </button>
                                            <input type="hidden" name="xona" value="1" >
                                        </form>
                                       
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td> <div>
                                        <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            2 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="2" >
                                    </form>
                                   
                                    </div></td>
                                 </tr>
                                 <tr>
                                    <td>3</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            3 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="3" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>4</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            4 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="4" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>5</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            5 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="5" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>6</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            6 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="6" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>7</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            7 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="7" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>8</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            8 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="8" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>9</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            9 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="9" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>10</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            10 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="10" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>11</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            11 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="11" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>12</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            12 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="12" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>13</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            13 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="13" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>14</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                           14 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="14" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>15</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            15 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="15" >
                                    </form>
                                    </td>
                                 </tr>


                            </tbody>
                        </table>
                        
                    </div>
                    <div class="card-body table-responsive p-0">
                        <h3 >Jahongir Premium</h3>
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Xona Raqami</th>
                                    <th>Xona Xonalti</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                  <td>10</td>
                                  <td>
                                    <div>
                                        <form action="/cleaning/ready" method="post"
                                            class="float-left">
                                            @csrf
                                            <button type="submit" class="button">
                                               
                                                10 Xona Tayor
                                            </button>
                                            <input type="hidden" name="xona" value="10" >
                                            <input type="hidden" name="property_id" value="172793" >
                                        </form>
                                       
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td> <div>
                                        <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            11 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="11" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   
                                    </div></td>
                                 </tr>
                                 <tr>
                                    <td>12</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            12 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="12" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>14</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            14 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="14" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>15</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            15 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="15" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>16</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            16 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="16" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>17</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            17 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="17" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>18</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            18 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="18" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>19</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            19 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="19" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>20</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            20 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="20" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>21</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            21 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="21" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>22</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            22 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="22" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>23</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            23 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="23" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>24</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                           24 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="24" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                   </td>
                                 </tr>
                                 <tr>
                                    <td>25</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            25 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="25" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>26</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            26 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="26" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>27</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            27 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="27" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>28</td>
                                    <td> <form action="/cleaning/ready" method="post"
                                        class="float-left">
                                        @csrf
                                        <button type="submit" class="button">
                                           
                                            28 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="28" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
                                 </tr>
                                 <tr>   
                                           
                                            29 Xona Tayor
                                        </button>
                                        <input type="hidden" name="xona" value="29" >
                                        <input type="hidden" name="property_id" value="172793" >
                                    </form>
                                    </td>
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
