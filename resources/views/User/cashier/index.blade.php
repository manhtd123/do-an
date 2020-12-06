@extends('User.layouts.master')
@section('title')
Menu
@endsection
@section('CssPage')
@endsection
@section('content')
<div class="main-content" style="padding-top: 50px;">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-6">
            <div class="m-t-25">
            </div>
            <ul class="nav nav-pills" role="tablist" id="category">
                <li class="nav-item">
                    <a class="nav-link btn btn-default btn-rounded btn-float active" role="tab" id="0" data-toggle="tab">Tất cả</a>
                </li>
                @foreach($categories as $value)
                <li class="nav-item">
                    <a class="nav-link btn btn-default btn-rounded btn-float" role="tab" id="{{ $value->id }}" data-toggle="tab">{{ $value->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
	<div class="row">
		<div class="col-md-7">
			<div class="row" id="product">
            </div>
		</div>
		<div class="col-md-5" style="margin-top: -55px;">
			<div style="background-color: white;">
                <div class="tab-primary">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Hóa đơn</a>
                        </li>
                        <li class="nav-item" id="information">
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                            <div class="row" style="padding-top: 10px;">
                                <div class="col-md-4" style="margin-left: 10px;">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-table"></i></span>
                                            </div>
                                            <select class="form-control" name="table" id="table-book" required="">
                                                <option value="">--Chọn bàn--</option>
                                                @foreach($bookings as $value)
                                                <option value="{{ $value->id }}"  id="tables{{ $value->id }}">{{ $value->table->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" readonly="" name="customer" id="customer">
                                            <input type="text" class="form-control form-control-sm" hidden ="" name="customer" id="customer_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="width: 80px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                            </div>
                                            <input type="text" class="form-control form-control-sm" readonly="" id="people-number">
                                        </div>
                                    </div>
                                </div>  
                            </div>
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
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <i class="fa fa-user" id="user_id"> {{ Auth::user()->name }}</i>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <i class="fa fa-calculator"> Tổng tiền:</i><i id="pricetotal"></i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fa fa-calculator"> Giờ đến:</i><i id="time"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3  offset-md-5">
                                    <button class="btn btn-gradient-success" id="payment">Thông báo</button>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in content-table" id="tab-primary-2">
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('JsPage')
<script type="text/javascript">
    $('#category a').click(function() {
        var value = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: "{{ route('getMenu') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'category': value,
            },
            success: (data) => {
                Length = data.length;
                for(var i=0; i<Length; i++)
                {
                    var productdata = "<div class='col-md-3'>"
                    + "<a onclick='selectProduct(" + data[i].id + ", \"" + data[i].name + "\", " + data[i].sale_price + ")' title='" + data[i].name +  "số lượng: " + data[i].quantity + "' sectionId='" + data[i].id + "'>"
                           + "<div class='card'>"
                            +    "<div class='p-30 text-center'>"
                            +        "<img class='img-fluid w-100' src = 'http://localhost:8000/assets/images/products/" + data[i].img + "' style='height: 130px;'>"
                            +        "<p class='m-b-15'>" + data[i].name + "</p>"
                            +       " <p class='fa fa-money text-success p-r-5'>" + data[i].sale_price +"</p>"
                            +   "</div>"
                           + "</div>"
                       + "</a>"
                       + "</div>"
                    $('#product').append(productdata);
                }
            },
            error(data) {
                console.log(data);
            }
        });
        $('#product').html('');
    });

    function selectProduct(id, name, saleprice) {
                if($("#row"+id+"").length == 0){

        var tabledata = "<tr class='item" + id + "' id='row" + id + "'>"
            + "<td><a class='text-gray m-r-15' id='button" + id + "'><i class = 'fa fa-close'></i></a></td>"
            + "<td role='name'>" + name + "</td>"
            + "<td style='display:none;'><input type='text' class = 'product123' value='"+ id +"' name='product_id1[]'></td>"
            + "<td><input type='text' class='form-control quantity123' value='0' name='quantity1[]' role='quantity1' id='quantity"+id+"'></td>"
            + "<td id='unit"+id+"'>"+ saleprice +"</td>"
            + "<td style='display:none;'><input type='text' value='"+ saleprice +"' name='unittotal[]' id='unittotal" + id + "'></td>"
            + "<td><div class='text-center price123' id='item" + id + "'>0</div></td>"
            + "</tr>";

        $('#table').append(tabledata);
        $('#quantity'+ id +'').change(function(){
            if($('#quantity'+id+'').val() !== '') {
                var unit = saleprice;
                var quantity = parseInt($('#quantity'+id+'').val());
                var result = unit * quantity;
                $('#item'+id+'').text(result);
                $('#unittotal'+id+'').attr('value', result);
                getTotalQuantity();
                getTotalPrice();
            } else {
                $('#quantity'+id+'').val('0');
                $('#item'+id+'').text('0');
            }
        });
        
        $('#button'+id+'').click(() => {
            var unit = saleprice;
            var quantity = parseInt($('#quantity'+id+'').val());
            var result = unit * quantity;
            $('#row'+id+'').remove();
            getTotalQuantity();
            getTotalPrice();
        })
    } else {
            alertSucces('Sản phẩm này bạn đã chọn', 'mdi mdi-close-circle-outline', 'danger');
        }
    }

    $('#payment').click(function(){
        if($('input[role=quantity1]').val() == 0) {
            alertSucces('Bạn chưa nhập số lượng', 'mdi mdi-close-circle-outline', 'danger');
        } else {
            bill();
        }
    });

    function bill() {
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
        var customer_id = $('#customer_id').val();
        var booking_id = $('#table-book').val();
        var paymented = $('#pricetotal').html();
        var count = 0;
        $('#table .quantity123').each(function(){
            count += 1;
        });
        var quantityunit = [];
        $('#table .quantity123').each(function(){
           quantityunit.push($(this).val());
        });
        var unittotal = [];
        $('#table .price123').each(function(){
           unittotal.push($(this).html());
        });
        var productid = [];
        $('#table .product123').each(function(){
           productid.push($(this).val());
        });
        
        $.ajax({
            type: 'post',
            url: "{{ route('menu.store') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'date': localdate,
                'customer_id': customer_id,
                'booking_id': booking_id,
                'paymented': paymented,
                'count': count,
                'quantityunit': quantityunit,
                'unittotal': unittotal,
                'product_id': productid
            },
            success: function() {
                alertSucces('Đã thông báo cho nhà bếp thành công', 'mdi mdi-check-circle-outline', 'success');
            },
            error(data) {
                alertSucces('Thông báo thất bại', 'mdi mdi-close-circle-outline', 'danger');
                console.log(data);
            }
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

    $('#table-book').change(function() {
        var value = $("#table-book").val();
        $.ajax({
            type: 'post',
            url: "{{ route('getTable') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'book': value
            },
            success: function(data) {
                Length = data.length;
                $('#customer').attr('value', data[0].name);
                $('#customer_id').attr('value', data[0].customer_id);
                $('#people-number').attr('value', data[0].people_number);
                $('#time').text(data[0].time);
                var tabledata = "<div class='table-overflow'>"
                                +"<table class='table' id='tabledetail'>"
                                +    "<thead class='thead-light'>"
                                +        "<tr>"
                                // +            "<th style='width: 5%;''></th>"
                                +            "<th scope='col'>Tên hàng</th>"
                                +            "<th scope='col' style='width: 20%;'>Số lượng</th>"
                                +            "<th scope='col' style='width: 20%;'>Đơn giá</th>"
                                +            "<th scope='col' class='text-center' style='width: 20%;'>Thành tiền</th>"
                                +        "</tr>"
                                +    "</thead>"
                                +    "<tbody>"
                                +    "</tbody>"
                                +"</table>"
                                +"</div>"
                                +"<div class='row'>"
                                +    "<div class='col-md-5 offset-md-3'>"
                                +"<div class='form-group'>"
                                +        "<i class='fa fa-calculator' onclick='totalProduct()'> Tổng tiền:</i><i id='pricetotaldetail'></i>"
                                +    "</div>"
                                +    "</div>"
                                + "</div>"    
                                +"<div class='row'>"
                                +    "<div class='col-md-3 offset-md-5'>"
                                +        "<button class='btn btn-gradient-warning' onclick= 'updatePayment("+ data[0].booking_id +")'>Thanh toán</button>"
                                +    "</div>"
                                +"</div>";
                $('#information').html('<a href="#tab-primary-2" onclick= "getDetailBill(' + data[0].customer_id + ', ' + data[0].booking_id + ')" class="nav-link" role="tab" data-toggle="tab">Thông tin bàn</a>');
                $('.content-table').append(tabledata);
            },
            error(data) {
            }
        });
        $('#table tbody').html('');
        $('.content-table').html('');
    });

    function updatePayment(booking_id){
        var bookid = booking_id;
        $.ajax({
            type: 'post',
            url: "{{ route('cashier.payment') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'bookid': bookid
            },
            success: function(data) {
                alertSucces('Đã thanh toán thành công', 'mdi mdi-check-circle-outline', 'success');
            },
            error(data) {
                console.log(data);
                alertSucces('Thông toán thất bại', 'mdi mdi-close-circle-outline', 'danger');
            }
        });
        $('#tables'+ booking_id +'').remove();
    }

    function getDetailBill(cusid, bookid){
        $.ajax({
            type: 'post',
            url: "{{ route('getDetailBill') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'customer_id': cusid,
                'booking_id': bookid
            },
            success: function(data) {
                Length = data.length;
                for(var i=0; i<Length-1; i++){
                    for(var j=i+1; j<Length; j++){
                        if(data[i].nameproduct == data[j].nameproduct){
                            data[i].quantityunit += data[j].quantityunit;
                            data[i].totalunit += data[j].totalunit;
                            var index = j;
                            for (var k = index +1; k<Length; k++){
                                data[k-1] = data[k];
                            }
                            Length--;
                        }
                    }
                }

                for(var i=0; i<Length; i++) {
                    var tabledata = "<tr class='item" + data[i].proid + "' id='row" + data[i].proid + "'>"
                        // + "<td><a class='text-gray m-r-15' onclick='deleteProduct(" + data[i].proid + ")' id='button" + data[i].proid + "'><i class = 'fa fa-close'></i></a></td>"
                        + "<td role='name'>" + data[i].nameproduct + "</td>"
                        + "<td style='display:none;'><input type='text' class = 'product123' value='"+ data[i].proid +"' name='product_id1[]'></td>"
                        + "<td class= 'text-center'>" + data[i].quantityunit + "</td>"
                        + "<td class= 'text-center' id='unit"+data[i].proid+"'>"+ data[i].saleprice +"</td>"
                        + "<td style='display:none;'><input type='text' value='"+ data[i].saleprice +"' name='unittotal[]' id='unittotal" + data.proid + "'></td>"
                        + "<td><div class='text-center price12' id='item" + data[i].proid + "'>"+ data[i].totalunit +"</div></td>"
                        + "</tr>";
                    $('#tabledetail').append(tabledata);
                }
            },
            error(data) {
                console.log(data);
            }
        });
        $('#tabledetail tbody').html('');
    }

    // function deleteProduct(id) {
    //     $('#row'+id+'').remove();
    // }

    function totalProduct() {
        var priceId = 0;
        $('#tabledetail .price12').each(function(){
            priceId += parseInt($(this).text());
            $('#pricetotaldetail').text(priceId);
        });
        getTotalQuantity();
        getTotalPrice();
    }

    function getTotalQuantity(){
        var quantityId = 0;
        $('#table .quantity123').each(function(){
            quantityId += parseInt($(this).val());
            $('#quantotal').text(quantityId);
        });
    }

    function getTotalPrice(){
        var priceId = 0;
        $('#table .price123').each(function(){
            priceId += parseInt($(this).text());
            $('#pricetotal').text(priceId);
        });
    }
    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: "{{ route('cashier.menuPage') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                Length = data.length;
                for(var i=0; i<Length; i++)
                {
                    var productdata = "<div class='col-md-3'>"
                    + "<a onclick='selectProduct(" + data[i].id + ", \"" + data[i].name + "\", " + data[i].sale_price + ")' title='" + data[i].name +  "số lượng: " + data[i].quantity + "' sectionId='" + data[i].id + "'>"
                           + "<div class='card'>"
                            +    "<div class='p-30 text-center'>"
                            +        "<img class='img-fluid w-100' src = 'http://localhost:8000/assets/images/products/" + data[i].img + "' style='height: 130px;'>"
                            +        "<p class='m-b-15'>" + data[i].name + "</p>"
                            +       " <p class='fa fa-money text-success p-r-5'>" + data[i].sale_price +"</p>"
                            +   "</div>"
                           + "</div>"
                       + "</a>"
                       + "</div>"
                    $('#product').append(productdata);
                }
            },
            error(data) {
                console.log(data);
                alertSucces('Thông toán thất bại', 'mdi mdi-close-circle-outline', 'danger');
            }
        });
    });
</script>
@endsection
