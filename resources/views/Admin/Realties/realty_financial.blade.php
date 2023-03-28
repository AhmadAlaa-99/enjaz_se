@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">

@endsection
@section('title')
    السجل المالي في منشأة {{ $realty->realty_name }}
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="invoices-tabs">
                            <ul>
                               <li><a  href="{{ route('realty_leasing', $realty->id) }}">حركة التأجير</a>
                                </li>
                                <li><a class="active" href="{{ route('realty_financial', $realty->id) }}">السجل المالي
                                    </a></li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">

                    </div>
                </div>
            </div>
            </br> </br> </br> </br>
            <!--
            <div class="card filter-card">
                <div class="card-body pb-0">
                    <form action="{{ route('realty_financial_search') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row formtype">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>من</label>
                                        <input name="fromDate"type="date" class="form-control"required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>الى</label>
                                        <input name="toDate" type="date" class="form-control"required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary" name="search"title="بحث">بحث</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6>اجمالي العوائد المالية خلال الفترة المحددة</h6>
                                <h2></h2>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        -->
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-2">
                                    <i class="fas fa-home"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">الكلفة الاجمالية لاستئجار المنشأة</div>
                                    <div class="dash-counts">
                                        <p>{{ $realty->total }}</p>
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
                                    <div class="dash-title">واردات العقود</div>
                                    <div class="dash-counts">
                                        <p>{{ $proccees }}</p>
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
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-alt"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">الواردات المدفوعة</div>
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

                                     @forelse ($contracts as $contract)
                                     <table id="copy-print-csv" class="table custom-table">
                                        <thead>
                                            <tr class="table-dark">
                                                  <th>رقم سجل العقد</th>
                                                <th>كلفة استئجار العقد</th>
                                                <th>تاريخ بداية العقد</th>
                                                <th>تاريخ نهاية العقد</th>
                                                <th>تفاصيل </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="table-dark">
                                             <td><span class="badge badge-dark">{{ $contract->contactNo }}</td>

                                                <td><span class="badge badge-dark">{{ $contract->rent_value }}</td>
                                                <td><span class="badge badge-dark">{{ $contract->start_date }}</td>
                                                <td><span class="badge badge-dark">{{ $contract->end_date }}</td>
                                                <td><span class="badge badge-dark">procccss</td>
                                            </tr>
                                        </tbody>
                                        <table id="copy-print-csv" class="table custom-table">
                                            <thead>
                                                <tr class="table-info">
                                                    <th>رقم الوحدة</th>
                                                    <th>تاريخ بداية العقد</th>
                                                    <th>تاريخ نهاية العقد</th>
                                                    <th>كلفة العقد</th>
                                                    <th>المبلغ المدفوع</th>
                                                    <th>المبلغ المتبقي</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @forelse ($contract->leases as $lease)

                                                <tr class="table-info">
                                                    <td><span class="badge badge-success">{{ $lease->units->number }}</td>
                                                    <td><span class="badge badge-success">{{ $lease->st_rental_date }}</td>
                                                    <td><span class="badge badge-danger">{{ $lease->end_rental_date->format('Y-m-d') }}</td>
                                                    <td><span class="badge badge-success">{{ $lease->financial->rent_value }}</td>
                                                    <td><span class="badge badge-danger">{{ $lease->financial->paid }}</td>
                                                    <td><span class="badge badge-danger">{{ $lease->financial->remain }}</td>
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
                                            </tbody>


                                        @empty
                                        @endforelse
                                         </table>
                                           </table>

@empty
                                        @endforelse

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
