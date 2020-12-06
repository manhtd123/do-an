@extends('admin.layouts.master')
@section('title')
nhà cung cấp
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2 class="header-title">Nhà cung cấp</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('producer.index') }}">Nhà cung cấp</a>
                            <span class="breadcrumb-item active">Danh mục</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="text-right">
          <a href="{{ route('producer.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Nhà cung cấp</a>
          <a href="{{ route('supplierGroup.index') }}" class="btn btn-success"><span class="fa fa-eye"></span> Nhóm nhà cung cấp</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-overflow">
                    <table id="dt-opt" class="table table-hover table-xl">
                        <thead>
                            <tr>
                                <th>
                                    STT
                                </th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Nhóm</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($producers as $value)
                            <tr>
                                <td>
                                    {{ $stt++ }}
                                </td>
                                <td data-value="{{ $value }}" data-toggle="modal" data-target="#modal-lg" id = "show-user">{{ $value->name }}
                                </td>
                                <td>{{ str_Limit($value->address, 20) }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->supplierGroup->name }}</td>
                                <td class="text-center font-size-18">
                                    <a href="{{ route('producer.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                    <a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('producer.destroy', $value->id) }}" class="text-gray"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>       
        </div>
    </div>
    <div class="modal fade" id="basic-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div>
                        <h4 class="d-flex align-items-center h-100 head">Bạn chắc chắn muốn xóa</h4>
                    </div>
                    <div class="container text-center">
                        <div class="text-center font-size-70">
                            <i class="mdi mdi-checkbox-marked-circle-outline icon-gradient-success"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-border">
                    <div class="modal_button">
                        <div class="row"> 
                            {{ Form::button(__('cancel'), ['class' =>'btn btn-default', 'data-dismiss' => 'modal']) }}
                            {!! Form::open(['id' => 'del-form', 'method' => 'delete']) !!}
                                {{ Form::submit(__('delete'), ['class' =>'btn btn-danger']) }}
                            {!! Form::close() !!}
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg" role="document">
            <div class="card">
                <div class="card-body">
                    <div class="panel-body">
                        <div class="row">
                            <legend class="avata text-center">{{ __('thông tin nhà cung cấp') }}</legend>
                            <hr>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label(__('tên :'), null, ['class' => 'control-label']) }}
                                    <span id ="name"></span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label(__('địa chỉ :'), null, ['class' => 'control-label']) }}
                                    <span id ="address"></span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label(__('số điện thoại :'), null, ['class' => 'control-label']) }}
                                    <span id ="phone"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label(__('Ghi chú :'), null, ['class' => 'control-label']) }}
                                    <span id ="info"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/tables/data-table.js') }}"></script>
<script type="text/javascript">
	$(function() {
		$('#basic-modal').on('show.bs.modal', function(e) {
			var url = $(e.relatedTarget).data('url');
			$('#del-form').attr('action', url);
		});
        $('#modal-lg').on('show.bs.modal', function(e) {
            var value = $(e.relatedTarget).data('value');
            $('#name').text(value.name);
            $('#address').text(value.address);
            $('#phone').text(value.phone);
            $('#info').text(value.info);
        });
	});
</script>
@endsection
