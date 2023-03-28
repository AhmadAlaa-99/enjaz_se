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
                        <h3 class="page-title">ادارة المستخدمين</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">قائمة المستخدمين</li>
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
                                                <th class="wd-10p border-bottom-0">#</th>
                                                <th class="wd-15p border-bottom-0">اسم المستخدم</th>
                                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
                                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $user)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td><span class="badge badge-success">{{ $user->name }}</td>
                                                    <td><span class="badge badge-danger">{{ $user->email }}</td>


                                                    <td>
                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                                <label
                                                                    class="badge badge-success">{{ $v }}</label>
                                                            @endforeach
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

                    <!-- Modal effects -->
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف المستخدم</h6><button aria-label="Close" class="close"
                                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('users.destroy', 'test') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="user_id" id="user_id" value="">
                                        <input class="form-control" name="username" id="username" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
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
