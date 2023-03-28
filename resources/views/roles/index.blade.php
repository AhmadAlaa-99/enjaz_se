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


                <!-- row opened -->
                <div class="row row-sm">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <div class="col-lg-12 margin-tb">

                                    </div>
                                    <br>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $key => $role)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td><span class="badge badge-danger">{{ $role->name }}</td>
                                                    <td>

                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('roles.show', $role->id) }}">عرض</a>



                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('roles.edit', $role->id) }}">تعديل</a>


                                                        @if ($role->name !== 'owner')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                                            {!! Form::close() !!}
                                                        @endif


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                </div>
            </div>
        </div>

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
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
