@extends('admin.layouts.master')
@section('title')
hóa đơn bàn
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
                    <h2 class="header-title">Phiếu thanh toán</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('billTable.index') }}">Phiếu thanh toán</a>
                            <span class="breadcrumb-item active">Danh mục</span>
                        </nav>
                    </div>
                </div> 
            </div>
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
                                <th>Ngày</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($bills as $value)
                            <tr>
                                <td>
                                    {{ $stt++ }}
                                </td>
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->customer->name }}</td>
                                <td>{{ $value->paymented }}</td>
                                <td class="text-center font-size-18">
                                    <a href="{{ route('billTable.show', $value->id) }}" class="text-gray m-r-15"><i class="ti-eye"></i></a>
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
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/tables/data-table.js') }}"></script>
@endsection
