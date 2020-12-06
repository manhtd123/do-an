@extends('admin.layouts.master')
@section('title')
giao dịch hàng hóa
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
                    <h2 class="header-title">Phiếu nhập hàng</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('dealProduct.index') }}">Phiếu nhập hàng</a>
                            <span class="breadcrumb-item active">Danh mục</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="text-right">
          <a href="{{ route('dealProduct.create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Nhập hàng</a>
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
                                <th>Nhà cung cấp</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach($deals as $value)
                            <tr>
                                <td>
                                    {{ $stt++ }}
                                </td>
                                <td>{{ $value->date }}</td>
                                <td>{{ $value->supplier->name }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->total }}</td>
                                <td class="text-center font-size-18">
                                    <a href="{{ route('dealProduct.show', $value->id) }}" class="text-gray m-r-15"><i class="ti-eye"></i></a>
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
