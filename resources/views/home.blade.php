@extends('User.layouts.master')
@section('title')
home
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Account</h4>
                        <div class="card-toolbar">
                            <ul>
                                <li>
                                    <a class="text-gray" href="javascript:void(0)">
                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="list-inline">
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
                                </ul>
                                <div class="m-t-20">
                                    <canvas id="account-chart" class="chart" style="height: 320px"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card m-t-10">
                                    <div class="card-body p-15">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-wallet font-size-40 icon-gradient-success text-success"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">Income</p>
                                                <h2 class="font-weight-light m-b-0">$53,495</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body p-15">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-receipt font-size-40 icon-gradient-info text-info"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">Tax</p>
                                                <h2 class="font-weight-light m-b-0">$2,738</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body p-15">
                                        <div class="media">
                                            <div class="align-self-center">
                                                <i class="ti-bar-chart font-size-40 icon-gradient-primary text-primary"></i>
                                            </div>
                                            <div class="m-l-20">
                                                <p class="m-b-0">Growth</p>
                                                <h2 class="font-weight-light m-b-0 text-success">
                                                    <span>18%</span>
                                                    <i class="ti-arrow-up font-size-14"></i>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Account Summary</h4>
                        <div class="card-toolbar">
                            <ul>
                                <li>
                                    <a class="text-gray" href="javascript:void(0)">
                                        <i class="mdi mdi-dots-vertical font-size-20"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="border bottom">
                        <div class="card-body p-v-15">
                            <div class="row align-items-center">
                                <div class="col-sm">
                                    <p class="m-b-0">Balance</p>
                                    <h2 class="font-weight-light m-b-0 font-size-28">$63,495</h2>
                                </div>
                                <div class="col-sm">
                                    <div class="text-right m-t-20">
                                        <button class="btn btn-info m-b-0 m-r-5">
                                            <i class="mdi mdi-credit-card-plus font-size-16 m-r-5"></i>
                                            <span>Deposit</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled p-h-10">
                            <li class="m-b-20">
                                <h5>Statement</h5>
                            </li>
                            <li class="p-b-10 m-b-10 border bottom">
                                <span class="text-semibold text-dark font-size-15">Income</span>
                                <span class="float-right">$53,495</span>
                            </li>
                            <li class="p-b-10 m-b-10">
                                <span class="text-semibold text-dark font-size-15">Transfered</span>
                                <span class="float-right">$1,889</span>
                            </li>
                        </ul>
                        <ul class="list-unstyled p-h-10 m-t-35">
                            <li class="m-b-20">
                                <h5>Account Details</h5>
                            </li>
                            <li class="p-b-10 m-b-10 border bottom">
                                <span class="text-semibold text-dark font-size-15">Ref. Number</span>
                                <span class="float-right">P0W15323</span>
                            </li>
                            <li class="p-b-10 m-b-10">
                                <span class="text-semibold text-dark font-size-15">Status</span>
                                <span class="float-right text-semibold text-success">Actived</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JsPage')
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/bank.js') }}"></script>
@endsection
