@extends('layouts.master')
@section('css')
    <!-- Steps Wizard CSS -->

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/summernote/summernote-bs4.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/wizard.css') }}">
@endsection
@section('title')
    اضافة عقد استئجار
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
                                            <li><a
                                                    href="{{ route('contract_commercial') }}"@if ($type == 'تجاري') class="active" @endif>عقد
                                                    تجاري
                                                </a></li>
                                            <li><a
                                                    href="{{ route('contract_residential') }}"@if ($type == 'سكني') class="active" @endif>عقد
                                                    سكني</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page header start -->

                <!-- Content wrapper start -->
                <div class="row">
                    <form action="{{ route('store_commercial') }}" method="post"
                        enctype="multipart/form-data"autocomplete="off">
                        {{ csrf_field() }}
                        <!--  بيانات المالك -->
                        <div class="form-group">
                            <h2 class="heading">بيانات المالك</h2>
                            <div class="grid">


                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped m-0">
                                            <thead>
                                                <tr>
                                                    <th>الاسم</th>
                                                    <th>الهاتف</th>
                                                    <th> البريد</th>
                                                    <th> اسم الوسيط</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $owner->name }}</td>
                                                    <td>{{ $owner->mobile }}</td>
                                                    <td>{{ $owner->email }}</td>
                                                    <td>{{ $owner->attribute_name }}</td>


                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <!--  بيانات المنشأة -->
                        <div class="form-group">
                            <h2 class="heading">بيانات المشنأة</h2>
                            <div class="grid">

                                <div class="col-md-12">

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
                                                    <td>{{ $realty->shopsNo }}</td>
                                                    <td>{{ $realty->parking }}</td>
                                                    <td>{{ $realty->elevator}}</td>
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


                        <div class="form-group">
                            <h2 class="heading">بيانات العقد</h2>
                            <input type="hidden" id="type" class="floatLabel"
                                value="{{ $type }}"name="type_sc"required>
                            <div class="grid">
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="contactNo" class="floatLabel"
                                            value="{{ old('contactNo') }}"name="contactNo"required>
                                        <label class="active" for="street">رقم سجل العقد - ID</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="number" id="Amount_Commission" class="floatLabel"
                                            value="{{ old('ejar_cost') }}"name="ejar_cost" onchange="myFunction()"
                                            required>
                                        <label class="active" for="street"> كلفة الاستئجار (كلفة استئجار الوحدات
                                            التجارية)</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="number" id="ensollments_total" class="floatLabel"
                                            value="{{ old('ensollments_total') }}"name="ensollments_total"required>
                                        <label class="active" for="street">عدد الأقساط</label>
                                    </div>

                                </div>
                            </div>
                            <div class="grid">
                                <div class="col-1-2">
                                    <div class="controls">
                                        <input type="date" id="start_date" class="floatLabel"
                                            value="{{ old('start_date') }}"name="start_date"required>
                                        <label class="active" for="eMail">تاريخ بداية مدة الاستئجار</label>
                                    </div>

                                </div>
                                <div class="col-1-2">
                                    <div class="controls">
                                        <input type="date" id="end_date" class="floatLabel"
                                            value="{{ old('end_date') }}"name="end_date"required>
                                        <label class="active" for="phone">تاريخ نهاية مدة الاستئجار</label>
                                    </div>

                                </div>

                            </div>

                            <div class="grid">
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="Rate_VAT" class="floatLabel"
                                            value="15%"name="tax"readonly>
                                        <label class="active" for="phone">نسبة الضريبة</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="Value_VAT" class="floatLabel"
                                            value="{{ old('tax_amount') }}"name="tax_amount"readonly>
                                        <label class="active" for="phone">مبلغ الضريبة</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="Total" class="floatLabel"
                                            value="{{ old('rent_value') }}"name="rent_value"readonly>
                                        <label class="active" for="phone">الكلفة الاجمالية للاستئجار</label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid">
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="note" class="floatLabel"
                                            value="{{ old('fee') }}"name="fee"required>
                                        <label class="active" for="phone">رسوم عقد الاستئجار(تدفع لمرة واحدة)</label>
                                    </div>
                                </div>
                                <div class="col-2-3">
                                    <div class="controls">
                                        <input type="text" id="note" class="floatLabel"
                                            value="{{ old('note') }}"name="note"required>
                                        <label class="active" for="phone">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--   جدول سداد الدفعات -->
                        <div class="form-group">
                            <h2 class="heading">جدول سداد الأقساط</h2>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-center add-table-items" id="tableEstimate">
                                                <thead>
                                                    <tr>
                                                        <th>رقم القسط</th>
                                                        <th>تاريخ الاصدار</th>
                                                        <th>رقم المرجع</th>
                                                        <th>تاريخ الدفع</th>
                                                        <th> المبلغ</th>
                                                        <th> طريقة الدفع</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add">
                                                    <tr>
                                                        <td><input class="form-control" type="number" id="installmentNo"
                                                                name="installmentNo[]"required>
                                                        </td>
                                                        <td><input class="form-control" type="date"
                                                                id="installment_date" name="installment_date[]"required>
                                                        </td>
                                                        <td><input class="form-control unit_price" type="number"
                                                                id="refrenceNo" name="refrenceNo[]"required></td>
                                                        <td><input class="form-control unit_price" type="date"
                                                                id="payment_date" name="payment_date[]"required></td>
                                                        <td><input class="form-control unit_price" type="number"
                                                                id="amount" name="amount[]"required></td>
                                                        <td><input class="form-control unit_price" type="text"
                                                                id="payment_type" name="payment_type[]"required></td>
                                                        <td><button type="button" class="btn btn-primary"
                                                                id="add_btn"> <i
                                                                    class="fas fa-plus-circle"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <h2 class="heading"> مرفقات العقد</h2>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                    <div class="mb-1">
                                        <input class="form-control"
                                            name="contract_file"accept=".pdf,.jpg, .png, image/jpeg, image/png"type="file"
                                            id="formFileDisabled"required>
                                    </div>


                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <div class="bank-details-btn">

                                <button type="submit" class="btn bank-save-btn">حفظ البيانات</button>


                            </div>
                        </div>

                    </form>
                    <!-- Content wrapper end -->
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#add_btn').on('click', function() {
                    var html = '';
                    html += '<tr>';
                    html +=
                        '<td><input class="form-control" type="number" id="installmentNo" name="installmentNo[]"required></td>';
                    html +=
                        '<td><input class="form-control" type="date" id="installment_date" name="installment_date[]"required></td>';
                    html +=
                        '<td><input class="form-control unit_price"  type="number" id="refrenceNo" name="refrenceNo[]"required></td>';
                    html +=
                        '<td><input class="form-control unit_price"  type="date" id="payment_date" name="payment_date[]"required></td>';
                    html +=
                        '<td><input class="form-control unit_price"  type="number" id="amount" name="amount[]"required></td>';
                    html +=
                        '<td><input class="form-control unit_price"  type="text" id="payment_type" name="payment_type[]"required></td>';
                    html +=
                        '<td><button type="button" class="btn btn-danger" id="remove"><i class="fas fa-minus-square"></button></td>';
                    html += '</tr>';
                    $('tbody').append(html);
                });
            });
            $(document).on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });
        </script>
        <script src="{{ URL::asset('assets/vendor/summernote/summernote-bs4.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 170,
                    tabsize: 2
                });
            });
        </script>
        <script src="{{ URL::asset('assets/js/wizard.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/summernote/summernote-bs4.js') }}"></script>

        <script src="{{ URL::asset('assets/js/wizard.js') }}"></script>
        <script>
            function myFunction() {

                var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
                var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
                var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

                var Amount_Commission2 = Amount_Commission;


                if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {


                } else {
                    var intResults = Amount_Commission2 * Rate_VAT / 100;

                    var intResults2 = parseFloat(intResults + Amount_Commission2);

                    sumq = parseFloat(intResults).toFixed(2);

                    sumt = parseFloat(intResults2).toFixed(2);

                    document.getElementById("Value_VAT").value = sumq;

                    document.getElementById("Total").value = sumt;

                }

            }
        </script>

    @endsection
