@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    تفاصيل سداد الدفعات
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">تفاصيل سداد الدفعات</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">حركة التأجير </a></li>
                            <li class="breadcrumb-item active">ادارة العقود</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="col-lg-4 col-md-4">
                            <div class="invoices-settings-btn">
                                <a href="invoices-settings.html" class="invoices-settings-icon">
                                </a>

                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_payment{{ $lease->id }}"
                                    class="btn delete-invoice-btn">
                                    اضافة قسط
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
            <div class="modal custom-modal fade bank-details" id="add_payment{{ $lease->id }}" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="form-header text-start mb-0">
                                <h4 class="mb-0">اضافة قسط جديد</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('payment_lease_add', $lease->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">



                                    <label class="active" for="recipient-name" class="col-form-label">تاريخ
                                        الاصدار</label>
                                    <input type="date" name="release_date" class="form-control"
                                        id="recipient-name"required>
                                </div>
                                <div class="form-group">
                                    <label class="active" for="recipient-name" class="col-form-label">تاريخ
                                        الاستحقاق</label>
                                    <input type="date" name="due_date" class="form-control" id="recipient-name"required>
                                </div>
                                <div class="form-group">
                                    <label class="active" for="recipient-name" class="col-form-label">المبلغ</label>
                                    <input type="number" name="total" class="form-control" id="recipient-name"required>
                                </div>




                        </div>
                        <div class="modal-footer">
                            <div class="bank-details-btn">
                                <button type="cancel" class="btn bank-save-btn">اغلاق</button>

                                <button type="submit" class="btn bank-save-btn">حفظ</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="lease_id" value="{{ $lease->id }}">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            </br>
                            @if (session()->has('max_rent'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('max_rent') }}</strong>

                                </div>
                            @endif
                            @if (session()->has('max_count'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('max_count') }}</strong>

                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>الرقم التسلسلي</th>
                                            <th> تاريخ الاصدار </th>
                                            <th>تاريخ الاستحقاق</th>
                                            <th>اجمالي القيمة </th>
                                            <th> الرصيد المدفوع </th>
                                            <th> الرصيد المتبقي </th>
                                            <th> وصل استلام </th>
                                            <th> اضافة رصيد </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse ($payments as $payment)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr class="table-light">
                                                <td>{{ $i }}</td>
                                                <td>{{ $payment->release_date }}</td>
                                                <td>{{ $payment->due_date }}</td>
                                                <td>{{ $payment->total }}</td>
                                                <td>{{ $payment->paid }}</td>
                                                <td>{{ $payment->remain }}</td>
                                                <td>
                                                    <a href="{{ route('payment.details', $payment->id) }}"> print </a>
                                                </td>
                                                <td> <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit_national"
                                                        class="btn btn-sm btn-white text-success me-2"><i
                                                            class="far fa-edit me-1"></i> اضافة مبلغ
                                                    </a>

                                                </td>
                                                <div id="edit_national" class="modal custom-modal fade" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">اضافة مبلغ</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('payment.edit', $payment->id) }}"
                                                                    method="post"
                                                                    enctype="multipart/form-data"autocomplete="off">
                                                                    {{ csrf_field() }}

                                                                    <div class="form-group">
                                                                        <label> المبلغ <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="number"
                                                                            name="paid"class="form-control">
                                                                    </div>

                                                                    <div class="submit-section">
                                                                        <button
                                                                            class="btn btn-primary submit-btn">حفظ</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>






                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $payments->links() !!}
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
