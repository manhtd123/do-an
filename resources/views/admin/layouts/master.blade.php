<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('assets/logoo1.jpg') }}">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />

    <!-- page css -->
    @yield('CssPage')

    <!-- core css -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mystyle.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app header-success-gradient">
        <div class="layout">
            <!-- Header START -->
            @include('admin.layouts.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('admin.layouts.navbar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Quick View START -->
                @include('admin.layouts.quickview')
                <!-- Side Panel END -->

                <!-- Content Wrapper START -->
                @yield('content')
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="content-footer">
                    <div class="footer">
                        <div class="copyright">
                            <span>Copyright © <b class="text-dark"></b>dinhmanh</span>
                            <span class="go-right">
                                <a href="#" class="text-gray m-r-15">Term &amp; Conditions</a>
                                <a href="#" class="text-gray">Privacy &amp; Policy</a>
                            </span>
                        </div>
                    </div>
                </footer>
                <!-- Footer END -->
            </div>
            <!-- Page Container END -->
        </div>
    </div>
    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- page js -->
    @yield('JsPage')
    
    <script src="{{ asset('assets/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            @if (Session::has('success'))
                $.notify(
                {
                    icon: 'mdi mdi-check-circle-outline',
                    message: '{{ Session('success') }}'
                }, {
                    type: 'success',
                    timer: 1000,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }
                });
            @elseif (Session::has('error'))
                $.notify(
                {
                    icon: 'mdi mdi-close-circle-outline',
                    message: '{{ Session('error') }}'
                }, {
                    type: 'danger',
                    timer: 1000,
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    }
                });
            @endif
        });
    </script>
</body>
</html>
