@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
     حركة التأجير في الوحدة
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
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-1">
                                        <i class="fas fa-home"></i>
                                    </span>

                                    <div class="dash-count">
                                        <div class="dash-title"> العقود الايجارية</div>
                                        <div class="dash-counts">
                                            <p>{{ $count_realties }}</p>
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
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-2">
                                        <i class="fas fa-home"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">واردات العقود</div>
                                        <div class="dash-counts">
                                            <p>{{ $proccees }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-3">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">مدفوعات العقود</div>
                                        <div class="dash-counts">
                                            <p>{{ $proccees_paid }}</p>
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
                                                <th>اسم المستأجر</th>
                                                <th>اسم المنشأة</th>
                                                <th>رقم الوحدة</th>
                                                <th>الحالة</th>
                                                <th>نوع العقد</th>
                                                <th>تاريخ بداية العقد</th>
                                                <th>تاريخ نهاية العقد</th>
                                                <th> الكلفة الاجمالية للعقد</th>
                                                <th>تاريخ اصدار القسط القادم</th>
                                                <th> دورة الدفع</th>
                                                <th>عدد دورات الدفع</th>
                                                <th> العمليات</th>



                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($leases as $lease)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><span class="badge badge-success">{{ $lease->reco_number }}</td>
                                                    <td><span
                                                            class="badge badge-success">{{ $lease->tenants->user->name }}
                                                    </td>
                                                    <td><span
                                                            class="badge badge-success">{{ $lease->realties->realty_name }}
                                                    </td>
                                                    <td><span class="badge badge-success">{{ $lease->units->number }}</td>
                                                     <td><span class="badge badge-warning">
                                                            @if ($lease->type == 'new')
                                                                جديد
                                                            @else
                                                                مجدد
                                                            @endif
                                                    </td>
                                                    <td><span class="badge badge-warning">{{ $lease->lease_type }}</td>

                                                    <td><span class="badge badge-danger">{{ $lease->st_rental_date }}</td>
                                                    <td><span class="badge badge-danger">{{ $lease->end_rental_date->format('Y-m-d') }}
                                                    </td>
                                                    <td><span
                                                            class="badge badge-warning">{{ $lease->financial->rent_value }}
                                                    </td>
                                                    <td><span
                                                            class="badge badge-danger">{{ $lease->next_payment }}
                                                    </td>
                                                     <td><span class="badge badge-success">
                                                            @if ($lease->financial->payment_cycle == 'quarterly')
                                                                ربع سنوي
                                                            @elseif($lease->financial->payment_cycle == 'monthly')
                                                                شهري
                                                            @elseif($lease->financial->payment_cycle == 'midterm')
                                                                نصف سنوي
                                                            @else
                                                                سنوي
                                                            @endif
                                                    </td>
                                                    <td><span
                                                            class="badge badge-success">{{ $lease->financial->num_rental_payments }}
                                                    </td>


                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">

                                                                <a class="dropdown-item"
                                                                    href="{{ route('payments.details', $lease->id) }}"><i
                                                                        style="color:green"
                                                                        class="far fa-eye me-2"></i>&nbsp;سداد
                                                                    الدفعات</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('lease.details', $lease->id) }}"><i
                                                                        style="color:green"
                                                                        class="far fa-eye me-2"></i>&nbsp;تفاصيل
                                                                    العقد</a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('down.file', $lease->id) }}"><i
                                                                        style="color:green"
                                                                        class="far fa-eye me-2"></i>&nbsp; تحميل
                                                                    المرفقات&nbsp;</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('lease_edit', $lease->id) }}"><i
                                                                        style="color:green"
                                                                        class="far fa-edit me-2"></i>&nbsp;تعديل
                                                                    بيانات العقد&nbsp;</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('move_le.archive', $lease->id) }}"><i
                                                                        style="color:green"
                                                                        class="far fa-trash-alt me-2"></i>&nbsp;
                                                                    &nbsp;
                                                                    انهاء العقد</a>
                                                            </div>
                                                        </div>

                                                    </td>




                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $leases->links() !!}
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
