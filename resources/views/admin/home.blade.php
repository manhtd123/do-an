@extends('admin.layouts.master')
@section('title')
home
@endsection
@section('CssPage')
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-js/dist/chartist.min.css') }}" />
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">KẾT QUẢ BÁN HÀNG HÔM NAY</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-body ">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-money font-size-40 text-success"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">{{ $bill_detail_count[0]->count }} đơn đã xong</p>
                                                <h2 class="m-b-0">{{ $bill_detail_count[0]->sum }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-md-4 border left">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-write font-size-40 text-info"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">{{ $bill_count[0]->count }} đơn đang phục vụ</p>
                                                <h2 class="m-b-0">{{ $bill_count[0]->sum }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-4 border left">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-user font-size-40 text-primary"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">Khách hàng</p>
                                                <h2 class="m-b-0">
                                                    <span>{{ $customer_count }}</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doanh số hôm nay</h4>
                        <div class="card-toolbar">
                            <div class="dropdown">
                                <a class="dropdown-toggle"  data-toggle="dropdown">
                                    <i class="mdi mdi-dots-vertical font-size-20"></i>
                                </a>
                                <div class="dropdown-menu" id="price">
                                    <a class="dropdown-item" id="0">Hôm nay</a>
                                    <a class="dropdown-item" id="1">Tháng này</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <ul class="list-inline">
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">Today</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">7 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">14 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray active">1 Month</a>
                                    </li>
                                </ul> -->
                                <div class="m-t-20">
                                    <div class="ct-chart price"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">TOP 10 HÀNG HÓA BÁN CHẠY THÁNG NÀY</h4>
                        <div class="card-toolbar">
                            <div class="dropdown">
                                <a class="dropdown-toggle"  data-toggle="dropdown">
                                    <i class="mdi mdi-dots-vertical font-size-20"></i>
                                </a>
                                <div class="dropdown-menu" id="product">
                                    <a class="dropdown-item" id="0">Theo doanh thu</a>
                                    <a class="dropdown-item" id="1">Theo số lượng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <ul class="list-inline">
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">Today</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">7 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray">14 days</a>
                                    </li>
                                    <li class="m-r-20">
                                        <a href="#" class="text-semibold text-gray active">1 Month</a>
                                    </li>
                                </ul> -->
                                <div class="m-t-20">
                                    <div class="ct-chart product"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Các hoạt động gần đây</h5>
                    </div>
                    <ul class="list-media">
                        <li class="list-item border bottom">
                            <a href="javascript:void(0);" class="media-hover p-20">
                                <div class="media-img">
                                    <div class="icon-avatar bg-gradient-success">
                                        <i class="mdi mdi-file-outline"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="title">New Attachment</span>
                                    <span class="sub-title">3 files has updated</span>
                                    <span class="font-size-11 p-t-5">5 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-item border bottom">
                            <a href="javascript:void(0);" class="media-hover p-20">
                                <div class="media-img">
                                    <div class="icon-avatar bg-gradient-success">
                                        <i class="mdi mdi-file-outline"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="title">New Attachment</span>
                                    <span class="sub-title">3 files has updated</span>
                                    <span class="font-size-11 p-t-5">5 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-item border bottom">
                            <a href="javascript:void(0);" class="media-hover p-20">
                                <div class="media-img">
                                    <div class="icon-avatar bg-gradient-success">
                                        <i class="mdi mdi-file-outline"></i>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="title">New Attachment</span>
                                    <span class="sub-title">3 files has updated</span>
                                    <span class="font-size-11 p-t-5">5 days ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/charts/chartist.js') }}"></script>
<script type="text/javascript">
    $('#product a').click(function(){
        id = $(this).attr('id');
        console.log(id);
        $.ajax({
            type: 'post',
            url: "{{ route('home.product') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': id
            },
            success: function(data) {
                console.log(data);
                if(data != 0){
                    $('.product').attr('id', 'horizontal-bar');
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

    $(document).ready(function() {
        $.ajax({
            type: 'get',
            url: "{{ route('home.getProductByMonth') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                $('.product').attr('id', 'horizontal-bar');
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

        $.ajax({
            type: 'get',
            url: "{{ route('home.revenueByDay') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                $('.price').attr('id', 'stacked-bar');
                var currentdate = new Date(); 
                var datetime = currentdate.getDate() + "/"
                            + (currentdate.getMonth()+1)  + "/" 
                            + currentdate.getFullYear();
                Length = data.length;
                var label = [];
                var total = [];
                label[0] = datetime;
                total[0] = data;
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
