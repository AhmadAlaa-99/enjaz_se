@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">

@endsection
@section('title')
    الواردات المالية
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="invoices-tabs">
                            <ul>
                                <li><a href="{{ url('/' . ($page = 'Admin/proceeds')) }}"class="active">الواردات
                                        المالية
                                    </a></li>
                                <li><a href="{{ url('/' . ($page = 'Admin/receivables')) }}">الذمم المالية</a>
                                </li>
                                <li><a href="{{ url('/' . ($page = 'Admin/realties_proceeds')) }}">سجل المنشأت
                                        العقارية
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">


                    </div>
                </div>
            </div>
            </br> </br> </br> </br>


  <div class="card filter-card">
                <div class="card-body pb-0">
                    <form action="{{ route('proceeds_date') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row formtype">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>البحث وفق الدفعات المسددة بشكل</label>
                                    <select name="type" class="form-control" id="sel1" name="sellist1"required>
                                        <option value="part">جزئي</option>
                                        <option value="total">كلي</option>
                                        <option value="all">جزئي وكلي</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>من</label>

                                        <input name="fromDate"type="date" class="form-control"required>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>الى</label>

                                        <input name="toDate" type="date" class="form-control"required>
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary" name="search"title="بحث">بحث</button>
                                </div>
                            </div>
                            <div class="col-md-1">

                                <h2>{{ isset($all_procceds) ? $all_procceds : '---' }}</h2>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


            <div class="row">
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ url('assets/img/icons/invoices-icon1.svg') }}" alt="">

                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">{{ $all_procced }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">الواردات المالية<span></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ url('assets/img/icons/invoices-icon2.svg') }}" alt="">
                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">{{ $rc }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">الذمم المالية <span></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ url('assets/img/icons/invoices-icon3.svg') }}" alt="">

                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">{{ $cnt }}</div>
                                </div>
                            </div>
                            <p class="inovices-all">مدفوعات عقود الاستئجار<span></span></p>
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
                                            <th> رقم سجل العقد </th>
                                            <th>تاريخ الاصدار </th>
                                            <th>تاريخ الاستحقاق</th>
                                            <th>اجمالي القيمة </th>
                                            <th> الرصيد المدفوع </th>
                                            <th> الرصيد المتبقي </th>
                                            <th>تفاصيل</th>




                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse ($proceeds as $proceed)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td><span class="badge badge-soft-dark">{{ $proceed->reco_number }}</td>
                                                <td><span class="badge badge-danger">{{ $proceed->release_date }}</td>
                                                <td><span class="badge badge-danger">{{ $proceed->due_date }}</td>
                                                <td><span class="badge badge-outline-info">{{ $proceed->total }}</td>
                                                <td><span class="badge badge-outline-info">{{ $proceed->paid }}</td>
                                                <td><span class="badge badge-outline-info">{{ $proceed->remain }}</td>
                                                <td><span class="badge badge-gardient-info"><a
                                                            href="{{ route('payment.details', $proceed->id) }}"> تفاصيل
                                                        </a>
                                                </td>

                                            </tr>

                                        @empty
                                        @endforelse
                                    </tbody>

                                </table>
                                </br>
                                <div class="d-flex justify-content-center">
                                    {!! $proceeds->links() !!}
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
