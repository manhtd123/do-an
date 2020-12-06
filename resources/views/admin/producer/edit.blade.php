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
                    <span class="breadcrumb-item active">Chỉnh sửa</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Chỉnh sửa nhà cung cấp <b>"{{ $producer->name }}"</b></h4>
            </div>
            <form method="POST" action="{{ route('producer.update', $producer->id) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên nhà cung cấp</label>
                                    <input type="text" class="form-control" value="{{ $producer->name }}" name="name">
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
                                    <input type="address" name="address" class="form-control" value="{{ $producer->address }}">
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
                                    <input type="text" class="form-control" value="{{ $producer->phone }}" name="phone">
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
                                        <option value="{{ $value->id }}" @if ($value->id == old('group', $producer->supplier_group_id)) selected="selected" @endif>{{ $value->name }}</option>
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
                                    <textarea class="form-control" name="infosup">{{ $producer->info }}</textarea>
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
@endsection
