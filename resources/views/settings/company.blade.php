@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
بيانات الشركة
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
                            <li class="breadcrumb-item active">معلومات الشركة</li>
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
                                <a href="{{ route('privacy_settings') }}" class="nav-link">
                                    <i class="fas fa-unlock-alt"></i> <span>اعدادات الأمان</span>
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card">

                        <div class="card-body">
 <form action="{{route('company_settings_edit')}}" method="post">
            {{ csrf_field() }}


                            <form>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="name" class="col-sm-6 col-form-label input-label">تاريخ التأسيس
                                        </label>
                                        <input type="text" class="form-control" id="name" name="date_founded"
                                            value="{{ $company->date_founded }}">
                                    </div>
                                    <div class="col-sm-9">
                                        <label for="name" class="col-sm-6 col-form-label input-label">عن الشركة</label>
                                        <textarea type="textarea" class="form-control" id="name" name="about"
                                            value="{{ $company->about }}">{{ $company->about }}</textarea>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="name" class="col-sm-3 col-form-label input-label">الرؤية
                                        </label>
                                        <textarea type="textarea" class="form-control" id="name" name="vision"placeholder="{{ $company->vision }}"
                                            value="{{ $company->vision }}">{{ $company->vision }}</textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name" class="col-sm-3 col-form-label input-label">المهمة</label>
                                        <textarea type="textarea" class="form-control" id="name" name="mission"placeholder="{{ $company->mission }}"
                                            value="{{ $company->mission }}">{{ $company->mission }}</textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-6 col-form-label input-label">البريد الالكتروني
                                        </label>
                                        <input type="textarea" class="form-control" id="name" name="contact_email"
                                            value="{{ $company->contact_email }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">عنوان
                                            الشركة</label>
                                        <textarea type="textarea" class="form-control" id="name" name="contact_address"placeholder="{{ $company->contact_address }}"
                                            value="{{ $company->contact_address }}">{{ $company->contact_address }}</textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name" class="col-sm-3 col-form-label input-label">رقم
                                            التواصل</label>
                                        <input type="textarea" class="form-control" id="name" name="contact_mobile"
                                            value="{{ $company->contact_mobile }}">
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
