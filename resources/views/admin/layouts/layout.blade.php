<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Jahongir hotel</title>

    <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bs-stepper.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"> </script>
    <script src="{{ asset('assets/admin/js/bootstrap-datepicker.ru.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/numbers_format.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById('invoice');
            // Choose the element and save the PDF for our user.
            html2pdf().from(element).save();
        }
    </script>
    <style>
        

.button {
  text-align: center;
  text-transform: uppercase;
  cursor: pointer;
  font-size: 20px;
  letter-spacing: 4px;
  position: relative;
  background-color: #16a085;
  border: none;
  color: #fff;
  padding: 20px;
  width: 200px;
  text-align: center;
  transition-duration: 0.4s;
  overflow: hidden;
  box-shadow: 0 5px 15px #193047;
  border-radius: 4px;
}

.button:hover {
  background: #fff;
  box-shadow: 0px 2px 10px 5px #1abc9c;
  color: #000;
}

.button:after {
  content: "";
  background: #1abc9c;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

.button:focus { outline:0; }

    </style>
    <script>
        function closeDialog() {
            let d = document.getElementById('toastsContainerTopRight')
            d.style.display = "none"
            d.close()
        }

    </script>
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
   
   
</head>
@yield('contentregister')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="remove-button-styles">Logout</button>
                    </form>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('assets/admin/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('assets/admin/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('assets/admin/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Jahongir hotel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
               
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" width="50px" height="50px"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
               

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      @can('admin')
                      <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-circle"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('reports.index') }}"
                            class="nav-link {{ (request()->is('reports*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Reports
                            </p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('hotels.index') }}"
                            class="nav-link {{ (request()->is('hotels*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hotel"></i>
                            <p>
                                Hotels
                            </p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('rooms.index') }}"
                            class="nav-link {{ (request()->is('rooms*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hotel"></i>
                            <p>
                                Rooms
                            </p>
                        </a>
                    </li> 
                      @endcan
                       @can('not-cleaning')
                       <li class="nav-item">
                        <a href="{{ route('reservations.index'); }}"
                            class="nav-link {{ (request()->is('reservations*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>
                                Hotel Reservations

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('beds24bookings.index'); }}"
                            class="nav-link {{ (request()->is('beds24bookings*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-check"></i>
                            <p>
                                Beds24 Reservations

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('expenses.index'); }}"
                            class="nav-link {{ (request()->is('expenses*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-comment-dollar"></i>
                            <p>Expenses</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contracts.index'); }}"
                            class="nav-link {{ (request()->is('contracts*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-receipt"></i>
                            <p>Contracts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('inkassas.index'); }}"
                            class="nav-link {{ (request()->is('inkassas*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>Inkassas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('companies.index'); }}"
                            class="nav-link {{ (request()->is('companies*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Companies</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('roomrepairs.index'); }}"
                            class="nav-link {{ (request()->is('roomrepairs*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-hammer"></i>
                            <p>Room Repairs</p>
                        </a>
                    </li>
                    <div class="dropdown">
                        
                        <a href="#" class="btn dropdown-toggle {{(request()->is('meters*') || request()->is('utility_usages*') ) ? 'btn-primary' : 'btn-secondary'; }} role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"">
                            <i class="nav-icon fas fa-lightbulb"></i>
                            Utilities
                        </a>
                      
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href={{ route('utility_usages.index'); }}
                          
                          
                          <p>Utility Usages</p></a>
                          <a class="dropdown-item" href="{{ route('meters.index'); }}">Meters</a>
                          
                        </div>
                      </div>

                    
                       @endcan
                       
                       @can('cleaning')
                       <li class="nav-item">
                        <a href="{{ route('cleaning.cleaning'); }}"
                            class="nav-link {{ (request()->is('cleaning*')) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Cleaning</p>
                        </a>
                    </li>
                       @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        @yield('content')
        <!-- Main Footer -->
        @if (session()->has('success'))
        <p>
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-success fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">{{  session()->get('type')  }}</strong><button
                            data-dismiss="toast" type="button" class="ml-2 mb-1 close" onclick="closeDialog()"
                            aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session()->get('success') }}</div>
                </div>
            </div>
        </p>
        @elseif (session()->has('error'))
        <p>
            <div id="toastsContainerTopRight" class="toasts-top-right fixed">
                <div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header"><strong class="mr-auto">{{  session()->get('type')  }}</strong><button
                        data-dismiss="toast" type="button" class="ml-2 mb-1 close" onclick="closeDialog()"
                        aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="toast-body">{{ session()->get('error') }}</div>
                </div>
            </div>
        </p>
        @endif
        
    </div>
    <script type="text/javascript">
        $(".date").datepicker({
            format: "yyyy-mm-dd",
            todayBtn: "linked",
            language: "ru",
            todayHighlight: true,
            orientation: "bottom auto"
        });
      </script>
</body>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.inputmask.min.js') }}">    </script>
    <script src="{{ asset('assets/admin/js/tempusdominus-bootstrap-4.min.js') }}"></script>


    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('yyyy/mm/dd', {
                'placeholder': 'yyyy/mm/dd'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('yyyy/mm/dd', {
                'placeholder': 'yyyy/mm/dd'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            $('#reservationdate2').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#reservationdatetime2').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'DD/MM/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function (file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function () {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function (progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function (file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function (progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function () {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function () {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End

    </script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            var maxLimit = 15;
            var appendHTML =
                '<div class="card card-success "> <!--start here --> <div class="card-header "> <h3 class="card-title">Itinarary</h3> </div> <div class="card-body"> <div class="form-group"> <label for="exampleSelectRounded0">Choose Transport type</label> <select class="custom-select rounded-0" name="transport_type" id="train"> <option value="Auto">Auto</option> <option value="Train">Train</option> <option value="Air">Air</option> </select> </div> <div id="trainFieldDiv"> <div class="form-group"> <label for="exampleSelectRounded0">Choose Train Name</label> <select class="custom-select rounded-0" name="train_name" id="trainField"> <option value="Afrosiab">Afrosiab</option> <option value="Shark">Shark</option> <option value="Standard">Standard</option> </select> </div> <div class="form-group" id="ticket_classFieldDiv"> <label for="exampleSelectRounded0">Choose Train Ticket Class</label> <select class="custom-select rounded-0" name="train_ticket_class" id="ticket_classField"> <option value="Econom">Econom</option> <option value="Business">Business</option> <option value="VIP">VIP</option> <option value="Plaskard">Plaskard</option> <option value="Kupe">Kupe</option> </select> </div> </div> <div id="auto"> <div class="form-group" id="auto_type"> <div class="form-check"> <input class="form-check-input" value="Sedan" type="radio" name="auto_type"> <label class="form-check-label">Sedan</label> </div> <div class="form-check"> <input class="form-check-input" value="Mini Bus" type="radio" name="auto_type"> <label class="form-check-label">Mini Bus</label> </div> <div class="form-check"> <input class="form-check-input" value="Bus" type="radio" name="auto_type"> <label class="form-check-label">Bus</label> </div> </div> <div class="form-group"> <label>Car Make</label> <input type="text" class="form-control" name="car_make" placeholder="Car make"> </div> </div> <div class="form-group" id="air"> <label for="exampleSelectRounded0">Choose Air Ticket Class</label> <select class="custom-select rounded-0" name="air_ticket_class" id="ticket_classField"> <option value="Econom">Econom</option> <option value="Business">Business</option> <option value="VIP">VIP</option> </select> </div> <div class="form-group" id="car_extra_features"> <label for="exampleInputEmail1">Extra Info Transport</label> <input type="text" value="{{ old('extra_info_transport') }}" name="extra_info_transport" class="form-control @error('extra_info_transport') {{ 'is-invalid' }} @enderror" id="exampleInputEmail1" placeholder="Extra Info Transport"> @error('extra_info_transport') <p class="text-danger">{{ $message }}</p> @enderror </div> <div class="row"> <div class="col-sm-6"> <div class="form-group"> <label for="exampleSelectRounded0">Choose Transport type</label> <select class="custom-select rounded-0" name="pickup_or_dropoff_or_marshrut[]" id="exampleSelectRounded0"> <option value="Pickup">Pickup</option> <option value="Dropoff">Dropoff</option> <option value="Marshrut">Marshrut</option> </select> </div> </div> <div class="col-sm-6"> <div class="form-group"> <label>Extra Info</label> <input type="text" class="form-control" name="extra_info" placeholder="Extra info"> </div> </div> </div> <div class="row"> <div class="col-sm-6"> <!-- text input --> <div class="form-group"> <label>From</label> <input type="text" class="form-control" name="pickup_or_dropoff_from[]" placeholder="From"> </div> </div> <div class="col-sm-6"> <div class="form-group"> <label>To</label> <input type="text" class="form-control" name="pickup_or_dropoff_to[]" placeholder="TO"> </div> </div> </div> <div class="row"> <div class="col-sm-6"> <!-- text input --> <div class="form-group"> <label>Driver Name</label> <input type="text" class="form-control" name="driver_name[]" placeholder="Driver Name"> </div> </div> <div class="col-sm-6"> <div class="form-group"> <label>Driver Tel</label> <input type="text" class="form-control" name="driver_tel[]" placeholder="Driver Tel"> </div> </div> </div> <div class="row"> <div class="col-sm-6"> <div class="form-group"> <label>Date and time:</label> <div class="input-group date" id="reservationdatetime" data-target-input="nearest"> <input type="text" name="pickup_or_dropoff_date_time[]" class="form-control datetimepicker-input" data-target="#reservationdatetime"> <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker"> <div class="input-group-text"><i class="fa fa-calendar"></i></div> </div> </div> </div> </div> </div> </div> <!-- /.card-body --> </div>';
            //var appendHTML = '<div class="input-group control-group input-wrapper mt-2"><input type="text" name="name[]" class="form-control" placeholder="Enter value here"><div class="input-group-btn"><button class="btn btn-danger bs-remove-button" type="button"><i class="fa fa-minus"></i> Remove</button></div></div>'; 
            var x = 1;

            // for addition
            jQuery('.bs-add-button').click(function (e) {
                e.preventDefault();
                if (x < maxLimit) {
                    jQuery('.bs-form-wrappe').append(appendHTML);
                    x++;
                }
            });

            // for deletion

        });

   
        $("#train").change(function () {
            if ($(this).val() == "Train") {
                $('#trainFieldDiv').show();
                $('#auto').hide();
                $('#air').hide();
                
            } else {
                $('#trainFieldDiv').hide();
               
            }
        });
        $("#train").trigger("change");

        $("#train").change(function () {
            if ($(this).val() == "Auto") {
                $('#auto').show();
                $('#trainFieldDiv').hide();
                $('#air').hide();
                
            } else {
                $('#auto').hide();
               
            }
        });
        $("#train").trigger("change");
        $("#train").change(function () {
            if ($(this).val() == "Air") {
                $('#auto').hide();
                $('#trainFieldDiv').hide();
                $('#air').show();
                
            } else {
                $('#air').hide();
               
            }
        });
        $("#train").trigger("change");
        
    
    </script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#picker').dateTimePicker();
        $('#picker-no-time').dateTimePicker({ showTime: false, dateFormat: 'DD/MM/YYYY', title: 'Select Date'});
        
    })
    </script>
    
    


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
          $('input.typeahead').typeahead({
              source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
              }
          });
      </script>
      <script type="text/javascript">
        var path = "{{ route('fill_company') }}";
          $('input.fill_company').typeahead({
              source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
              }
          });
      </script>
      
       

</html>
