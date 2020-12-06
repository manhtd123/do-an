@extends('User.layouts.master')
@section('title')
Phòng Bàn
@endsection
@section('CssPage')
@endsection
@section('content')
<div class="main-content" style="padding-top: 50px;">
	<div class="row" style="margin-bottom: 20px;">
		<div class="col-md-6">
            <div class="m-t-25">
            </div>
            <ul class="nav nav-pills" role="tablist" id="group">
                <li class="nav-item">
                    <a class="nav-link btn btn-default btn-rounded btn-float active" role="tab" id="0" data-toggle="tab">Tất cả</a>
                </li>
                @foreach($groups as $value)
                <li class="nav-item">
                    <a class="nav-link btn btn-default btn-rounded btn-float" role="tab" id="{{ $value->id }}" data-toggle="tab">{{ $value->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
	<div class="row">
		<div class="col-md-7">
			<div class="row" id="table">
            </div>
		</div>
        <div class="col-md-5" style="margin-top: -55px;">
            <div style="background-color: white;">
                <div class="tab-primary">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Danh sách đặt bàn</a>
                        </li>
                        <li class="nav-item" id="info">
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                            <div class="table-overflow">
                                <table class="table" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Tên khách hàng</th>
                                            <th scope="col" style="width: 30%;">Giờ đến</th>
                                            <th scope="col" style="width: 20%;">bàn</th>
                                            <th scope="col" class="text-center" style="width: 20%;">Số người</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $value)
                                        <tr>
                                            <td>{{ $value->customer->name }}</td>
                                            <td>{{ $value->time }}</td>
                                            <td>{{ $value->table->name }}</td>
                                            <td class="text-center">{{ $value->people_number }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="tab-primary-2">
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
    $('#group a').click(function() {
        var value = $(this).attr('id');
        $.ajax({
            type: 'post',
            url: "{{ route('cashier.getTable') }}",
            data: {
                '_token': $('input[name=_token]').val(),
                'group_id': value,
            },
            success: function(data) {
                Length = data.length;
                for(var i=0; i<Length; i++)
                {
                    if(data[i].status == 0) {
                        var tabledata = "<div class='col-md-3'>"
                                    + "<a onclick='selectProduct(" + data[i].id + ", \"" + data[i].name + "\")' title='Bàn trống' sectionId='" + data[i].id + "'>"
                                    +    "<div class='p-30 text-center'>"
                                    +        "<img class='img-fluid w-100' src = 'http://localhost:8000/assets/562.png' style='height: 130px;'>"
                                    +        "<p class='m-b-15'>" + data[i].name + "</p>"
                                    +   "</div>"
                               + "</a>"
                               + "</div>";
                    } else {
                        var tabledata = "<div class='col-md-3'>"
                                    + "<a onclick='selectProduct(" + data[i].id + ", \"" + data[i].name + "\")' title='Bàn đang được sử dụng' sectionId='" + data[i].id + "'>"
                                    +    "<div class='p-30 text-center'>"
                                    +        "<img class='img-fluid w-100' src = 'http://localhost:8000/assets/table.jpg' style='height: 130px;'>"
                                    +        "<p class='m-b-15'>" + data[i].name + "</p>"
                                    +   "</div>"
                               + "</a>"
                               + "</div>";
                    }
                    
                    $('#table').append(tabledata);
                }
            },
            error(data) {
                console.log(data);
            }
        });
        $('#table').html('');
    });

    function selectProduct(id, name) {
            $('#info').html('<a href="#tab-primary-2" class="nav-link" role="tab" data-toggle="tab">Thông tin ' + name + '</a>');
    }

    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: "{{ route('cashier.tablePage') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                Length = data.length;
                for(var i=0; i<Length; i++)
                {
                    if(data[i].status == 0) {
                        var tabledata = "<div class='col-md-3'>"
                                    + "<a onclick='selectProduct(" + data[i].id + ", \"" + data[i].name + "\")' title='Bàn trống' sectionId='" + data[i].id + "'>"
                                    +    "<div class='p-30 text-center'>"
                                    +        "<img class='img-fluid w-100' src = 'http://localhost:8000/assets/562.png' style='height: 130px;'>"
                                    +        "<p class='m-b-15'>" + data[i].name + "</p>"
                                    +   "</div>"
                               + "</a>"
                               + "</div>";
                    } else {
                        var tabledata = "<div class='col-md-3'>"
                                    + "<a onclick='selectProduct(" + data[i].id + ", \"" + data[i].name + "\")' title='Bàn đang được sử dụng' sectionId='" + data[i].id + "'>"
                                    +    "<div class='p-30 text-center'>"
                                    +        "<img class='img-fluid w-100' src = 'http://localhost:8000/assets/table.jpg' style='height: 130px;'>"
                                    +        "<p class='m-b-15'>" + data[i].name + "</p>"
                                    +   "</div>"
                               + "</a>"
                               + "</div>";
                    }
                    
                    $('#table').append(tabledata);
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
