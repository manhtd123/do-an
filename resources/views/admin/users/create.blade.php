@extends('admin.layouts.master')
@section('title')
user
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Tài khoản</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('user.index') }}">Tài khoản</a>
                    <span class="breadcrumb-item active">Tạo mới</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Thêm người dùng</h4>
            </div>
            <form method="POST" action="{{ route('user.store') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên người dùng</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('name') as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email" class="form-control" required="">
                                </div>
                            </div>
                            @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('email') as $email)
                                        <li>{{ $email }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" required="">
                                </div>
                            </div>
                            @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('password') as $password)
                                        <li>{{ $password }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Gõ lại mật khẩu</label>
                                    <input type="password" name="repassword" class="form-control" required="">
                                </div>
                            </div>
                            @if ($errors->has('repassword'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('repassword') as $repassword)
                                        <li>{{ $repassword }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Vai trò</label>
                                    <select class="form-control" name="department">
                                        @foreach($departments as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <button type="reset" class="btn btn-default">Bỏ qua</button>
                                <button type="submit" name="submit" class="btn btn-primary">Lưu</button> 
                            </div>
                        </div>
                    </div> 
                </div>  
            </form>  
        </div>   
    </div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/tables/data-table.js"></script>
@endsection
