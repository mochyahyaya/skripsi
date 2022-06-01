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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
    <!-- select2-bootstrap4-theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha256-7dA7lq5P94hkBsWdff7qobYkp9ope/L5LQy2t/ljPLo=" crossorigin="anonymous"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>
    
    <!-- select2-bootstrap4-theme -->
    <script src="script.js"></script>
    </body>
    </html>
    
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <!-- End custom js for this page -->
    <script>
      $('.select2bs4').select2({
          theme: 'bootstrap4',
      });
    </script>
  </body>
</html>