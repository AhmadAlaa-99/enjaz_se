@extends('layouts.master')
@section('css')
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">
@endsection
@section('title')
الاعدادات - ادارة الصلاحيات
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
             <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">ادارة الصلاحيات</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a></li>
                                <li class="breadcrumb-item active">صلاحيات المستخدمين</li>
                            </ul>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">رجوع</a>
                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#"><h3>{{ $role->name }}</h3></a>
                                <ul>
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <li><h4>{{ $v->name }}</h4></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
<!-- row closed -->
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>
@endsection
