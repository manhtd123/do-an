@extends('admin.layouts.master')
@section('title')
báo cáo bán hàng
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
                    <h2 class="header-title">Báo cáo bán hàng</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('admin.sell') }}">Báo cáo bán hàng</a>
                            <span class="breadcrumb-item active">Báo cáo</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="card">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-10 offset-md-4">
                    <div class="m-t-25">
                        Báo cáo doanh thu
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-3">
                    <ul class="nav nav-pills" role="tablist" id="date">
                        <li class="nav-item">
                            <input type="date" name="day" placeholder="theo ngày" class="nav-link btn btn-default btn-rounded btn-float" id="day">
                        </li>
                        <li class="nav-item">
                            <input type="month" name="day" placeholder="theo tháng" class="nav-link btn btn-default btn-rounded btn-float" id="month">
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
            url: "{{ route('getSell') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'date': value,
                'title': id
            },
            success: function(data) {
                if(data != 0){
                    $('.ct-chart').attr('id', 'stacked-bar');
                    Length = data.length;
                    var label = [];
                    var total = [];
                    for(var i=0; i<Length; i++) {
                        label[i] = data[i].date;
                        total[i] = data[i].paymented;
                    }
                    new Chartist.Bar('#stacked-bar', {
                        labels: label,
                        series: [
                            total,
                        ]
                    }, {
                        stackBars: true,
                        axisY: {
                            labelInterpolationFnc: function(value) {
                                return (value / 1000) + 'k';
                            }
                        }
                    }).on('draw', function(data) {
                        if(data.type === 'bar') {
                            data.element.attr({
                                style: 'stroke-width: 30px'
                            });
                        }
                    });
                } else {
                    $('#head-report').html("<b style = 'color:red;'>Không có doanh thu</b>");
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
            url: "{{ route('getSellByMonth') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                console.log(data);
                $('.ct-chart').attr('id', 'stacked-bar');
                    Length = data.length;
                    var label = [];
                    var total = [];
                    for(var i=0; i<Length; i++) {
                        label[i] = data[i].date;
                        total[i] = data[i].paymented;
                    }
                    new Chartist.Bar('#stacked-bar', {
                        labels: label,
                        series: [
                            total,
                        ]
                    }, {
                        stackBars: true,
                        axisY: {
                            labelInterpolationFnc: function(value) {
                                return (value / 1000) + 'k';
                            }
                        }
                    }).on('draw', function(data) {
                        if(data.type === 'bar') {
                            data.element.attr({
                                style: 'stroke-width: 30px'
                            });
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
