@extends('admin.layouts.master')
@section('title')
product
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
                    <h2 class="header-title">Hàng hóa</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('product.index') }}">Hàng hóa</a>
                            <span class="breadcrumb-item active">Danh mục</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="text-right">
          <a href="{{ route('product.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Hàng hóa</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-overflow">
                    <table id="dt-opt" class="table table-hover table-xl">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Đơn vị</th>
                                <th>Số lượng</th>
                                <th>Thực đơn</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody> 
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($products as $value)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{!! str_limit($value->describe, 10) !!}</td>
                                    <td>{{ $value->unit }}</td>
                                    <td>{{ $value->quantity }}</td>
                                    <td>{{ $value->bua }}</td>
                                    <td class="font-size-18 text-center">
                                        <a href="{{ route('product.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                        <a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('product.destroy', $value->id) }}" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                        <a class="text-gray m-r-15" href="{{ route('product.show', $value->id) }}"><i class="fa fa-eye"></i></a>
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
	});
</script>
@endsection
