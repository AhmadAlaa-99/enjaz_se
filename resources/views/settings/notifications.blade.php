@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
الاشعارات
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="page-title">الاعدادات</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a>
                            </li>
                            <li class="breadcrumb-item active">الاشعارات </li>
                        </ul>
                    </div>
                </div>
            </div>
            </br> </br> </br>

            <div class="row">
                <div class="col-xl-3 col-md-4">

                    <div class="widget settings-menu">
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('account_settings') }}">
                                    <i class="far fa-user"></i> <span>معلومات الحساب</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('company_settings') }}" class="nav-link active">
                                    <i class="far fa-user"></i> <span>معلومات الشركة</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('notifications_settings') }}" class="nav-link">
                                    <i class="far fa-bell"></i> <span>الاشعارات</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacy_settings') }}" class="nav-link">
                                    <i class="fas fa-unlock-alt"></i> <span>اعدادات الأمان</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>







@endsection
