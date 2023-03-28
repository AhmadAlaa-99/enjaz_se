@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    وحدات المنشأة العقارية
@stop
@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">الوحدات الايجارية الخاصة ب المنشأة العقارية - {{ $realty->realty_name }}
                        </h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الوحدات الايجارية</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="col-lg-4 col-md-4">
                            <div class="invoices-settings-btn">
                                <a href="invoices-settings.html" class="invoices-settings-icon">
                                </a>
                                <a href="{{ route('realty_units_add', $realty->id) }}" class="btn">
                                    <i data-feather="plus-circle"></i> اضافة وحدة ايجارية
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="card invoices-tabs-card">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="invoices-tabs">
                                    <ul>
                                        <li><a href="invoices.html" class="active"></a></li>
                                        <li><a href="invoices-paid.html"></a></li>
                                        <li><a href="invoices-overdue.html"></a></li>
                                        <li><a href="invoices-draft.html"></a></li>
                                        <li><a href="invoices-recurring.html"></a></li>
                                        <li><a href="invoices-cancelled.html"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="invoices-settings-btn">


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
                                    <span class="dash-widget-icon bg-3">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <div class="dash-count">
                                        <div class="dash-title">الوحدات الكلية</div>
                                        <div class="dash-counts">
                                            <p>{{ $all }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{  route('contract_effictive') }}"> انتقل الى حركة التأجير </a>
                                </p>
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
                                            <p>{{ $added }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{  route('contract_effictive') }}"> انتقل الى حركة التأجير </a>
                                </p>
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
                                        <div class="dash-title">الوحدات المؤجرة</div>
                                        <div class="dash-counts">
                                            <p>{{ $rented }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{  route('contract_effictive') }}"> انتقل الى حركة التأجير </a>
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
                                        <div class="dash-title">الوحدات الفارغة</div>
                                        <div class="dash-counts">
                                            <p>{{ $empty }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                            class="fas fa-check-circle"></i></span><a
                                        href="{{ route('contract_effictive') }}">انتقل الى حركة التأجير</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                          @if (session()->has('max'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('max') }}</strong>
                            </div>
                        @endif
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
                                            <th> المساحة </th>
                                            <th> مؤثثة </a></th>
                                            <th> عدد دورات المياه </a></th>
                                            <th>خزائن مطبخ مركبة</th>
                                            <th> عدد وحدات التكييف</th>
                                            <th> نوع التكييف</th>
                                            <th> الحالة </th>
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
                                                <td><a href=""><span
                                                            class="badge badge-danger">{{ $unit->realties->realty_name }}</a>
                                                </td>
                                                <td><span class="badge badge-danger">{{ $unit->type->Name }}</td>
                                                <td><span class="badge badge-success">{{ $unit->number }}</td>
                                                <td><span class="badge badge-success">{{ $unit->role_number }}</td>
                                                <td><span class="badge badge-success">{{ $unit->size }}</td>
                                                <td><span class="badge badge-success">{{ $unit->furnished_mode }}</td>
                                                <td><span class="badge badge-success">{{ $unit->bathrooms }}</td>
                                                            <td>@if($unit->kitchen_Cabinets=="No")لا@else نعم @endif</td>
                                                <td><span class="badge badge-info">{{ $unit->condition_units }}</td>
                                                <td><span class="badge badge-info">{{ $unit->condition_type }}</td>
                                                <td><span class="badge badge-danger">@if($unit->status=="rented")مستأجرة @else فارغة @endif</td>



                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">

                                                            <a class="dropdown-item"
                                                                title=" تعديل بيانات الوحدة "href="{{ route('units.edit', $unit->id) }}"><i
                                                                    class="far fa-edit me-1"></i>تعديل بيانات الوحدة</a>

                                                            @if ($unit->status=='rented')
                                                                <a class="dropdown-item"title="تفاصيل العقد"
                                                                    href="{{ route('lease_un.details', $unit->id) }}"><i
                                                                        class="far fa-eye me-1"></i>تفاصيل العقد </a>
                                                            @else
                                                                <a class="dropdown-item"title="تأجير الوحدة"
                                                                    href="{{ route('unit.rent', $unit->id) }}"><i
                                                                        class="far fa-paper-plane me-1"></i>تأجير الوحدة</a>
                                                                <a class="dropdown-item"title="حذف الوحدة "
                                                                    href="{{ route('unit.destroy', $unit->id) }}"><i
                                                                        class="far fa-trash-alt me-1"></i>حذف الوحدة</a>
                                                            @endif
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