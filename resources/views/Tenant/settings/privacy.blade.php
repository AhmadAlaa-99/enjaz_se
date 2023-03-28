@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
تغيير كلمة السر
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
                            <li class="breadcrumb-item active">اعدادات الأمان</li>
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
                                    <a href="{{ route('user_settings')}}">
                                        <i class="far fa-user"></i> <span>معلومات الحساب</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('user_privacy')}}" class="nav-link active">
                                        <i class="fas fa-unlock-alt"></i> <span>اعدادات الأمان</span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                          
                            <div class="card-body">
                               <form action="{{route('user_change_password')}}" method="post">
                                               {{ csrf_field() }}
                                    <div class="row form-group">
                                        <label for="current_password"
                                            class="col-sm-3 col-form-label input-label">كلمة السر الحالية</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="current_password"name="current_password"
                                                placeholder="Enter current password">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="new_password" class="col-sm-3 col-form-label input-label">كلمة السر الجديدة
                                            </label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="new_password"
                                                placeholder="Enter new password"name="new_password">
                                            <div class="progress progress-md mt-2">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 2%"
                                                    aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="confirm_password"
                                            class="col-sm-3 col-form-label input-label">تأكيد كلمة السر</label>
                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <input type="password" class="form-control" id="confirm_password"
                                                    placeholder="Confirm your new password"name="confirm_password">
                                            </div>
                                            <h5>Password requirements:</h5>
                                            <p class="mb-2">Ensure that these requirements are met:</p>
                                            <ul class="list-unstyled small">
                                                <li>Minimum 8 characters long - the more, the better</li>
                                                <li>At least one lowercase character</li>
                                                <li>At least one uppercase character</li>
                                                <li>At least one number, symbol</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
