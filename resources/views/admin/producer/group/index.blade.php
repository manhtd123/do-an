@extends('admin.layouts.master')
@section('title')
nhóm nhà cung cấp
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<h2 class="header-title">Nhóm nhà cung cấp</h2>
			<div class="header-sub-title">
				<nav class="breadcrumb breadcrumb-dash">
					<a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
					<a class="breadcrumb-item" href="{{ route('supplierGroup.index') }}">Nhóm nhà cung cấp</a>
					<span class="breadcrumb-item active">Mục lục</span>
				</nav>
			</div>
		</div>
		<div class="text-right">
			<a href="{{ route('producer.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Nhà cung cấp</a>
			<a data-toggle="modal" data-target="#modal-lg" class="btn btn-success"><span class="fa fa-plus"></span> Nhóm nhà cung cấp</a>
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
								<th>Ghi chú</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@php
								$stt = 1;
							@endphp
							@foreach($groups as $value)
							<tr>
								<td>
									{{ $stt++ }}
								</td>
								<td>
									{{ $value->name }}
								</td>
								<td>
									{{ $value->info }}
								</td>
								<td class="text-center font-size-18">
									<a href="{{ route('supplierGroup.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div> 
			</div>       
		</div>
		<div class="modal fade" id="modal-lg">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('supplierGroup.store') }}">
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
<script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/tables/data-table.js') }}"></script>
@endsection
