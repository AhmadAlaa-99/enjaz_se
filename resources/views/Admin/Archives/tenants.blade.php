@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    بيانات المستأجرين
@stop
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="card invoices-tabs-card">
                    <div class="card-body card-body pt-0 pb-0">
                        <div class="invoices-main-tabs">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-md-8">
                                    <div class="invoices-tabs">
                                        <ul>
                                            <li><a href="{{ url('/' . ($page = 'Admin/tenants')) }}">بيانات المستأجرين</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/archive_tenants')) }}"
                                                    class="active">بيانات الارشيف</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="invoices-settings-btn">
                                        <a href="invoices-settings.html" class="invoices-settings-icon">
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="copy-print-csv" class="table custom-table">
                                        <thead>
                                            <tr>


                                                <th>الرقم التسلسلي </th>
                                                <th>الاسم </th>
                                                <th>الجنس </th>

                                                <th>الجنسية</th>
                                                <th>المواليد</th>
                                                <th>نوع الهوية</th>
                                                <th> رقم الهوية </th>
                                                <th> رقم الجوال </th>
                                                <th>البريد الالكتروني</th>
                                                <th> رقم الوحدة</th>

                                            </tr>
                                        </thead>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse ($tenants as $tenant)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $tenant->user->name }}</td>
                                                <td>{{ $tenant->user->gender }}</td>
                                                <td>{{ $tenant->user->Nationality->Name }}</td>
                                                <td>{{ $tenant->user->name }}</td>
                                                <td>{{ $tenant->user->name }}</td>
                                                <td>{{ $tenant->user->name }}</td>
                                                <td>{{ $tenant->user->phone }}</td>
                                                <td>{{ $tenant->user->email }}</td>
                                                <td>{{ $tenant->units->number }}</td>



                                            </tr>
                                        @empty
                                        @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $tenants->links() !!}
                                    </div>
                                </div>
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
