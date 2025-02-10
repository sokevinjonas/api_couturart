
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title', "Admin de Couturart")</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{asset('assets/images/icon.jpeg')}}" rel="icon">
  <link href="{{asset('panel/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('panel/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('panel/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('panel/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('panel/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('panel/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('panel/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('panel/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  {{-- panel/assets/css/style.css --}}
  <link href="{{asset('panel/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 @include('admin.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
        @yield('pagetitle')
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
     @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span> 2024 Couturart</span></strong> - Tous droits réservés
    </div>
    <div class="credits">
      Dévélopé par <a href="">Jonas SO</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('panel/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('panel/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('panel/assets/js/main.js')}}"></script>

</body>

</html>
