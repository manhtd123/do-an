@extends('User.layouts.master')
@section('title')
Nhà bếp
@endsection
@section('CssPage')
@endsection
@section('content')
<div class="main-content" style="padding-top: 75px;">
	<div class="row">
		<div class="col-md-6" style="background-color: white;">
			<div class="m-b-30">
                <ul class="list-media">
                    <li class="list-item">
                        <div class="media-img">
                            <div class="icon-avatar bg-gradient-success">
                                <span class="fa fa-bell-o"></span>
                            </div>
                        </div>
                        <div class="info">
                            <b class="title font-size-16">Chờ chế biến</b>
                            <span class="sub-title">{{ Auth::user()->name }}</span>
                        </div>
                        <hr>
                    </li>
                </ul> 
            </div>
            <ul class="list-media">
                @foreach($products as $value)
                <li class="list-item" id="item-product{{ $value->id }}">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="info" style="padding-left: 0px;">
                                <b class="title font-size-16">{{ $value->nameproduct }}</b>
                                <span class="sub-title">{{ $value->updated_at }} - Bởi {{ $value->nameuser }}</span>
                            </div>
                        </div>
                        <div class="col-md-1" id="quantity{{ $value->id }}">
                            {{ $value->quantity }}
                        </div>
                        <div class="col-md-3">
                            <div class="info">
                                <b class="title font-size-16">{{ $value->nametable }}</b>
                                <span class="sub-title">
                                    @if ($currentTime->diffInHours($value->updated_at) == 0 && $currentTime->diffInDays($value->updated_at) == 0)
                                    {{ $currentTime->diffInMinutes($value->updated_at) }} phút trước
                                    @elseif( $currentTime->diffInDays($value->updated_at) == 0 && $currentTime->diffInHours($value->updated_at) != 0)
                                    {{ $currentTime->diffInHours($value->updated_at) }} giờ trước
                                    @else
                                    {{ $currentTime->diffInDays($value->updated_at) }} ngày trước
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-default" title="Chế biến xong một" onclick ="add( {{ $value->id }}, '{{ $value->nameproduct }}', '{{ $value->nametable }}', '{{ Auth::user()->name }}', {{ $value->quantity }})" id="add-one">></button>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-danger" title="Chế biến xong tất cả" onclick ="addAll({{ $value->id }}, '{{ $value->nameproduct }}', '{{ $value->nametable }}', '{{ Auth::user()->name }}', {{ $value->quantity }})" id="add-all">>></button>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul> 
		</div>
        <div class="col-md-6" style="background-color: #FFFFCC;">
            <div class="m-b-30">
                <ul class="list-media">
                    <li class="list-item">
                        <div class="media-img">
                            <div class="icon-avatar bg-gradient-success">
                                <span class="fa fa-bell"></span>
                            </div>
                        </div>
                        <div class="info">
                            <b class="title font-size-16">Đã xong/Chờ cung ứng</b>
                            <span class="sub-title">{{ Auth::user()->name }}</span>
                        </div>
                        <hr>
                    </li>
                </ul> 
            </div>
            <ul class="list-media" id="pass-product">
                
            </ul> 
        </div>
	</div>
</div>
@endsection
@section('JsPage')
<script type="text/javascript">
    function add(id, nameproduct, nametable, user, quant){
        var quantity = $('#quantity' + id + '').text();
        var dNow = new Date();
        var time = dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':' + dNow.getSeconds();
        if (quantity == 0) {
            $('#item-product' + id + '').remove();
        } 
        else {
            quantity = quantity-1;
            $('#quantity' + id + '').text(quantity);
            if($("#done-product"+id+"").length == 0){
                var realQuantity = 1;
                $('#pass-product').append('<li class="list-item" id= "done-product' + id + '">'
                        +'<div class="row">'
                        +'<div class="col-md-6">'
                        +'<div class="info" style="padding-left: 0px;">'
                        +'<b class="title font-size-16">'+ nameproduct +'</b>'
                        +'<span class="sub-title">'+ time +' - Bởi '+ user +'</span>'
                        +'</div>'
                        +'</div>'
                        +'<div class="col-md-1" id="real-quantity'+ id +'">'
                        +  realQuantity
                        + '</div>'
                        + '<div class="col-md-3">'
                        +   '<div class="info">'
                        +       '<b class="title font-size-16">'+ nametable +'</b>'
                        +       '<span class="sub-title">Vừa xong</span>'
                        +   '</div>'
                        +'</div>'
                        +'<div class="col-md-2">'
                        + '<button class="btn btn-success" onclick= "updateAll('+ id +')" title="Cung ứng">>></button>'
                        +'</div>'
                        +'</div>'
                        +'</li>');
            } else {
                var quant = quant;
                if(quantity == 0){
                    $("#real-quantity"+id+"").text(quant);
                } else {
                    var realQuantity = quant - quantity;
                    $("#real-quantity"+id+"").text(realQuantity);
                }
            }
        }
    }

    function addAll(id, nameproduct, nametable, user, quant){
        $('#item-product' + id + '').remove();
        var quantity = $('#quantity' + id + '').text();
        var dNow = new Date();
        var time = dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':' + dNow.getSeconds();
        if($("#done-product"+id+"").length == 0){
            $('#pass-product').append('<li class="list-item" id= "done-product' + id + '">'
                        +'<div class="row">'
                        +'<div class="col-md-6">'
                        +'<div class="info" style="padding-left: 0px;">'
                        +'<b class="title font-size-16">'+ nameproduct +'</b>'
                        +'<span class="sub-title">'+ time +' - Bởi '+ user +'</span>'
                        +'</div>'
                        +'</div>'
                        +'<div class="col-md-1" id="real-quantity'+ id +'">'
                        +  quant
                        + '</div>'
                        + '<div class="col-md-3">'
                        +   '<div class="info">'
                        +       '<b class="title font-size-16">'+ nametable +'</b>'
                        +       '<span class="sub-title">Vừa xong</span>'
                        +   '</div>'
                        +'</div>'
                        +'<div class="col-md-2">'
                        + '<button class="btn btn-success" onclick= "updateAll('+ id +')" title="Cung ứng">>></button>'
                        +'</div>'
                        +'</div>'
                        +'</li>');
        } else {
            $("#real-quantity"+id+"").text(quant);
        }
    }

    function updateAll(id){
        var quantity = $("#real-quantity"+id+"").text();
        console.log(id);
        $.ajax({
            type: 'post',
            url: "{{ route('chief.postQuantity') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id,
                'quantity': quantity
            },
            success: (data) => {
                    alertSucces('Đã cung ứng', 'mdi mdi-check-circle-outline', 'success');
                    $('#done-product' + id + '').remove();
            },
            error(data) {
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
</script>
@endsection
