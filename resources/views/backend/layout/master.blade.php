<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Sunshine | @yield('title')</title>
    <!-- Đục lỗ custom-css -->
    @yield('custom-css')
  </head>
  <body>
    <!-- NavBar include nhúng vào -->
    @include('backend.layout.partials.navbar')

    <div class="container-fluid">
            <div class="row">
            <!-- sidebar -->
            @include('backend.layout.partials.sidebar')
              <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">@yield('title-chucnang')</h1>
                        <a href="{{route('backend.dashboard')}}">@yield('feature-description')</a>
                </div>
                @include('backend.layout.partials.flash-message')
                @include('backend.layout.partials.error-message')
                @yield('content')
              </main>
              <!-- EndContent-->
            </div>
          </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popperjs/popper.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- Custom riêng javascript cho từng trang quản lý -->

      <!-- Thư viện Jquery validation -->
      <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
      <script src="{{ asset('vendor/jquery-validation/localization/messages_vi.min.js') }}"></script>
  @yield('custom-js');
  </body>
</html>
