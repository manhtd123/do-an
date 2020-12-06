@extends('User.layouts.master')
@section('title')
Đặt chỗ
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
                    <h2 class="header-title">Đặt bàn</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('booking.index') }}">Đặt bàn</a>
                            <span class="breadcrumb-item active">Danh mục</span>
                        </nav>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <a href="{{ route('booking.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Đặt bàn</a>
            </div>
        </div>
		<div class="card">
			<div class="card-body">
				<div class="tab-primary">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <a href="#nav-pills-1" class="nav-link active" role="tab" data-toggle="tab">Đang chờ xử lí</a>
                        </li>
                        <li class="nav-item">
                            <a href="#nav-pills-2" class="nav-link" role="tab" data-toggle="tab">Đã hủy</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="nav-pills-1">
                            <div class="p-h-15 p-v-20">
                                <div class="table-overflow">
									<table id="dt-opt" class="table table-hover table-xl">
										<thead>
											<tr>
												<th>
													STT
												</th>
												<th>Khách hàng</th>
												<th>Giờ đến</th>
												<th>Điện thoại</th>
												<th>Số khách</th>
												<th>Phòng/Bàn</th>
												<th>Trạng thái</th>
												<th>Ghi chú</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@php
												$stt = 1;
											@endphp
											@foreach($book_waits as $value)
											<tr>
												<td>
													{{ $stt++ }}
												</td>
												<td>{{ $value->customer->name }}</td>
												<td>{{ $value->time }}</td>
												<td>{{ $value->customer->phone }}</td>
												<td>{{ $value->people_number }}</td>
												<td>{{ $value->table->name }}</td>
												<td>@if ($value->status == 0)
				                                    <span class="badge badge-gradient-info">đã xếp bàn</span>
				                                    @elseif ($value->status == 1)
				                                    <span class="badge badge-gradient-success">đã nhận bàn</span>
				                                    @elseif ($value->status == 2)
				                                    <span class="badge badge-gradient-warning">quá giờ</span>
				                                    @else
				                                    <span class="badge badge-gradient-danger">hủy đặt</span>
				                                    @endif
				                                </td>
												<td>{{ $value->info }}</td>
												<td class="text-center font-size-18">
													<a href="{{ route('booking.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div> 
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="nav-pills-2">
                            <div class="p-h-15 p-v-20">
                                <div class="table-overflow">
									<table id="dt-opt" class="table table-hover table-xl">
										<thead>
											<tr>
												<th>
													STT
												</th>
												<th>Khách hàng</th>
												<th>Giờ đến</th>
												<th>Điện thoại</th>
												<th>Số khách</th>
												<th>Phòng/Bàn</th>
												<th>Trạng thái</th>
												<th>Ghi chú</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@php
												$stt = 1;
											@endphp
											@foreach($book_refuses as $value)
											<tr>
												<td>
													{{ $stt++ }}
												</td>
												<td>{{ $value->customer->name }}</td>
												<td>{{ $value->time }}</td>
												<td>{{ $value->customer->phone }}</td>
												<td>{{ $value->people_number }}</td>
												<td>{{ $value->table->name }}</td>
												<td>@if ($value->status == 0)
				                                    <span class="badge badge-gradient-info">đang chờ</span>
				                                    @elseif ($value->status == 1)
				                                    <span class="badge badge-gradient-success">đã xếp bàn</span>
				                                    @else
				                                    <span class="badge badge-gradient-danger">hủy đặt</span>
				                                    @endif
				                                </td>
												<td>{{ $value->info }}</td>
												<td class="text-center font-size-18">
													<a href="{{ route('booking.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
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
@endsection
