@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    المنشأت العقارية
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
                                            <li><a href="{{ url('/' . ($page = 'Admin/realties')) }}" class="active">المنشأت
                                                    العقارية</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/rented_units')) }}">الوحدات
                                                    المؤجرة</a></li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/empty_units')) }}">الوحدات الشاغرة</a>
                                            </li>
                                             <li><a href="{{ url('/' . ($page = 'Admin/site_units')) }}"
                                                    >الوحدات النشطة في الموقع</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="invoices-settings-btn">

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
                                     @if (session()->has('max'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('max') }}</strong>
                                </div>
                            @endif

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="copy-print-csv" class="table custom-table">
                                        <thead>
                                            <tr>
                                                <th><a href="">الرقم التسلسلي </a></th>
                                                <th> <a href=""> اسم المنشأة</a> </th>
                                                <th>تاريخ الاضافة</th>
                                                <th> الحي </th>
                                                <th> المساحة </th>
                                                <th> الأدوار </th>
                                                <th> الوحدات السكنية</th>
                                                <th> الوحدات التجارية</th>

                                                <th> الوحدات المستأجرة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($realties as $realty)
                                                @php
                                                    $i++;
                                                @endphp

                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td><span class="badge badge-danger">{{ $realty->realty_name }}</td>
                                                    <td><span class="badge badge-danger">{{ $realty->created_at }}</td>
                                                    <td><span class="badge badge-primary">{{ $realty->quarters->name }}
                                                    </td>
                                                    <td><span class="badge badge-success">{{ $realty->size }}</td>
                                                    <td><span class="badge badge-success">{{ $realty->roles }}</td>
                                                    <td><span class="badge badge-info">{{ $realty->units }}</td>
                                                    <td><span class="badge badge-info">{{ $realty->shopsNo }}</td>
                                                    <td><span class="badge badge-info">{{ $realty->rents }}</td>
                                                    <td>
                                                    <td class="text-end">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">

                                                                <a class="dropdown-item"
                                                                    title=" تفاصيل "href="{{ route('realty_units_show', $realty->id) }}"><i
                                                                        class="far fa-eye me-1"></i>اظهار وحدات المنشأة</a>
                                                                <a class="dropdown-item"title="اضافة وحدة ايجارية"
                                                                    href="{{ route('realty_units_add', $realty->id) }}"><i
                                                                        class="far fa-paper-plane me-1"></i>اضافة وحدة
                                                                    ايجارية</a>
                                                                <a class="dropdown-item"title="تعديل بيانات المنشأة "
                                                                    href="{{ route('realties.edit', $realty->id) }}"><i
                                                                        class="far fa-edit me-1"></i>تعديل بيانات
                                                                    المنشأة</a>
                                                                     <a class="dropdown-item"title="احصائيات المنشأة"
                                                                    href="{{ route('realty_leasing', $realty->id) }}"><i
                                                                        class="far fa-eye me-1"></i>احصائيات المنشأة
                                                                    </a>
                                                                <a class="dropdown-item"title="حذف "
                                                                    href="{{ route('realty.destroy', $realty->id) }}"><i
                                                                        class="far fa-trash-alt me-1"></i>حذف</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>

                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $realties->links() !!}
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
