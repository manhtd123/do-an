@extends('admin.layouts.master')
@section('title')
customer
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Khách hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a class="breadcrumb-item" href="{{ route('admin.home') }}"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('customer.index') }}">Khách hàng</a>
                    <span class="breadcrumb-item active">Tạo mới</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Thêm khách hàng</h4>
            </div>
            <form method="POST" action="{{ route('customer.store') }}" enctype = "multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? null }}">
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
                                    <input type="email" name="email" class="form-control" value="{{ old('email') ?? null }}" required="">
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
                                    <label class="control-label">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? null }}">
                                </div>
                            </div>
                            @if ($errors->has('phone'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('phone') as $phone)
                                        <li>{{ $phone }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Ngày sinh</label>
                                    <input type="date" class="form-control" name="birthday" value="{{ old('birthday') ?? null }}">
                                </div>
                            </div>
                            @if ($errors->has('birthday'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('birthday') as $birthday)
                                        <li>{{ $birthday }}</li>
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
                                    <label class="control-label">Giới tính</label>
                                    <div class="radio">
                                        <input id="radio1" name="sex" value="0" type="radio" checked>
                                        <label for="radio1">Nam</label>
                                    </div>
                                    <div class="radio">
                                        <input id="radio2" name="sex" value="1" type="radio">
                                        <label for="radio2">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('sex'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('sex') as $sex)
                                        <li>{{ $sex }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Ảnh</label>
                                    <div class="input-group control-group increment" >
                                        <input type="file" accept="image/*" onchange="loadFile(event)">
                                        <img id="output" width="150" height="150"/>
                                        <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                            URL.revokeObjectURL(output.src)
                                            }
                                        };
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <a class="btn btn-light" href="{{ url('admin/customer') }}">Trở lại</a>
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
@endsection
