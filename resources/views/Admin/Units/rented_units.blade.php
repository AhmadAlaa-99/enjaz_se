@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    الوحدات المؤجرة
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
                                            <li><a href="{{ url('/' . ($page = 'Admin/realties')) }}">المنشأت العقارية</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/rented_units')) }}"
                                                   class="active" >الوحدات المؤجرة</a></li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/empty_units')) }}">الوحدات الشاغرة</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/site_units')) }}"
                                                    >الوحدات النشطة في الموقع</a></li>
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
                                    <span class="dash-widget-icon bg-1">
                                        <i class="fas fa-home"></i>
                                    </span>

                                    <div class="dash-count">
                                        <div class="dash-title"> المنشأت العقارية</div>
                                        <div class="dash-counts">
                                            <p>{{ $count_realties }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ url('/' . ($page = 'Admin/realties')) }}">انتقل الى ادارة العقارات</a></p>

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
                                        <div class="dash-title"> الوحدات الكلية</div>
                                        <div class="dash-counts">
                                            <p>{{ $count_units }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ url('/' . ($page = 'Admin/realties')) }}">انتقل الى ادارة العقارات</a></p>


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
                                        <div class="dash-title">الوحدات المضافة</div>
                                        <div class="dash-counts">
                                            <p>{{ $count_units_added }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ url('/' . ($page = 'Admin/effictive')) }}"> انتقل الى حركة التأجير </a>
                                </p>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header">
                                    <span class="dash-widget-icon bg-4">
                                        <i class="far fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">الوحدات المؤجرة</div>
                                        <div class="dash-counts">
                                            <p>{{ $count_units_rented }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ route('contract_effictive') }}">انتقل الى حركة الاستئجار</a></p>
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
                                                <th> اسم المنشأة </th>
                                                <th>نوع الوحدة</th>
                                                <th>رقم الوحدة</th>
                                                <th>رقم الدور</th>
                                                <th>المساحة </th>
                                                <th>مؤثثة </th>
                                                <th>عدد دورات المياه </th>
                                                <th>خزائن مطبخ مركبة</th>
                                                <th> عدد وحدات التكييف</th>
                                                <th> نوع التكييف</th>
                                                <th> العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($units as $unit)
                                                @php
                                                    $i++;
                                                @endphp
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><span class="badge badge-danger">{{ $unit->realties->realty_name }}
                                                    </td>
                                                    <td><span class="badge badge-danger">{{ $unit->type->Name }}</td>
                                                    <td><span class="badge badge-success">{{ $unit->number }}</td>
                                                    <td><span class="badge badge-success">{{ $unit->role_number }}</td>
                                                    <td><span class="badge badge-success">{{ $unit->size }}</td>
                                                    <td><span class="badge badge-info">{{ $unit->furnished_mode }}</td>
                                                    <td><span class="badge badge-success">{{ $unit->bathrooms }}</td>
                                                            <td> @if($unit->kitchen_Cabinets=="No")لا@else نعم @endif</td>
                                                    <td><span class="badge badge-info">{{ $unit->condition_units }}</td>
                                                    <td><span class="badge badge-info">{{ $unit->condition_type }}</td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">

                                                                <a class="dropdown-item"
                                                                    title=" تعديل بيانات الوحدة "href="{{ route('units.edit', $unit->id) }}"><i
                                                                        class="far fa-edit me-1"></i>تعديل بيانات الوحدة</a>
                                                                <a class="dropdown-item"title="تفاصيل العقد"
                                                                    href="{{ route('lease_un.details', $unit->id) }}"><i
                                                                        class="far fa-eye me-1"></i>تفاصيل العقد </a>
                                                                         <a class="dropdown-item"title="حركة التأجير "
                                                                    href="{{ route('Unit_leasing', $unit->id) }}"><i
                                                                        class="far fa-eye me-1"></i>حركة التأجير</a>


                                                            </div>
                                                        </div>

                                                    </td>



                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $units->links() !!}
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
