@extends('admin.layouts.master')
@section('title')
nhà cung cấp
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Nhà cung cấp</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('producer.index') }}">Nhà cung cấp</a>
                    <span class="breadcrumb-item active">Tạo mới</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Thêm nhà cung cấp</h4>
            </div>
            <form method="POST" action="{{ route('producer.store') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên nhà cung cấp</label>
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
                                    <label class="control-label">Địa chỉ</label>
                                    <input type="address" name="address" class="form-control">
                                </div>
                            </div>
                            @if ($errors->has('address'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('address') as $address)
                                        <li>{{ $address }}</li>
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
                                    <input type="text" class="form-control" name="phone">
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
                                    <label class="control-label">Nhóm</label> <a data-toggle="modal" data-target="#basic-modal" class="btn btn-success"><span class="fa fa-plus"></span></a>
                                    <select class="form-control" name="group">
                                        @foreach($groups as $value)
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
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    <textarea class="form-control" name="infosup"></textarea>
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
        <div class="modal fade" id="basic-modal">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('groupncc') }}">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div>
                                <h4 class="d-flex align-items-center h-100 head">Thêm nhóm cung cấp</h4>
                            </div>
                            <div class="container">
                                <div class="form-group">
                                    <label class="control-label">Tên nhóm cung cấp</label>
                                    <input type="text" class="form-control" name="namencc">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Thông tin</label>
                                    <textarea class="form-control" name="info"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-border">
                            <div class="modal_button">
                                <div class="row"> 
                                    <button type="reset" class="btn btn-default">Bỏ qua</button>
                                    <button type="submit" name="submit" class="btn btn-primary" id="add">Lưu</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>   
    </div>
</div>
@endsection
@section('JsPage')
@endsection
