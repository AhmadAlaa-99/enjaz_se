@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    تقارير تسليم العقود
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
                                            <li><a href="{{ url('/' . ($page = 'Admin/effictive')) }}">العقود الجارية</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/finished')) }}">العقود المنتهية</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/receives_reports')) }}"
                                                    class="active">تقارير التسليم</a></li>

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
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-4">
                                        <i class="far fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">العقود الجارية</div>
                                        <div class="dash-counts">
                                            <p>{{ $effictive }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ route('contract_effictive') }}"> حركة التأجير</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-3">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title"> العقود المنتهية</div>
                                        <div class="dash-counts">
                                            <p>{{ $finished }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ url('/' . ($page = 'Admin/effictive')) }}"> حركة التأجير </a></p>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-2">
                                        <i class="fas fa-home"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">تقارير التسليم</div>
                                        <div class="dash-counts">
                                            <p>{{ $rec_account }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ url('/' . ($page = 'Admin/realties')) }}">حركة التأجير</a></p>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-5">
                                        <i class="fas fa-dollar-sign"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">مدفوعات العقود</div>
                                        <div class="dash-counts">
                                            <p>{{ $leases_payments }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ url('/' . ($page = 'Admin/proceeds')) }}">للمزيد انتقل الى السجل
                                        المالي</a>
                                </p>
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
                                                <th>الرقم التسلسلي </a></th>
                                                <th>رقم الوحدة </a></th>
                                                <th>رقم العقد</a> </th>
                                                <th>تاريخ الاستلام</th>
                                                <th> تصفية الفواتير </th>


                                                <th>حالة الوحدة ( الصيانة)</th>
                                                <th>ملاحظات</th>

                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($receives as $receive)
                                                @php
                                                    $i++;
                                                @endphp

                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><span class="badge badge-danger">{{ $receive->lease->reco_number }}
                                                    </td>
                                                    <td><span class="badge badge-danger">{{ $receive->unit->number }}</td>
                                                    <td><span class="badge badge-success">{{ $receive->receive_date }}</td>
                                                    <td><span class="badge badge-success">{{ $receive->paymennts_status }}
                                                    </td>
                                                    <td><span class="badge badge-primary">{{ $receive->maint_status }}</td>
                                                    <td><span class="badge badge-primary">{{ $receive->notes }}</td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">



                                                                <a class="dropdown-item"
                                                                    href="{{ route('receives_reports.edit', $receive->id) }}"><i
                                                                        class="far fa-edit me-2"></i>
                                                                    تعديل </a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('receive.destroy', $receive->id) }}"><i
                                                                        class="far fa-trash-alt me-2"></i> حذف</a>

                                                            </div>
                                                        </div>
                                                    </td>




                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $receives->links() !!}
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
