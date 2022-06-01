<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!!asset('PurpleAdmin/assets/vendors/mdi/css/materialdesignicons.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('PurpleAdmin/assets/vendors/css/vendor.bundle.base.css')!!}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{!!asset('PurpleAdmin/assets/css/style.css')!!}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{!!asset('PurpleAdmin/assets/images/favicon.ico')!!}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  </head>
  <body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    @include('layouts.sidebar')
    <!-- partial -->
    <div class="main-panel">
      @yield('content')
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      @include('layouts.footer')
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
    <!-- page-body-wrapper ends -->
</div>
  <!-- container-scroller -->
    <!-- plugins:js -->
    @stack('scripts')
    <script src="{!!asset('PurpleAdmin/assets/vendors/js/vendor.bundle.base.js')!!}"></script>
    <!-- endinject -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Plugin js for this page -->
    <script src="{!!asset('PurpleAdmin/assets/vendors/chart.js/Chart.min.js')!!}"></script>
    <script src="{!!asset('PurpleAdmin/assets/js/jquery.cookie.js')!!}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{!!asset('PurpleAdmin/assets/js/off-canvas.js')!!}"></script>
    <script src="{!! asset('PurpleAdmin/assets/js/hoverable-collapse.js') !!}"></script>
    <script src="{!! asset('PurpleAdmin/assets/js/misc.js') !!}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{!! asset('PurpleAdmin/assets/js/dashboard.js') !!}"></script>
    <script src="{!! asset('PurpleAdmin/assets/js/todolist.js') !!}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>