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
                            <span class="breadcrumb-item active">Chỉnh sửa</span>
                        </nav>
                    </div>
                </div> 
            </div>
        </div>
        <div class="container">
            <div class="well well bs-component">
                <div class="card">
                    <div class="p-20">
                        <h4 class="card-title m-b-0">Chỉnh sửa sản phẩm <b>"{{ $product->name }}"</b></h4>
                    </div>
                    <div class="tab-primary">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Thông tin</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-primary-2" class="nav-link" role="tab" data-toggle="tab">Hình ảnh</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                                <div class="card-header border bottom">
                                    <h4 class="card-title">Cập nhật hàng hóa</h4>
                                </div>
                                <form method="POST" action="{{ route('product.update', $product->id) }}" enctype = "multipart/form-data">
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="card-body">
                                        <div class="row m-t-30">
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Tên hàng</label>
                                                        <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                                                    </div>
                                                </div>
                                                @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->get('name') as $name)
                                                            <li>{{ $name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Thực đơn</label>
                                                        <select class="form-control" name="thucdon">
                                                            <option value="sáng" @if ("sáng" == old('thucdon', $product->bua)) selected="selected" @endif>Bữa sáng</option>
                                                            <option value="trưa" @if ("trưa" == old('thucdon', $product->bua)) selected="selected" @endif>Bữa trưa</option>
                                                            <option value="tối" @if ("tối" == old('thucdon', $product->bua)) selected="selected" @endif>Bữa tối</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Giá mua vào</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="purchase_price" value="{{ $product->purchase_price }}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Giá bán ra</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">$</span>
                                                            </div>
                                                            <input type="text" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Chủng loại</label>
                                                        <select class="form-control" name="categories">
                                                            @foreach($categories as $value)
                                                            <option value="{{ $value->id }}" @if(in_array($product->category_id, $selectedCategory)) selected="selected" @endif>{{ $value->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Số lượng</label>
                                                        <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Đơn vị</label>
                                                        <input type="text" class="form-control" placeholder="cái, thùng, ..." name="unit" value="{{ $product->unit }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Mô tả</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="describe">{{ $product->describe }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <div class="form-group">
                                                        <label class="control-label">Ảnh</label>
                                                        <div class="input-group control-group increment" >
                                                            <input type="file" name="image[]" class="form-control">
                                                            <div class="input-group-btn"> 
                                                                <button class="btn btn-success img-button" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                            </div>
                                                        </div>
                                                        <div class="clone hide">
                                                            <div class="control-group input-group" style="margin-top:10px">
                                                                <input type="file" name="image[]" class="form-control">
                                                                <div class="input-group-btn"> 
                                                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-md-6">
                                                <div class="p-h-10">
                                                    <button type="reset" class="btn btn-default">Bỏ qua</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Lưu</button> 
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </form>  
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab-primary-2">
                                <div class="p-h-15 p-v-20">
                                    <div class="row">
                                        @foreach($images as $value)
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header border bottom">
                                                    <h4 class="card-title"><img class="d-block w-100" src="{{ asset(config('app.link_product') . $value->name) }}" alt="Second slide"></h4>
                                                    <div class="card-toolbar">
                                                        <ul>
                                                            <li>
                                                                <form action="{{ route('admin.image',$value->id) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button class="text-gray"><i class="mdi mdi-close font-size-20"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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
    $(document).ready(function() {
        $(".img-button").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection
