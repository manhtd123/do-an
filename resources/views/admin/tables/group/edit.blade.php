@extends('admin.layouts.master')
@section('title')
nhóm bàn
@endsection
@section('CssPage')
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Nhóm bàn</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('tableGroup.index') }}">Nhóm bàn</a>
                    <span class="breadcrumb-item active">Chỉnh sửa</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Sửa nhóm nhà cung cấp</h4>
            </div>
            <form method="POST" action="{{ route('tableGroup.update', $group->id) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Tên nhóm bàn</label>
                                    <input type="text" class="form-control" value="{{ $group->name }}" name="name">
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    <textarea class="form-control" name="info">{{ $group->info }}</textarea>
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
