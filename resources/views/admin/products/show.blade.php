@extends('admin.layouts.master')
@section('title')
product
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h2 class="header-title">Hàng hóa</h2>
                    <div class="header-sub-title">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="{{ route('admin.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Trang chủ</a>
                            <a class="breadcrumb-item" href="{{ route('product.index') }}">Hàng hóa</a>
                            <span class="breadcrumb-item active">Hiển thị</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-v-30">
                    <div class="col-sm-3">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                
                                <div class="carousel-item active">                                
                                    <img class="d-block w-100" src="{{ asset(config('app.link_product') . $imageHead->name) }}" alt="First slide"> 
                                </div>
                                @foreach ($images as $image)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset(config('app.link_product') . $image->name) }}" alt="Second slide">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="mdi mdi-chevron-left font-size-35" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="mdi mdi-chevron-right font-size-35" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center text-sm-left">
                        <h2 class="m-b-5">{{ $product->name }}</h2>
                        <div class="form-group">
                            {{ Form::label(__('Giá mua vào :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->purchase_price }} $</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label(__('Mô tả :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->describe }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label(__('Giá bán ra :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->sale_price }} $</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label(__('Thực đơn :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->bua }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label(__('Đơn vị :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->unit }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label(__('Mô tả :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->quantity }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label(__('Thể loại :'), null, ['class' => 'control-label']) }}
                            <span>{{ $product->category->name }}</span>
                        </div>
                    </div>
                    <div class="col">
                        <p class="text-dark font-size-13"><b>Follow Me On:</b></p>
                        <ul class="list-inline">
                            <li class="m-r-15">
                                <a class="text-gray" href="#">
                                    <i class="mdi mdi-instagram font-size-25"></i>
                                </a>
                            </li>
                            <li class="m-r-15">
                                <a class="text-gray" href="#">
                                    <i class="mdi mdi-facebook font-size-25"></i>
                                </a>
                            </li>
                            <li class="m-r-15">
                                <a class="text-gray" href="#">
                                    <i class="mdi mdi-twitter font-size-25"></i>
                                </a>
                            </li>
                            <li class="m-r-15">
                                <a class="text-gray" href="#">
                                    <i class="mdi mdi-dribbble font-size-25"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-9">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success"><span class="fa fa-pencil"></span> Hàng hóa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
