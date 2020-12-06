@extends('admin.layouts.master')
@section('title')
Hóa đơn bàn
@endsection
@section('CssPage')
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-header">
                        <h2 class="header-title">Phiếu thanh toán</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                                <a class="breadcrumb-item" href="{{ route('billTable.index') }}">Phiếu thanh toán</a>
                                <span class="breadcrumb-item active">Hiển thị</span>
                            </nav>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="card">
                <div class="p-v-5 p-h-10 border bottom print-invisible">
                    <ul class="list-unstyle list-inline text-right">
                        <li class="list-inline-item">
                            <a href="#" class="btn text-gray text-hover display-block p-10 m-b-0" onclick="window.print();">
                                <i class="ti-printer text-info p-r-5"></i>
                                <b>Print</b>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-gray text-hover display-block p-10 m-b-0">
                                <i class="fa fa-file-pdf-o text-danger p-r-5"></i>
                                <b>Export PDF</b>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="p-h-30">
                        <div class="m-t-15">
                            <div class="pull-right">
                                <h2>Hóa đơn</h2>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-8">
                                <h3 class="p-l-10 m-t-10">Hóa đơn khách hàng: {{ $bill->customer->name }}</h3>
                                <address class="p-l-10 m-t-10">
                                    <b class="text-dark">Số điện thoại khách hàng: {{ $bill->customer->phone }}</b><br>
                                </address>
                            </div>
                            <div class="col-sm-4">
                                <div class="m-t-80">
                                    <div class="text-dark text-uppercase d-inline-block"><b>Phòng/Bàn :</b></div>
                                    <div class="pull-right">{{ $booking->table->name }}</div>
                                </div>
                                <div class="text-dark text-uppercase d-inline-block"><b>Ngày :</b></div>
                                <div class="pull-right">{{ $bill->date }}</div>
                                <div class="text-dark text-uppercase d-inline-block"><b>Người tạo :</b></div>
                                <div class="pull-right">{{ $bill->user->name }}</div>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-sm-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên hàng</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th class="text-right">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $stt = 1;
                                        @endphp
                                        @foreach($billdetails as $value)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $value->nameproduct }}</td>
                                            <td>{{ $value->real_quantity }}</td>
                                            <td>{{ $value->sale_price }}</td>
                                            <td class="text-right">{{ $value->total }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row m-t-30">
                                    <div class="col-sm-12">
                                        <div class="pull-right text-right">
                                            <p>Tổng tiền hàng : {{ $bill->paymented }} </p>
                                            <hr>
                                            <h3><b>Khách đã trả :</b> {{ $bill->paymented }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                </div>
                                <div class="row m-v-20">
                                    <div class="col-sm-6">
                                        <img class="img-fluid text-opacity m-t--5" width="100" src="assets/images/logo/logo.png" alt="">
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <small><b>Phone:</b> (123) 456-7890</small>
                                        <br>
                                        <small>dinhmanh@gmail.com</small>
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

@endsection
