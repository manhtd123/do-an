@extends('User.layouts.master')
@section('title')
Đặt chỗ
@endsection
@section('CssPage')
{{ Html::style('assets/datetimepicker/build/jquery.datetimepicker.min.css') }}
@endsection
@section('content')
<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
            <h2 class="header-title">Đặt bàn</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('booking.index') }}">Đặt bàn</a>
                    <span class="breadcrumb-item active">Chỉnh sửa</span>
                </nav>
            </div>
        </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Cập nhật đặt bàn</h4>
            </div>
            <form method="POST" action="{{ route('booking.update', $booking->id) }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">khách hàng</label>
                                    <select class="form-control" name="customer">
                                        @foreach($customers as $value)
                                        <option value="{{ $value->id }}" @if ($value->id == old('customer', $booking->customer_id)) selected="selected" @endif>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">NV đặt bàn</label>
                                    <input type="text" name="user" readonly="" class="form-control" value="{{ Auth::user()->name }}">
                                    <input type="text" name="user_id" hidden ="" class="form-control" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                	<div data-plugin="timepicker">
	                                    <label class="control-label">Giờ đến</label>
	                                    <div class="icon-input">
	                                        <i class="mdi mdi-clock"></i>
                                            <input type="text" name="time" class="form-control" id="datetimepicker_start_time" autocomplete="off" value="{{ $booking->time }}">
	                                    </div>
	                                </div>
                                    @if ($errors->has('time'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('time') as $time)
                                                <li>{{ $time }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Phòng/Bàn</label>
                                    <select class="form-control" name="table">
                                        @foreach($tables as $value)
                                        <option value="{{ $value->id }}" @if ($value->id == old('table', $booking->table_id)) selected="selected" @endif>{{ $value->name }}</option>
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
                                    <label class="control-label">Số khách</label>
                                    <input type="text" name="people_number" class="form-control" value="{{ $booking->people_number }}">
                                    @if ($errors->has('people_number'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->get('people_number') as $people_number)
                                                <li>{{ $people_number }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    <textarea class="form-control" name="info">{{ $booking->info }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Trạng thái</label>
                                    <div class="radio">
                                        <input id="radio1" name="status" value="0" type="radio" @if($booking->status == 0) checked="checked" @endif>
                                        <label for="radio1">đang chờ</label>
                                    </div>
                                    <div class="radio">
                                        <input id="radio3" name="status" value="2" type="radio" @if($booking->status == 2) checked="checked" @endif>
                                        <label for="radio3">hủy đặt</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-6 offset-md-5">
                            <div class="p-h-10">
                                <button type="reset" class="btn btn-default">Bỏ qua</button>
                                <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button> 
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
<script src="{{ asset('assets/datetimepicker/build/jquery.datetimepicker.full.min.js') }}"></script>
<script>
jQuery('#datetimepicker_start_time').datetimepicker({
	startDate:'+1971/05/01',
	mask:true,
	format:'Y-m-d H:i:s'
});
</script>
@endsection
