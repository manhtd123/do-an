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
					<span class="breadcrumb-item active">Mục lục</span>
				</nav>
			</div>
		</div>
		<div class="text-right">
			<a href="{{ route('user.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Người dùng</a>
			<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" id="open"><span class="fa fa-plus"></span> Người dùng</button> -->
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
								<th>Email</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@php
								$stt = 1;
							@endphp
							@foreach($users as $value)
							<tr>
								<td>
									{{ $stt++ }}
								</td>
								<td data-value="{{ $value }}" data-toggle="modal" data-target="#modal-lg" id = "show-user">
									<div class="list-media">
										<div class="list-item">
											<div class="media-img">
												<img src="{{ asset('assets/avatar/'.$value->avatar) }}" alt="">
											</div>
											<div class="info">
												<span class="title">{{ $value->name }}</span>
												<span class="sub-title">{{ $value->department->name }}</span>
											</div>
										</div>
									</div>
								</td>
								<td>{{ $value->email }}</td>
								<td class="text-center font-size-18">
									<a href="{{ route('user.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
									<a data-toggle="modal" data-target="#basic-modal" data-url="{{ route('user.destroy', $value->id) }}" class="text-gray"><i class="ti-trash"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div> 
			</div>       
		</div>
		<div class="modal fade" id="basic-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div>
							<h4 class="d-flex align-items-center h-100 head">Bạn có chắc chắn xóa</h4>
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
									{{ Form::submit('delete', ['class' =>'btn btn-danger']) }}
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
								<div class="col-lg-6">
									<div class="avata-name">
									<legend class="avata text-center">{{ __('avatar') }}</legend>
									<hr>
									</div>
									<div class="avata text-center">
										<img id = "avatar" class="avata-img img-circle" alt="">
									</div>
								</div>
								<div class="col-lg-6">
								<legend class="avata text-center">{{ __('Information') }}</legend>
								<hr>
									<div class="form-group">
										{{ Form::label(__('name :'), null, ['class' => 'control-label']) }}
										<span id ="name"></span>
									</div>
									<div class="form-group">
										{{ Form::label(__('email :'), null, ['class' => 'control-label']) }}
										<span id ="email"></span>
									</div>
									<div class="form-group">
										{{ Form::label(__('phone :'), null, ['class' => 'control-label']) }}
										<span id ="phone"></span>
									</div>
									<div class="form-group">
										{{ Form::label(__('birth_day :'), null, ['class' => 'control-label']) }}
										<span id ="birthday"></span>
									</div>
									<div class="form-group">
										{{ Form::label(__('sex :'), null, ['class' => 'control-label']) }}
										<span id ="sex"></span>
									</div>
									<div class="form-group">
										{{ Form::label(__('address :'), null, ['class' => 'control-label']) }}
										<span id ="address"></span>
									</div>
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
		// jQuery('#ajaxSubmit').click(function(e){
  //          e.preventDefault();
  //          $.ajaxSetup({
  //             headers: {
  //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  //             }
  //         });
  //          jQuery.ajax({
  //             url: "{{ route('user.index') }}",
  //             method: 'post',
  //             data: {
  //                name: jQuery('#name').val(),
  //                email: jQuery('#email').val(),
  //                password: jQuery('#password').val(),
  //                repassword: jQuery('#repassword').val(),
  //                department: jQuery('#department').val(),
  //             },
  //             success: function(result){
  //             	if(result.errors)
  //             	{
  //             		jQuery('.alert-danger').html('');

  //             		jQuery.each(result.errors, function(key, value){
  //             			jQuery('.alert-danger').show();
  //             			jQuery('.alert-danger').append('<li>'+value+'</li>');
  //             		});
  //             	}
  //             	else
  //             	{
  //             		jQuery('.alert-danger').hide();
  //             		$('#myModal').modal('hide');
  //             	}
  //             }});
  //          });
	});
	$('#modal-lg').on('show.bs.modal', function(e) {
		var value = $(e.relatedTarget).data('value');
		$('#avatar').attr('src', '/assets/avatar/' + value.avatar);
		$('#name').text(value.name);
		$('#email').text(value.email);
		$('#phone').text(value.phone);
		$('#birthday').text(value.birth_day);
		$('#sex').text(value.sex);
		$('#address').text(value.address);
	});
</script>
@endsection
