<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <!-- plugins -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- Plugin css for this Site -->

    <!-- Datatable -->
    <link rel="stylesheet" href="{{asset('vendors/toastr/toastr.min.css')}}">
    <!-- Datatable -->
    <link rel="stylesheet" href="{{asset('vendors/datatable/datatable.min.css')}}">

    {{-- <link rel="stylesheet" href="{{asset('vendors/jvectormap/jquery-jvectormap.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- summernote editor -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- End plugin css for this page -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
  </head>
  <body>

    <!-- Start container-scroller -->
    <div class="container-scroller">
         @include('layouts.sidebar')
           <!-- Start container-fluid -->
        <div class="container-fluid page-body-wrapper">
            @include('layouts.navber')
          <div class="main-panel">
             <div class="content-wrapper">

              <!-- Success Message -->
              @if(Session('success'))
                 <div class="alert alert-success text-dark" role="alert"> {{Session('success')}} </div>
              @endif
               <!-- Eroor Message -->
              @if(Session('error'))
                 <div class="alert alert-danger text-dark" role="alert"> {{Session('error')}} </div>
              @endif
              @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger text-dark">{{$error}}</div>
                    @endforeach
               @endif

              <!-- Toaster Message -->
             {{--  <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body">
                  Hello, world! This is a toast message.
                 </div>
                  <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
              </div> --}}

            @yield('content')
                    
              </div>
             <!-- content-wrapper ends -->
          </div>
          <!-- main-panel ends -->
        </div>
       <!-- page-body-wrapper ends -->
    </div>
    <!-- End container-scroller -->
    
    <!-- js for this Site -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  {{-- Main JS --}}
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js"></script>
    <!--carousel-->
    <script src="{{asset('vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
    <!-- Datatable -->
    <script src="{{asset('vendors/datatable/datatable.min.js')}}"></script>
    <script src="{{asset('vendors/datatable/datatable.js')}}"></script>
   <!-- File Upload -->
    <script src="{{asset('js/file-upload.js')}}"></script>
    <!-- End  js for this Site -->
    <!-- summernote editor -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Custom js for this Site -->
    <script src="{{asset('js/dashboard.js')}}"></script>
    <!-- End custom js for this Site -->

    @yield('scripts')

  </body>
</html>