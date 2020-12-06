@extends('admin.layouts.master')
@section('title')
báo cáo khách hàng
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-js/dist/chartist.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2 class="header-title">Báo cáo khách hàng</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('admin.customers') }}">Báo cáo khách hàng</a>
                            <span class="breadcrumb-item active">Báo cáo</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="card">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-8 offset-md-4">
                    <div class="m-t-25">
                        Top khách hàng mua hàng nhiều nhất
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-4">
                    <ul class="nav nav-pills" role="tablist" id="date">
                        <li class="nav-item">
                            <input type="month" name="day" class="nav-link btn btn-default btn-rounded btn-float" id="month">
                        </li>
                    </ul>
                </div>
            </div>
            <h4 class="text-center" id="head-report"></h4>
            <div class="ct-chart" ></div>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/chartist-js/dist/chartist.min.js') }}"></script>
<script type="text/javascript">
    $('#date input').change(function(){
        var value = $(this).val();
        var id = $(this).attr('id');
        console.log(value);
        $.ajax({
            type: 'post',
            url: "{{ route('getCustomersByMonth') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'date': value
            },
            success: function(data) {
                if(data != 0){
                    $('.ct-chart').attr('id', 'horizontal-bar');
                    Length = data.length;
                    var label = [];
                    var total = [];
                    for(var i=0; i<Length; i++) {
                        label[i] = data[i].namecustomer;
                        total[i] = data[i].sum;
                    }
                    new Chartist.Bar('#horizontal-bar', {
                        labels: label,
                        series: [
                            total,
                        ]
                    }, {
                        seriesBarDistance: 10,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });
                    $('#head-report').html('');
                } else {
                    $('#head-report').html("<b style = 'color:red;'>Chưa có thống kê</b>");
                    $('.ct-chart').html('');
                }
            },
            error(data) {
                console.log(data);
            }
        });
    });
    $( document ).ready(function() {
        $.ajax({
            type: 'get',
            url: "{{ route('getCustomers') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                console.log(data);
                $('.ct-chart').attr('id', 'horizontal-bar');
                Length = data.length;
                var label = [];
                var total = [];
                for(var i=0; i<Length; i++) {
                    label[i] = data[i].namecustomer;
                    total[i] = data[i].sum;
                }
                new Chartist.Bar('#horizontal-bar', {
                    labels: label,
                    series: [
                        total,
                    ]
                }, {
                    seriesBarDistance: 10,
                    reverseData: true,
                    horizontalBars: true,
                    axisY: {
                        offset: 70
                    }
                });
            },
            error(data) {
                console.log(data);
            }
        });
    });
</script>
@endsection
