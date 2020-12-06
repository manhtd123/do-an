<!DOCTYPE html>
<html>


<!-- Mirrored from themenate.com/applicator/dist/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Jul 2018 12:06:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Login</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/apple-touch-icon.html') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />

    <!-- core css -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mystyle.css') }}" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="layout bg-gradient-info">
            <div class="container">
                <div class="row full-height align-items-center">
                    <div class="col-md-7 d-none d-md-block">
                    <img class="img-fluid" src="{{ asset('assets/logo2.png') }}" alt="">
                    <div class="m-t-15 m-l-20">
                        <h1 class="font-weight-light font-size-35 text-white">Dinh Manh Indival</h1>
                        <p class="text-white width-70 text-opacity m-t-25 font-size-16">We are friendly</p>
                        <div class="m-t-60">
                            <a href= "https://www.facebook.com/nguyenthien.hy" class="text-white text-link m-r-15">Term &amp; Conditions</a>
                            <a href="https://www.facebook.com/nguyenthien.hy" class="text-white text-link">Privacy &amp; Policy</a>
                        </div>
                    </div>
                </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="p-15">
                                    <div class="m-b-30">
                                        <img class="img-responsive inline-block" src="{{ asset(config('app.link_logo')) }}" alt="">
                                        <h2 class="inline-block m-v-0 p-t-15">Đăng nhập quản lý</h2>
                                    </div>
                                    <p class="m-t-15 font-size-13">Nhập mật khẩu và email để đăng nhập</p>
                                    {{ Form::open(['method' => 'POST', 'url' => 'admin/login' ]) }}
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true', 'autofocus' => 'autofocus', 'placeholder' => __('email')]) }}
                                            @if ($errors->has('email'))
                                            <span class="help-block error">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'true', 'placeholder' => __('password')]) }}
                                            @if ($errors->has('password')) 
                                            <span class="help-block error">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="checkbox font-size-13 d-inline-block p-v-0 m-v-0">
                                            {{ Form::checkbox('remember', null, false, ['id' => 'remember']) }}
                                            {{ Form::label('remember', __('Remember me')) }}
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('password.request') }}">{{ __('Forgot password') }}</a>
                                        </div>
                                        <div class="m-t-20 text-right">
                                            {{ Form::submit(__('Đăng nhập'), ['class' => 'btn btn-gradient-success']) }}
                                        </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- page js -->
    
</body>

</html>
