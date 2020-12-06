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
                    <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('customer.index') }}">Khách hàng</a>
                    <span class="breadcrumb-item active">Chỉnh sửa</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Chỉnh sửa khách hàng <b>"{{ $customer->name }}"</b></h4>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                <h1>{{session('success')}}</h1>
            </div>
            @endif
            <form method="POST" action="{{ route('customer.update', $customer->id) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" value="{{ $customer->name }}" name="name">
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
                                    <input type="email" name="email" value="{{ $customer->email }}" class="form-control" required="">
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
                                    <input type="text" class="form-control" value="{{ $customer->phone }}" name="phone">
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
                                    <input type="date" class="form-control" value="{{ $customer->birthday }}" name="birthday">
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
