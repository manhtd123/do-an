@extends('admin.layouts.master')
@section('title')
giao dịch hàng hóa
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Nhập hàng</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('dealProduct.index') }}">Phiếu nhập hàng</a>
                    <span class="breadcrumb-item active">Tạo mới</span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="card col-md-9">
                <div class="row m-t-30">
                    <div class="col-md-6">
                        <div class="p-h-10">
                            <div class="form-group row">
                                <select class="form-control col-md-6 offset-md-9" id="product" required="">
                                    <option value="">--Chọn sản phẩm--</option>
                                    @foreach($products as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('dealProduct.store') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="table-overflow">
                    <table class="table" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%;"></th>
                                <th scope="col">Tên hàng</th>
                                <th scope="col" style="width: 20%;">Số lượng</th>
                                <th scope="col" style="width: 20%;">Đơn giá</th>
                                <th scope="col" class="text-center" style="width: 20%;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
                <div class="card col-md-3">
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <div class="p-h-12">
                                <label class="col-form-label control-label text-dark fa fa-user"></label>@if(!Auth::guard('admin')->check())
                                    {{ Auth::user()->name }}
                                @else
                                    {{ $user->name }}
                                @endif
                                <input type="text" name="user" hidden="" value="{{ $user->id }}">
                            </div>
                            <div class="p-h-12">
                                <label class="col-form-label control-label text-dark fa fa-calendar"> {{ date('Y-m-d H:i:s') }}</label>
                                <input type="text" name="date" hidden="" value="{{ date('Y-m-d H:i:s') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <div class="p-h-12">
                                <div class="form-group row">
                                    <select class="form-control col-md-6 offset-md-3" name="supplier" id="supplier" required="">
                                        <option value="">--Chọn NCC--</option>
                                        @foreach($suppliers as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <a href="{{ route('producer.create') }}" style="margin-left: 10px;"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label control-label text-dark">Tổng số lượng:</label>
                        <div class="col-sm-4">
                            <p class="form-control-plaintext" id="quantotal"></p>
                        </div>
                        <input type="text" name="quantity" hidden="" id="quantityvalue">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-8 col-form-label control-label text-dark">Tổng tiền hàng:</label>
                        <div class="col-sm-4">
                            <p class="form-control-plaintext" id="pricetotal"></p>
                        </div>
                        <input type="text" name="total" hidden="" id="totalvalue">
                    </div>
                    <div class="p-h-6">
                        <a type="reset" href="{{ route('dealProduct.index') }}" class="btn btn-default">Bỏ qua</a>
                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script>
    $("#product").change(function() {
        var value = $("#product").val();
    $.ajax({
            type: 'post',
            url: "{{ route('getProduct') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'product': value
            },
            success: function(data) {
                if($("#row"+data.id+"").length == 0){
                    var tabledata = "<tr class='item" + data.id + "' id='row" + data.id + "'>"
                        + "<td><a class='text-gray m-r-15' id='button" + data.id + "'><i class = 'fa fa-close'></i></a></td>"
                        + "<td>" + data.name + "</td>"
                        + "<td style='display:none;'><input type='text' value='"+ data.id +"' name='product_id1[]'></td>"
                        + "<td><input type='text' class='form-control quantity123' value='0' name='quantity1[]' id='quantity"+data.id+"'></td>"
                        + "<td id='unit"+data.id+"'>"+ data.purchase_price +"</td>"
                        + "<td style='display:none;'><input type='text' value='"+ data.purchase_price +"' name='unittotal[]' id='unittotal" + data.id + "'></td>"
                        + "<td><div class='text-center price123' id='item" + data.id + "'>0</div></td>"
                        + "</tr>";

                    $('#table').append(tabledata);
                    $('#quantity'+ data.id +'').change(function(){
                        if($('#quantity'+data.id+'').val() !== '') {
                            var unit = data.purchase_price;
                            var quantity = parseInt($('#quantity'+data.id+'').val());
                            var result = unit * quantity;
                            $('#item'+data.id+'').text(result);
                            $('#unittotal'+data.id+'').attr('value', result);
                            getTotalQuantity();
                            getTotalPrice();
                        } else {
                            $('#quantity'+data.id+'').val('0');
                            $('#item'+data.id+'').text('0');
                        }
                    });
                    
                    $('#button'+data.id+'').click(() => {
                        var unit = data.purchase_price;
                        var quantity = parseInt($('#quantity'+data.id+'').val());
                        var result = unit * quantity;
                        $('#row'+data.id+'').remove();
                        getTotalQuantity();
                        getTotalPrice();
                    })
                    
                } else {
                    alertSucces('Sản phẩm này bạn đã chọn', 'mdi mdi-close-circle-outline', 'danger');
                }
            },
        });
        $('#product').val('');
    });

    function getTotalQuantity(){
        var quantityId = 0;
        $('#table .quantity123').each(function(){
            quantityId += parseInt($(this).val());
            $('#quantotal').text(quantityId);
            $('#quantityvalue').attr('value', quantityId);
        });
    }

    function getTotalPrice(){
        var priceId = 0;
        $('#table .price123').each(function(){
            priceId += parseInt($(this).text());
            $('#pricetotal').text(priceId);
            $('#totalvalue').attr('value', priceId);
        });
    }

    function alertSucces(message, icon, status){
        $.notify(
        {
            icon: icon,
            message: message
        }, {
            type: status,
            timer: 1000,
            placement: {
                from: 'bottom',
                align: 'right'
            }
        });
    }
</script>
@endsection
