@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
اعدادات الحساب
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
                            <li class="breadcrumb-item active">معلومات الحساب</li>
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
                                <a href="{{ route('user_settings') }}" class="nav-link active">
                                    <i class="far fa-user"></i> <span>معلومات الحساب</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user_privacy') }}" class="nav-link">
                                    <i class="fas fa-unlock-alt"></i> <span>اعدادات الأمان</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-xl-9 col-md-8">
                    
                    <div class="card">

                        <div class="card-body">

 <form action="{{route('Account_edit')}}" method="post">
            {{ csrf_field() }}

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">الدور
                                            الوظيفي</label>
                                        <input type="text" class="form-control" id="name" name="role_name"
                                            value="{{ $user->role_name }}"readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">الاسم</label>

                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">الجنسية</label>

                                        <input type="text" class="form-control" id="name" name="nationality"
                                            value="{{ $user->Nationality->name }}"readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">رقم الهوية
                                        </label>
                                        <input type="text" class="form-control" id="name" name="ID_num"
                                            value="{{ $user->ID_num }}"readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">نوع الهوية</label>

                                        <input type="text" class="form-control" id="name" name="ID_type"
                                            value="{{ $user->ID_type }}"readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">الجنس</label>
                                        <input type="text" class="form-control" id="name" name="gender"
                                            value="{{ $user->gender }}"readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">رقم الهاتف
                                        </label>
                                        <input type="text" class="form-control" id="name" name="phone"
                                            value="{{ $user->phone }}"readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-5 col-form-label input-label">البريد
                                            الالكتروني</label>
                                        <input type="text" class="form-control" id="name" name="email"
                                            value="{{ $user->email }}"readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">العنوان</label>
                                        <input type="text" class="form-control" id="name" name="address"
                                            value="{{ $user->address }}"readonly>
                                    </div>
                                </div>

                            </form>

                        </div>
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
