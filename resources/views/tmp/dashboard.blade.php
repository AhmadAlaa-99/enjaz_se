@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">


@endsection
@section('title')
الاحصائيات
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">الادارة </li>
        <li class="breadcrumb-item active"> الاحصائيات </li>
    </ol>

    <ul class="app-actions">
       <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="time">
                <span id="clock"></span>
            </a>
        </li>
    </ul>
</div>
	<!-- Content wrapper start -->
    <div class="content-wrapper">

<!-- Row starts -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="info-tiles">
                    <div class="info-icon">
                        <i class="icon-account_circle"></i>
                    </div>
                    <div class="stats-detail">
                        <h3>185k</h3>
                        <p>المنشأت السكنية</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="info-tiles">
                    <div class="info-icon">
                        <i class="icon-watch_later"></i>
                    </div>
                    <div class="stats-detail">
                        <h3>450</h3>
                        <p>الوحدات الايجارية</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="info-tiles">
                    <div class="info-icon">
                        <i class="icon-visibility"></i>
                    </div>
                    <div class="stats-detail">
                        <h3>7500</h3>
                        <p>عدد المستأجرين</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="info-tiles">
                    <div class="info-icon">
                        <i class="icon-shopping_basket"></i>
                    </div>
                    <div class="stats-detail">
                        <h3>$300k</h3>
                        <p>عدد طلبات الصيانة</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="info-tiles">
                    <div class="info-icon secondary">
                        <i class="icon-check_circle"></i>
                    </div>
                    <div class="stats-detail">
                        <h3>250</h3>
                        <p>واردات العقود</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="info-tiles">
                    <div class="info-icon secondary">
                        <i class="icon-archive"></i>
                    </div>
                    <div class="stats-detail">
                        <h3>2500</h3>
                        <p>عدد الملاك</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->

</div>
<!-- Row end -->
</div>




</div>
<!-- Content wrapper end -->
@endsection
@section('js')

    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>
@endsection
