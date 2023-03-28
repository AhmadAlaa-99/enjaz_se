@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    بيانات الموقع
@stop
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <ul class="breadcrumb">

                        </ul>
                    </div>
                    <div class="col-auto">

                    </div>
                </div>



                <div class="modal custom-modal fade bank-details" id="add_quarters" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="form-header text-start mb-0">
                                    <h4 class="mb-0">اضافة أحياء سكنية</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('add_quarters') }}" method="post"
                                enctype="multipart/form-data"autocomplete="off">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="bank-inner-details">
                                        <div class="row">
                                            <div class="invoice-add-table">
                                                <div class="table-responsive">
                                                    <table class="table table-center add-table-items">
                                                        <thead>
                                                            <tr>
                                                                <th>الاسم</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="q">
                                                            <tr class="add-row">

                                                                <td><input type="text" class="form-control"
                                                                        id="quarter_name" name="quarter_name[]"required>
                                                                </td>

                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="add_quarter"> <i
                                                                            class="fas fa-plus-circle"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="bank-details-btn">

                                        <button type="submit"href="javascript:void(0);" class="btn bank-save-btn">اضافة
                                            البيانات</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal custom-modal fade bank-details" id="add_nationals" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="form-header text-start mb-0">
                                    <h4 class="mb-0">اضافة جنسيات</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('add_nationalist') }}" method="post"
                                enctype="multipart/form-data"autocomplete="off">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="bank-inner-details">
                                        <div class="row">
                                            <div class="invoice-add-table">
                                                <div class="table-responsive">
                                                    <table class="table table-center add-table-items">
                                                        <thead>
                                                            <tr>
                                                                <th>الاسم</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="n">
                                                            <tr class="add-row">

                                                                <td><input type="text" class="form-control"
                                                                        id="national_name" name="national_name[]"required>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="add_national"> <i
                                                                            class="fas fa-plus-circle"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="bank-details-btn">

                                        <button type="submit"href="javascript:void(0);" class="btn bank-save-btn">اضافة
                                            البيانات</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-table">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">الأحياء السكنية</h5>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                            data-bs-target="#add_quarters"><i class="fas fa-plus-circle me-2"></i>اضافة
                                            احياء سكنية</a>


                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>الرقم التسلسلي</th>
                                                <th>الاسم</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                $i = 0;
                                @endphp
                                            @foreach ($quarters as $quarter)
                                             @php
                                    $i++
                                    @endphp
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>
                                                        <span class="badge bg-success-light">{{ $quarter->name }}</span>
                                                    </td>



                                                    <td class="text-end">
                                                        <a href="#edit_quarter{{ $quarter->id }}" data-bs-toggle="modal"
                                                            class="btn btn-sm btn-white text-success me-2"><i
                                                                class="far fa-edit me-1"></i>تعديل اسم الحي</a>
                                                    </td>
                                                      <div class="modal fade" id="edit_quarter{{ $quarter->id }}"
                                                    tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel"> تعديل اسم
                                                                    الحي</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('edit_quarter', $quarter->id) }}"
                                                                method="post"
                                                                enctype="multipart/form-data"autocomplete="off">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                     <div class="form-group">
                                                                            <label>اسم الحي <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text"
                                                                                name="name_quarter"class="form-control">
                                                                        </div>
                                                                    <div class="submit-section">
                                                                        <button
                                                                            class="btn btn-primary submit-btn">حفظ</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                </div>
                                </tr>
                                @endforeach


                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-table">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">الجنسيات</h5>
                                </div>
                                <div class="col-auto">
                                    <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                        data-bs-target="#add_nationals"><i class="fas fa-plus-circle me-2"></i>اضافة
                                        جنسيات</a>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>الرقم التسلسلي</th>
                                            <th>الاسم</th>
                                            <th class="text-end"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                $i = 0;
                                @endphp
                                        @foreach ($nationalities as $nationalitie)
                                         @php
                                    $i++
                                    @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>
                                                    <span class="badge bg-success-light">{{ $nationalitie->Name }}</span>
                                                </td>
                                                   <td class="text-end">
                                                        <a href="#edit_nationalitie{{ $nationalitie->id }}" data-bs-toggle="modal"
                                                            class="btn btn-sm btn-white text-success me-2"><i
                                                                class="far fa-edit me-1"></i>تعديل اسم الجنسية</a>
                                                    </td>


                                                <div class="modal fade" id="edit_nationalitie{{ $nationalitie->id }}"
                                                    tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel"> تعديل اسم
                                                                    الجنسية</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('edit_national', $nationalitie->id) }}"
                                                                method="post"
                                                                enctype="multipart/form-data"autocomplete="off">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>اسم الجنسية <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text"
                                                                            name="name_national"class="form-control">
                                                                    </div>
                                                                    <div class="submit-section">
                                                                        <button
                                                                            class="btn btn-primary submit-btn">حفظ</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal custom-modal fade bank-details" id="add_types" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="form-header text-start mb-0">
                                    <h4 class="mb-0">اضافة انواع الوحدات الايجارية</h4>
                                </div>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('add_types') }}" method="post"
                                enctype="multipart/form-data"autocomplete="off">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="bank-inner-details">
                                        <div class="row">
                                            <div class="invoice-add-table">
                                                <div class="table-responsive">
                                                    <table class="table table-center add-table-items">
                                                        <thead>
                                                            <tr>
                                                                <th>الاسم</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="t">
                                                            <tr class="add-row">

                                                                <td><input type="text" class="form-control"
                                                                        id="type_name" name="type_name[]"required>
                                                                </td>

                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="add_type"> <i
                                                                            class="fas fa-plus-circle"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="bank-details-btn">

                                        <button type="submit"href="javascript:void(0);" class="btn bank-save-btn">اضافة
                                            البيانات</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-table">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">أنواع الوحدات الايجارية</h5>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                                            data-bs-target="#add_types"><i class="fas fa-plus-circle me-2"></i>اضافة
                                            نوع</a>


                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>الرقم التسلسلي</th>
                                                <th>الاسم</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                $i = 0;
                                @endphp
                                            @foreach ($types as $type)
                                             @php
                                    $i++
                                    @endphp
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>
                                                        <span class="badge bg-success-light">{{ $type->Name }}</span>
                                                    </td>

<td class="text-end">
                                                        <a href="#edit{{ $type->id }}" data-bs-toggle="modal"
                                                            class="btn btn-sm btn-white text-success me-2"><i
                                                                class="far fa-edit me-1"></i>تعديل معرف النوع</a>
                                                    </td>



                                </div>
                                <div class="modal fade" id="edit{{ $type->id }}" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel"> تعديل النوع</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('edit_type', $type->id) }}" method="post"
                                                enctype="multipart/form-data"autocomplete="off">
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>معرف النوع <span class="text-danger">*</span></label>
                                                        <input type="text" name="name_type"class="form-control">
                                                    </div>
                                                    <div class="submit-section">
                                                        <button class="btn btn-primary submit-btn">حفظ</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </tr>
                                @endforeach


                                </tbody>
                                </table>
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


        <script type="text/javascript">
            $(document).ready(function() {
                $('#add_quarter').on('click', function() {
                    var html = '';
                    html += '<tr>';
                    html +=
                        '<td><input type="text" class="form-control" id="quarter_name" name="quarter_name[]"required ></td>';
                    html +=
                        '<td><button type="button" class="btn btn-danger" id="remove"><i class="fas fa-minus-square"></button></td>';
                    html += '</tr>';
                    $('tbody.q').append(html);
                });
            });
            $(document).on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#add_national').on('click', function() {
                    var html = '';
                    html += '<tr>';

                    html +=
                        '<td><input type="text" class="form-control" id="national_name" name="national_name[]"required ></td>';
                    html +=
                        '<td><button type="button" class="btn btn-danger" id="remove"><i class="fas fa-minus-square"></button></td>';
                    html += '</tr>';
                    $('tbody.n').append(html);
                });
            });
            $(document).on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#add_type').on('click', function() {
                    var html = '';
                    html += '<tr>';

                    html +=
                        '<td><input type="text" class="form-control" id="type_name" name="type_name[]"required ></td>';
                    html +=
                        '<td><button type="button" class="btn btn-danger" id="remove"><i class="fas fa-minus-square"></button></td>';
                    html += '</tr>';
                    $('tbody.t').append(html);
                });
            });
            $(document).on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });
        </script>





    @endsection
