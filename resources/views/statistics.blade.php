@extends('layouts.master')
@section('css')

@endsection
@section('title')
الاحصائيات
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
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
                                        <p>{{ $realties }}</p>
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
                                    <div class="dash-title"> الوحدات الايجارية</div>
                                    <div class="dash-counts">
                                        <p>{{ $units }}</p>
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
                                    <div class="dash-title"> العقود الجارية</div>
                                    <div class="dash-counts">
                                        <p>{{ $leases_count }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="fas fa-check-circle"></i></span><a
                                    href="{{ url('/' . ($page = 'Admin/effictive')) }}"> انتقل الى حركة التأجير </a></p>


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
                                    <div class="dash-title"> عقود الاستئجار</div>
                                    <div class="dash-counts">
                                        <p>{{ $contracts }}</p>
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
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-5">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">واردات العقود</div>
                                    <div class="dash-counts">
                                        <p>{{ $proceeds }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="fas fa-check-circle"></i></span><a
                                    href="{{ url('/' . ($page = 'Admin/proceeds')) }}">للمزيد انتقل الى السجل المالي</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-6">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">مدفوعات عقود الاستئجار</div>
                                    <div class="dash-counts">
                                        <p>{{ $contracts_payments }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                        class="fas fa-check-circle"></i></span><a
                                    href="{{ url('/' . ($page = 'Admin/proceeds')) }}">للمزيد انتقل الى السجل المالي</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-7">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">الذمم المالية</div>
                                    <div class="dash-counts">
                                        <p>{{ $receivs }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i
                                        class="fas fa-check-circle"></i></span><a
                                    href="{{ url('/' . ($page = 'Admin/proceeds')) }}">للمزيد انتقل الى السجل المالي</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-8">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>

                                <div class="dash-count">
                                    <div class="dash-title">مدفوعات الصيانة</div>
                                    <div class="dash-counts">
                                        <p>{{ $maintenances }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i
                                        class="fas fa-check-circle"></i></span><a
                                    href="{{ url('/' . ($page = 'Admin/proceeds')) }}">للمزيد انتقل الى السجل المالي</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">اقساط الدفع</h5>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/' . ($page = 'Admin/proceeds')) }}"
                                        class="btn-right btn btn-sm btn-outline-primary">
                                        انتقل الى السجل المالي
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="progress progress-md rounded-pill mb-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 47%"
                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 28%"
                                        aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%"
                                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-auto" >
                                        <i  class="fas fa-circle text-success me-1 paid" ></i> مدفوع
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-circle text-warning me-1""></i> غير مدفوع
                                    </div>
<style>
.text-success {
    color: #cff4fc !important;
}
.text-warning {
    color: #212529 !important;
}
</style>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                      
                                            <th>المبلغ</th>
                                            <th>تاريخ الاصدار</th>
                                            <th>تفاصيل القسط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as $payment)
                                            <tr @if($payment->paid=='0') class="table-dark" @else class="table-info" @endif >
                                                <td>


                                                    <h2 class="table-avatar">
                                                        <a href="" style="color: #4f00ff;">
                                                            {{ $payment->total }}</a>
                                                    </h2>
                                                </td>
                                             
                                                <td>{{ $payment->release_date}}</td>
                                                <td><span class="badge bg-success-light"><a
                                                            href="{{ route('payment.details', $payment->id) }}">تفاصيل</a></span>
                                                </td>

                                            </tr>

                                        @empty
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title">أخر العقود الايجارية </h5>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/' . ($page = 'Admin/effictive')) }}"
                                        class="btn-right btn btn-sm btn-outline-primary">
                                        انتقل الى حركة التأجير
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="progress progress-md rounded-pill mb-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 39%"
                                        aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%"
                                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 26%"
                                        aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="fas fa-circle text-success me-1"></i>جديد
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-circle text-warning me-1"></i> مجدد
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>رقم العقد</th>
                                            <th>تاريخ بداية العقد</th>
                                            <th>الكلفة الاجمالية</th>
                                            <th>تفاصيل العقد</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($leases as $lease)
                                            <tr @if($lease->type=='new') class="table-info" @else class="table-dark" @endif >
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" style="color: #4f00ff;">{{ $lease->reco_number }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $lease->st_rental_date }}</td>
                                                <td style="color: #4f00ff;">{{ $lease->financial->rent_value }}</td>
                                                <td><span class="badge bg-success-light"><a
                                                            href="{{ route('lease.details', $lease->id) }}">تفاصيل</a></span>
                                                </td>

                                            </tr>

                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
