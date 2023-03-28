@extends('layouts.master')
@section('css')
    <!-- Data Tables -->
    <link href="{{ URL::asset('assets/vendor/datatables/dataTables.bs4.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/datatables/dataTables.bs4-custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/datatables/buttons.bs.css') }}" rel="stylesheet">

@endsection
@section('title')
    ادارة المستخدمين
@stop
@section('content')

    <div class="page-wrapper">
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


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mg-b-20">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                <div class="col-xs-7 col-sm-7 col-md-7">
                                    <div class="form-group">
                                        <p>اسم الصلاحية :</p>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- col -->
                                <div class="col-lg-4">
                                    <ul id="treeview1">
                                        <li><a href="#">الصلاحيات</a>
                                            <ul>
                                        </li>
                                        @foreach ($permission as $value)
                                            <label
                                                style="font-size: 16px;">{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}</label>
                                        @endforeach
                                        </li>

                                    </ul>
                                    </li>
                                    </ul>
                                </div>
                                <!-- /col -->
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-main-primary">تاكيد</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    {!! Form::close() !!}
@section('js')
    <!-- Data Tables -->
    <script src="{{ URL::asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>



    <!-- Custom Data tables -->
    <script src="{{ URL::asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/custom/fixedHeader.js') }}"></script>


    <!-- Download / CSV / Copy / Print -->
    <script src="{{ URL::asset('assets/vendor/datatables/buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/datatables/buttons.print.min.js') }}"></script>
@endsection
