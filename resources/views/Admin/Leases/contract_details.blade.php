@extends('layouts.master')
@section('css')

@endsection
@section('title')
    تفاصيل عقد الاستئجار
@stop
@section('content')

    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="page-header invoices-page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <ul class="breadcrumb invoices-breadcrumb">
                            <li class="breadcrumb-item invoices-breadcrumb-item">
                                <div class="col-auto">
                                    <div class="invoices-create-btn">


                                        <a href="{{ route('contract_edit', $contract->id) }}" class="btn save-invoice-btn">
                                            تعديل بيانات العقد
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="invoices-create-btn">

                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_payment{{ $contract->id }}"
                                class="btn save-invoice-btn">
                                اضافة قسط
                            </a>
                            <a href="{{ route('down.contract_file', $contract->id) }}" class="btn save-invoice-btn">
                                تحميل مرفقات العقد
                            </a>
                        </div>
                    </div>
                </div>
                </br>

                <div class="modal custom-modal fade bank-details" id="add_payment{{ $contract->id }}" role="dialog">
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
                                <form action="{{ route('payment_contract.add', $contract->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="active" for="recipient-name" class="col-form-label">رقم
                                                    القسط</label>
                                                <input type="number" name="installmentNo" class="form-control"
                                                    id="recipient-name"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="active" for="recipient-name" class="col-form-label">تاريخ
                                                    القسط</label>
                                                <input type="date" name="installment_date" class="form-control"
                                                    id="recipient-name"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="active" for="recipient-name"
                                                    class="col-form-label">المبلغ</label>
                                                <input type="number" name="amount" class="form-control"
                                                    id="recipient-name"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="active" for="recipient-name" class="col-form-label">تاريخ
                                                    الدفع</label>
                                                <input type="date" name="payment_date" class="form-control"
                                                    id="recipient-name"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="active" for="recipient-name" class="col-form-label">طريقة
                                                    الدفع</label>
                                                <input type="text" name="payment_type" class="form-control"
                                                    id="recipient-name"required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="active" for="recipient-name" class="col-form-label">الرقم
                                                    المرجعي</label>
                                                <input type="number" name="refrenceNo" class="form-control"
                                                    id="recipient-name"required>
                                            </div>
                                        </div>
                                    </div>









                            </div>
                            <div class="modal-footer">
                                <div class="bank-details-btn">
                                    <button type="submit" class="btn bank-save-btn">اغلاق</button>

                                    <button type="submit" class="btn bank-save-btn">حفظ</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        @if (session()->has('max_count'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('max_count') }}</strong>

                            </div>
                        @endif
                        @if (session()->has('max_rent'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('max_rent') }}</strong>

                            </div>
                        @endif
                        <div class="card invoice-info-card">
                            <div class="card-body">
                                <div class="invoice-item invoice-item-one">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo">
                                                <img src={{ url('assets/img/logo.png') }} alt="logo">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <h2>عقد استئجار {{ $contract->type }}</h2>
                                                <p>رقم السجل: {{ $contract->contactNo }}</p>
                                                <p> تاريخ ابرام العقد: {{ $contract->start_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="invoice-issues-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="invoice-issues-date">
                                                <p> تاريخ بداية العقد : {{ $contract->start_date }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="invoice-issues-date">
                                                <p> تاريخ نهاية العقد : {{ $contract->end_date }} </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="invoice-issues-date">
                                                <p> صلاحية العقد : {{ $contract->type_s }} </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="customer-text-one">بيانات العقد</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>رقم سجل العقد</th>
                                                            <th> نوع العقد</th>
                                                            <th> صلاحية العقد</th>
                                                            <th> الحالة</th>
                                                            <th>تاريخ بداية مدة الايجار</th>
                                                            <th>تاريخ نهاية مدة الايجار</th>
                                                            <th> كلفة الايجار</th>
                                                            <th>نسبة الضريبة</th>
                                                            <th>مبلغ الضريبة</th>
                                                            <th>الكلفة الاجمالية</th>
                                                            <th>ملاحظات</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $contract->contactNo }}</td>
                                                            <td>{{ $contract->type }}</td>
                                                            <td>{{ $contract->type_s }}</td>
                                                            <td>{{ $contract->status }}</td>
                                                            <td>{{ $contract->start_date }}</td>
                                                            <td>{{ $contract->end_date }}</td>
                                                            <td>{{ $contract->ejar_cost }}</td>
                                                            <td>{{ $contract->tax }}</td>
                                                            <td>{{ $contract->tax_amount }}</td>
                                                            <td>{{ $contract->rent_value }}</td>
                                                            <td>{{ $contract->note }}</td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="customer-text-one">بيانات المالك</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>
                                                        <tr>
                                                            <th> الاسم الكامل</th>
                                                            <th> البريد الالكتروني </th>
                                                            <th> رقم الجوال</th>
                                                            <th> اسم الوسيط</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $owner->name }}</td>
                                                            <td>{{ $owner->email }}</td>
                                                            <td>{{ $owner->mobile }}</td>
                                                            <td>{{ $owner->attribute_name }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="customer-text-one">بيانات المنشأة العقارية</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>
                                                        <tr>
                                                            <th> اسم المنشأة</th>
                                                            <th> اسم الوكيل</th>
                                                            <th> رقم الوكيل</th>
                                                            <th> الحي</th>
                                                            <th> النوع</th>
                                                            <th> عدد الوحدات السكنية </th>
                                                            <th> عدد الوحدات التجارية </th>
                                                            <th> عدد الأدوار </th>
                                                            <th> elevator </th>
                                                            <th> parking </th>
                                                            <th> المساحة</th>
                                                            <th> استخدام </th>
                                                            <th> المميزات </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $realty->realty_name }}</td>
                                                            <td>{{ $realty->agency_name }}</td>
                                                            <td>{{ $realty->agency_mobile }}</td>
                                                            <td>{{ $realty->quarters->name }}</td>
                                                            <td>{{ $realty->type }}</td>
                                                            <td>{{ $realty->units }}</td>
                                                            <td>{{ $realty->elevator }}</td>
                                                            <td>{{ $realty->parking }}</td>
                                                            <td>{{ $realty->shopsNo }}</td>
                                                            <td>{{ $realty->roles }}</td>
                                                            <td>{{ $realty->size }}</td>
                                                            <td>{{ $realty->use }}</td>
                                                            <td>{{ $realty->advantages }}</td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="customer-text-one">الأقساط المدفوعة</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>

                                                        <tr>
                                                            <th>رقم القسط</th>
                                                            <th> تاريخ الاصدار</th>
                                                            <th> المبلغ الاجمالي </th>
                                                            <th> تاريخ الدقع </th>
                                                            <th> طريقة الدفع </th>
                                                            <th> رقم المرجع</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($mentos as $mento)
                                                            <tr>
                                                                <td>{{ $mento->installmentNo }}</td>
                                                                <td>{{ $mento->installment_date->format('Y-m-d')}}</td>
                                                                <td>{{ $mento->amount }}</td>
                                                                <td>{{ $mento->payment_date }}</td>
                                                                <td>{{ $mento->payment_type }}</td>
                                                                <td>{{ $mento->refrenceNo }}</td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-terms">
                                            <h2>ملاحظات العقد</h2>
                                            <p class="mb-0">{{ $contract->note }}</p>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-total-card">
                                            <div class="invoice-total-box">
                                                <div class="invoice-total-inner">
                                                    <p>القيمة المدفوعة حتى الأن <span>{{ $contract->paid }}</span></p>
                                                    <p>القيمة الاجمالية<span>{{ $contract->rent_value }}</span></p>
                                                </div>
                                                <div class="invoice-total-footer">
                                                    <h4>القيمة المتبقية<span>{{ $contract->remain }}</span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-sign text-end">
                                    <img class="img-fluid d-inline-block" src="{{ url('assets/img/signature.png') }}"
                                        alt="sign">
                                    <span class="d-block">شركة روعة انجاز</span>
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
