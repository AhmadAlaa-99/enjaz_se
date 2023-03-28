@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
عقود الاجار
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
                                    <th>الرقم النسلسلي </th>
                                    <th>رقم العقد </th>
                                    <th>اسم المستأجر</th>
                                    <th>اسم المنشأة</th>
                                    <th>رقم الوحدة</th>
                                    <th>حالة العقد</th>
                                    <th>نوع العقد</th>
                                    <th>تاريخ بداية العقد</th>
                                    <th>تاريخ نهاية العقد</th>
                                    <th> الكلفة الاجمالية للعقد</th>
                                    <th>تفاصيل العقد </th>
                                    <th> الحالة</th>

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
                                        <td><span class="badge bg-success-light">{{ $lease->reco_number }}</td>
                                        <td><span class="badge bg-success-light">{{ $lease->tenants->user->name }}</td>
                                        <td><span class="badge bg-success-dark">{{ $lease->realties->realty_name }}</td>
                                        <td><span class="badge bg-success-dark">{{ $lease->units->number }}</td>
                                        <td><span class="badge bg-danger-dark">{{ $lease->type }}</td>
                                        <td><span class="badge bg-danger-dark">{{ $lease->lease_type }}</td>

                                        <td><span class="badge bg-danger-light">{{ $lease->st_rental_date }}</td>
                                        <td><span class="badge bg-danger-light">{{ $lease->end_rental_date->format('Y-m-d') }}</td>
                                        <td><span class="badge bg-danger-dark">{{ $lease->financial->rent_value }}</td>
                                        <td><span class="badge badge-outline-info"><a
                                                    href="{{ route('tn_lease.details', $lease->id) }}">معاينة</a></td>
                                        <td><span class="badge bg-danger-dark">{{ $lease->status }}</td>
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
