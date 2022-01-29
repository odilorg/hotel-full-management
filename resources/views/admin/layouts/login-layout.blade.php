<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SSST</title>

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
    <script>
        function closeDialog() {
            let d = document.getElementById('toastsContainerTopRight')
            d.style.display = "none"
            d.close()
        }

    </script>
</head>
@yield('contentregister')



    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.full.min.js') }}">
        

    </script>
    <script src="{{ asset('assets/admin/js/moment.min.js') }}">
       

    </script>
    <script src="{{ asset('assets/admin/js/jquery.inputmask.min.js') }}">
       

    </script>
    <script src="{{ asset('assets/admin/js/tempusdominus-bootstrap-4.min.js') }}">
        

    </script>

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
@endif
   

   

</body>

</html>
