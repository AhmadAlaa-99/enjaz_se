@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    عقود الاستئجار الجارية
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
                                            <li><a href="{{ route('contract_effictive') }}" class="active">العقود
                                                    الجارية</a></li>
                                            <li><a href="{{ route('contract_finished') }}">العقود المنتهية</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="invoices-settings-btn">
                                        <a href="invoices-settings.html" class="invoices-settings-icon">
                                        </a>
                                        <a href="{{ route('contract_commercial') }}" class="btn">
                                            <i data-feather="plus-circle"></i> اضافة عقد استئجار
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
                                        <div class="dash-title">عدد العقود الجارية</div>
                                        <div class="dash-counts">
                                            <p>{{ $contract_active }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

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
                                        <div class="dash-title">عدد العقود المنتهية</div>
                                        <div class="dash-counts">
                                            <p>{{ $contract_expired }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>



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
                                            <p>{{ $contracts_cost }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

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
                                        <div class="dash-title">المستحقات المتبقية</div>
                                        <div class="dash-counts">
                                            <p>{{ $remain_cost }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
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
                                                <th>الرقم التسلسلي</th>
                                                <th>رقم العقد </th>
                                                <th>اسم المنشأة</th>
                                                <th>تاريخ بداية العقد</th>
                                                <th>تاريخ نهاية العقد</th>
                                                <th>قيمة الايجار</th>
                                                <th>القيمة الكلية</th>
                                                <th>المبلغ المدفوع</th>
                                                <th>المبلغ المتبقي</th>
                                                <th>الأقساط الكلية</th>
                                                <th>الأقساط المدفوعة</th>
                                                <th> النوع</th>
                                                <th> الحالة</th>
                                                <th>العمليات</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($contracts as $contract)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><span class="badge bg-success-light">
                                                            {{ $contract->contactNo }}</span></td>
                                                    <td><span
                                                            class="badge bg-success-light">{{ $contract->realty->realty_name }}</span>
                                                    </td>

                                                    <td><span
                                                            class="badge bg-success-dark">{{ $contract->start_date }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge bg-success-dark">{{ $contract->end_date }}</span>
                                                    </td>


                                                    <td><span
                                                            class="badge bg-danger-dark">{{ $contract->ejar_cost }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge bg-danger-dark">{{ $contract->rent_value }}</span>
                                                    </td>
                                                    <td><span class="badge bg-danger-dark">{{ $contract->paid }}</span>
                                                    </td>
                                                    <td><span class="badge bg-danger-dark">{{ $contract->remain }}</span>
                                                    </td>


                                                    <td> <span
                                                            class="badge bg-danger-light">{{ $contract->ensollments_total }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge bg-danger-light">{{ $contract->ensollments_paid }}</span>
                                                    </td>


                                                    <td><span class="badge bg-warning-light">{{ $contract->type }}</span>
                                                    </td>
                                                    <td><span class="badge bg-warning-light">{{ $contract->status }}</span>
                                                    </td>

                                                    <!--
                                                                    <input class="btn btn-primary" type="button" value="Input">
                                                                -->

                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('contract_details', $contract->id) }}"><i
                                                                        class="far fa-eye me-2"></i>تفاصيل العقد</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('down.contract_file', $contract->id) }}"><i
                                                                        class="far fa-eye me-2"></i>تحميل المرفقات</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('renew.contract', $contract->id) }}"><i
                                                                        class="far fa-check-circle me-2"></i>تجديد
                                                                    العقد</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('contract_edit', $contract->id) }}"><i
                                                                        class="far fa-edit me-2"></i>
                                                                    تعديل بيانات العقد</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('finish.contract', $contract->id) }}"><i
                                                                        class="far fa-trash-alt me-2"></i>انهاء العقد</a>

                                                            </div>
                                                        </div>
                                                    </td>






                                                </tr>

                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $contracts->links() !!}
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
