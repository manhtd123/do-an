@extends('admin.layouts.master')
@section('title')
báo cáo sản phẩm
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
                    <h2 class="header-title">Báo cáo sản phẩm</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('admin.products') }}">Báo cáo sản phẩm</a>
                            <span class="breadcrumb-item active">Báo cáo</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="card">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-8 offset-md-5">
                    <div class="m-t-25">
                        Báo cáo doanh thu sản phẩm
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-4">
                    <ul class="nav nav-pills" role="tablist" id="menu">
                        <li class="nav-item">
                            <a class="nav-link btn btn-default btn-rounded btn-float active" role="tab" id="0" data-toggle="tab">Doanh số</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-default btn-rounded btn-float" role="tab" id="1" data-toggle="tab">Số lượng</a>
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
    $('#menu a').click(function(){
        var id = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: "{{ route('getProducts') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id
            },
            success: function(data) {
                if(data != 0){
                    $('.ct-chart').attr('id', 'horizontal-bar');
                    Length = data.length;
                    var label = [];
                    var total = [];
                    for(var i=0; i<Length; i++) {
                        label[i] = data[i].name;
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
                } else {
                    $('#head-report').html("<b style = 'color:red;'>Không có doanh thu :((</b>");
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
            url: "{{ route('getProductByMonth') }}",
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
                    label[i] = data[i].name;
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
