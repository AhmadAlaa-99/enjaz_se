@extends('layouts.master')
@section('css')

@endsection
@section('title')
تفاصيل عقد الايجار
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


                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <div class="invoices-create-btn">

                      
                            <a href="{{ route('down.file', $lease->id) }}" class="btn save-invoice-btn">
                                تحميل مرفقات العقد
                            </a>
                        </div>
                    </div>
                </div>
                </br>
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
                                        <input type="date" name="due_date" class="form-control"
                                            id="recipient-name"required>
                                    </div>
                                    <div class="form-group">
                                        <label class="active" for="recipient-name" class="col-form-label">المبلغ</label>
                                        <input type="number" name="total" class="form-control"
                                            id="recipient-name"required>
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
                        <div class="card invoice-info-card">
                            <div class="card-body">
                                <div class="invoice-item invoice-item-one">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo">
                                                <img src={{ url('assets/img/logo.png') }} alt="logo">
                                            </div>
                                            <div class="invoice-head">
                                                <h2>عقد استئجار {{ $lease->lease_type }}</h2>
                                                <p>رقم السجل: {{ $lease->reco_number }}</p>
                                                <p> تاريخ ابرام العقد: {{ $lease->le_date }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>




                                <div class="invoice-issues-box">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="invoice-issues-date">
                                                <p> تاريخ بداية العقد : {{ $lease->st_rental_date }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="invoice-issues-date">
                                                <p> تاريخ نهاية العقد : {{ $lease->end_rental_date }} </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="invoice-issues-date">
                                                <p> صلاحية العقد : {{ $lease->status }} </p>
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
                                                            <th> حالة العقد</th>
                                                            <th> نوع العقد</th>

                                                            <th>تاريخ ابرام العقد</th>
                                                            <th> مكان ابرام العقد</th>
                                                            <th> تاريخ بداية مدة الايجار</th>
                                                            <th>تاريخ نهاية مدة الايجار</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $lease->reco_number }}</td>
                                                            <td>{{ $lease->type }}</td>
                                                            <td>{{ $lease->lease_type }}</td>

                                                            <td>{{ $lease->le_date }}</td>
                                                            <td>{{ $lease->place }}</td>
                                                            <td>{{ $lease->st_rental_date }}</td>
                                                            <td>{{ $lease->end_rental_date->format('Y-m-d') }}</td>
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

                                            <strong class="customer-text-one">بيانات  المستأجر</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                     <thead>
                                                                <tr>
                                                                    <th> الاسم الكامل</th>
                                                                    <th> رقم الهوية </th>
                                                                    <th> نوع الهوية </th>
                                                                    <th> رقم الجوال</th>
                                                                    <th> الجنسية</th>
                                                                    <th> رقم الهاتف </th>
                                                                    <th> البريد الالكتروني</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $tenant->user->name }}</td>
                                                                    <td>{{ $tenant->user->ID_num }}</td>
                                                                    <td>{{ $tenant->user->ID_type }}</td>
                                                                    <td>{{ $tenant->user->phone }}</td>
                                                                    <td>{{ $tenant->user->Nationality->Name }}</td>
                                                                    <td>{{ $tenant->user->telephone }}</td>
                                                                    <td>{{ $tenant->user->email }}</td>

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
                                                            <th> الحي</th>
                                                            <th> النوع</th>
                                                            <th> عدد الوحدات السكنية </th>
                                                            <th> عدد الوحدات التجارية </th>

                                                            <th> عدد الأدوار </th>
                                                            <th> المساحة</th>
                                                            <th> استخدام </th>
                                                            <th> المميزات </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td>{{ $lease->realties->quarter }}</td>
                                                            <td>{{ $lease->realties->type }}</td>
                                                            <td>{{ $lease->realties->units }}</td>
                                                            <td>{{ $lease->realties->shopsNo }}</td>
                                                            <td>{{ $lease->realties->roles }}</td>
                                                            <td>{{ $lease->realties->size }}</td>

                                                            <td>{{ $lease->realties->use }}</td>
                                                            <td>{{ $lease->realties->advantages }}</td>

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

                                            <strong class="customer-text-one">بيانات الوحدة الايجارية</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>
                                                        <tr>
                                                            <th> رقم الوحدة</th>
                                                            <th> رقم الدور</th>
                                                            <th> النوع </th>
                                                            <th> المساحة </th>
                                                            <th> حالة الأثاث</th>
                                                            <th> خزائن مطبخ مركبة </th>
                                                            <th> نوع التكييف </th>
                                                            <th> عدد وحدات التكييف </th>
                                                            <th> عدد دورات المياه </th>
                                                            <th> تفاصيل</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $lease->units->number }}</td>
                                                            <td>{{ $lease->units->role_number }}</td>
                                                            <td>{{ $lease->units->type->Name }}</td>
                                                            <td>{{ $lease->units->size }}</td>
                                                            <td>{{ $lease->units->furnished_mode }}</td>
                                                            <td>{{ $lease->units->kitchen_Cabinets }}</td>
                                                            <td>{{ $lease->units->condition_type }}</td>
                                                            <td>{{ $lease->units->condition_units }}</td>
                                                            <td>{{ $lease->units->bathrooms }}</td>
                                                            <td>{{ $lease->units->details }}</td>


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

                                            <strong class="customer-text-one">البيانات المالية</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>قيمة العقد</th>
                                                            <th>دورة سداد الايجار</th>
                                                            <th> عدد دفعات الايجار </th>
                                                            <th> دفعة الايجار الدورية </th>
                                                            <th> نسبة الضريبة </th>
                                                            <th> مبلغ الضريبة </th>
                                                            <th> اجمالي قيمة العقد </th>




                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $lease->financial->ejar_cost }}</td>
                                                            <td>{{ $lease->financial->payment_cycle }}</td>
                                                            <td>{{ $lease->financial->num_rental_payments }}</td>
                                                            <td>{{ $lease->financial->recurring_rent_payment }}
                                                            </td>
                                                            <td>{{ $lease->financial->tax }}</td>
                                                            <td>{{ $lease->financial->tax_ammount }}</td>
                                                            <td>{{ $lease->financial->rent_value }}</td>


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

                                            <strong class="customer-text-one">تفاصيل سداد الدفعات</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>الرقم التسلسلي</th>
                                                            <th> تاريخ الاصدار </th>
                                                            <th>تاريخ الاستحقاق</th>
                                                            <th>اجمالي القيمة </th>
                                                            <th> الرصيد المدفوع </th>
                                                            <th> الرصيد المتبقي </th>



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
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $payment->release_date }}</td>
                                                                <td>{{ $payment->due_date }}</td>
                                                                <td>{{ $payment->total }}</td>
                                                                <td>{{ $payment->paid }}</td>
                                                                <td>{{ $payment->remain }}</td>



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


                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="customer-text-one">بيانات المطور</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                    <thead>

                                                        <tr>
                                                            <th>الاسم </th>
                                                            <th> البريد الالكتروني</th>
                                                            <th>رقم الهوية </th>
                                                            <th> نوع الهوية</th>
                                                            <th>الجنسية</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $broker->name }}</td>
                                                            <td>{{ $broker->email }}</td>
                                                            <td>{{ $broker->name }}</td>
                                                            <td>{{ $broker->name }}</td>
                                                            <td>{{ $broker->name }}</td>

                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
























                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-terms">
                                            <h6>ملاحظات العقد</h6>
                                            <p class="mb-0">{{ $lease->financial->ejar_cost }}</p>
                                        </div>
                                        <div class="invoice-terms">
                                            <h6>التزامات الأطراف</h6>
                                            <p class="mb-0">{{ $commitments->desc }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-total-card">
                                            <div class="invoice-total-box">
                                                <div class="invoice-total-inner">
                                                    <p>قيمة العقد<span>{{ $lease->financial->ejar_cost }}</span></p>
                                                    <p> مبلغ الضريبة<span>{{ $lease->financial->tax_ammount }}</span></p>
                                                </div>
                                                <div class="invoice-total-footer">
                                                    <h4>اجمالي قيمة العقد<span>{{ $lease->financial->rent_value }}</span></h4>
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
