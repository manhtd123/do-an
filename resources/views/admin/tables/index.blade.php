@extends('admin.layouts.master')
@section('title')
Bàn
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
                    <h2 class="header-title">Bàn</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('table.index') }}">Bàn</a>
                            <span class="breadcrumb-item active">Danh mục</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="text-right">
          <a href="{{ route('table.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Bàn</a>
          <a href="{{ route('tableGroup.index') }}" class="btn btn-success"><span class="fa fa-eye"></span> Nhóm</a>
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
                                <th>Số ghế</th>
                                <th>Trạng thái</th>
                                <th>Vị trí</th>
                                <th>Ghi chú</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($tables as $value)
                            <tr>
                                <td>
                                    {{ $stt++ }}
                                </td>
                                <td data-value="{{ $value }}" data-toggle="modal" data-target="#modal-lg" id = "show-user">{{ $value->name }}
                                </td>
                                <td>{{ $value->number_slot }}</td>
                                <td data-toggle="modal" data-value="{{ $value }}" data-target="#modal-sm" data-url="{{ route('table.update', $value->id) }}"> @if ($value->status == 0)
                                    <span class="badge badge-gradient-info">hoạt động</span>
                                    @elseif ($value->status == 1)
                                    <span class="badge badge-gradient-danger">bảo trì</span>
                                    @else
                                    <span class="badge badge-gradient-warning">đang sử dụng</span>
                                    @endif
                                </td>
                                <td>{{ $value->tableGroup->name }}</td>
                                <td>{{ str_limit($value->info, 10) }}</td>
                                <td class="text-center font-size-18">
                                    <a href="{{ route('table.edit', $value->id) }}" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                            <legend class="avata text-center">{{ __('thông tin bàn') }}</legend>
                            <hr>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {{ Form::label(__('tên :'), null, ['class' => 'control-label']) }}
                                    <span id ="name"></span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label(__('số ghế :'), null, ['class' => 'control-label']) }}
                                    <span id ="number_slot"></span>
                                </div>
                                <div class="form-group">
                                    {{ Form::label(__('trạng thái :'), null, ['class' => 'control-label']) }}
                                    <span id ="status"></span>
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
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="m-b-15">Chuyển trạng thái</h4>
                    <form method="POST" id="update-form">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="radio">
                                <input id="radio1" name="status" value="0" type="radio" checked>
                                <label for="radio1">Hoạt động</label>
                            </div>
                            <div class="radio">
                                <input id="radio2" name="status" value="1" type="radio">
                                <label for="radio2">Bảo trì</label>
                            </div>
                            <div class="radio">
                                <input id="radio3" name="status" value="2" type="radio">
                                <label for="radio3">Đang sử dụng</label>
                            </div>
                        </div>
                        <input type="text" name="name" id="name1" hidden="">
                        <input type="text" name="info" id="info1" hidden="">
                        <input type="text" name="group" id="group_id1" hidden="">
                        <input type="text" name="number_slot" id="number_slot1" hidden="">
                        <div class="m-t-20 text-center">
                            <button class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-primary" type="submit">Lưu</button>
                        </div>
                    </form>
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
            if(value.status == 0) {
                var status = "hoạt động";
            } else if (value.status == 1) {
                var status = "bảo trì";
            } else {
                var status = "đang sử dụng";
            }
            $('#name').text(value.name);
            $('#number_slot').text(value.number_slot);
            $('#status').text(status);
            $('#info').text(value.info);
        });
        $('#modal-sm').on('show.bs.modal', function(e) {
            var url = $(e.relatedTarget).data('url');
            $('#update-form').attr('action', url);
            var value = $(e.relatedTarget).data('value');
            $('#name1').attr('value', value.name);
            $('#number_slot1').attr('value', value.number_slot);
            $('#info1').attr('value', value.info);
            $('#group_id1').attr('value', value.table_group_id);
        });
	});
</script>
@endsection
