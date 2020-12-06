@extends('admin.layouts.master')
@section('title')
giao dịch hàng hóa
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Phiếu nhập hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('dealProduct.index') }}">Phiếu nhập hàng</a>
                    <span class="breadcrumb-item active">Thông tin</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">Thông tin phiếu nhập</h4>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <p class="col-md-6">Người nhập: <b>{{ $deal->user->name }}</b></p>
                            <p class="col-md-6">Nhà cung cấp: <b>{{ $deal->supplier->name }}</b></p>    
                        </div>
                        <div class="row">
                            <p class="col-md-6">Ngày nhập: <b>{{ $deal->date }}</b></p>
                            <p class="col-md-6">Trạng thái: <span class="badge badge-gradient-success">Đã nhập hàng</span></p>
                        </div>
                    </div>
                </div>
                <div class="table-overflow">
                    <table class="table table-xl border">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên hàng</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Đơn vị</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $value)
                            <tr>
                                <td>
                                    {{ $value->product->name }}
                                </td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->product->purchase_price }}</td>
                                <td>{{ $value->product->unit }}</td>
                                <td>{{ $value->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <p>Tổng số lượng: <b>{{ $deal->quantity }}</b></p>
                    <p>Tổng tiền: <b>{{ $deal->total }}</b></p>
                    <p>Tiền đã trả NCC: <b>{{ $deal->total }}</b></p>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" onclick="myFunction()">In</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script>
function myFunction() {
  window.print();
}
</script>
@endsection
