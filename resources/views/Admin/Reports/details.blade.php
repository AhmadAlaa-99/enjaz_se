@extends('layouts.master')
@section('css')

@endsection
@section('title')
تفاصيل قسط الدفع
@stop
@section('content')

    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="page-header invoices-page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <ul class="breadcrumb invoices-breadcrumb">

                        </ul>
                    </div>

                </div>
                </br>

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
                                                <h2>قسط ايجار</h2>
                                                <p>رقم العقد: {{$lease->reco_number}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>






                                <div class="invoice-item invoice-table-wrap">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <strong class="customer-text-one">تفاصيل القسط</strong>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped m-0">
                                                   	<thead>
												<tr>
                                                   <th> رقم سجل العقد </th>
                                                   <th> اسم المستأجر </th>
                                                   <th> رقم الوحدة </th>
                                                    <th> اسم المنشأة </th>
													<th>تاريخ الاصدار </th>
													<th>تاريخ الاستحقاق</th>
													<th>اجمالي القيمة </th>
                                                    <th> الرصيد  المدفوع </th>
                                                    <th> الرصيد  المتبقي </th>
												</tr>
											</thead>
											<tbody>
												<tr>
                                                    <td>{{$lease->reco_number}}</td>
                                                    <td>{{$lease->tenants->user->name}}</td>
                                                    <td>{{$lease->realties->realty_name}}</td>
                                                    <td>{{$lease->units->number}}</td>
													<td>{{$payment->release_date}}</td>
													<td>{{$payment->due_date}}</td>
													<td>{{$payment->total}}</td>
                                                    <td>{{$payment->paid}}</td>
													<td>{{$payment->remain}}</td>



												</tr>

											</tbody>
                                                </table>
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
