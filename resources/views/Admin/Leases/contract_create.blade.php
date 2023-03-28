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
                   @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <form action="{{ route('rent_contract_store') }}" method="post"
                        enctype="multipart/form-data"autocomplete="off">
                        {{ csrf_field() }}
                        <!--  بيانات العقد -->
                        <div class="form-group">
                            <h2 class="heading">بيانات المالك</h2>
                            <div class="grid">
                                <div class="col-1-2">
                                    <div class="controls">
                                        <input type="text" id="name" class="floatLabel"
                                            value="{{ old('name') }}"name="name"required>
                                        <label class="active" for="street">الاسم</label>
                                    </div>
                                </div>
                                <div class="col-1-2">
                                    <div class="controls">
                                        <input type="text" id="mobile" class="floatLabel"
                                            value="{{ old('mobile') }}"name="mobile"required>
                                        <label class="active" for="eMail">الهاتف</label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid">
                                <div class="col-1-2">
                                    <div class="controls">
                                        <input type="email" id="email" class="floatLabel"
                                            value="{{ old('email') }}"name="email"required>
                                        <label class="active" for="street">البريد</label>
                                    </div>
                                </div>
                                <div class="col-1-2">
                                    <div class="controls">
                                        <input type="text" id="attribute_name" class="floatLabel"
                                            value="{{ old('attribute_name') }}"name="attribute_name">
                                        <label class="active" for="eMail">اسم الوسيط</label>
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
                                        <input type="number" id="contactNo" class="floatLabel"
                                            value="{{ old('contactNo') }}"name="contactNo"required>
                                        <label class="active" for="street">رقم سجل العقد - ID</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="number" id="Amount_Commission" class="floatLabel"
                                            value="{{ old('ejar_cost') }}"name="ejar_cost" onchange="myFunction()" required>
                                        <label class="active" for="street"> كلفة الاستئجار</label>
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
                            @if ($type == 'تجاري')
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
                                            <input type="number" id="Value_VAT" class="floatLabel"
                                                value="{{ old('tax_amount') }}"name="tax_amount"readonly>
                                            <label class="active" for="phone">مبلغ الضريبة</label>
                                        </div>
                                    </div>
                                    <div class="col-1-3">
                                        <div class="controls">
                                            <input type="number" id="Total" class="floatLabel"
                                                value="{{ old('rent_value') }}"name="rent_value"readonly>
                                            <label class="active" for="phone">الكلفة الاجمالية للاستئجار</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="grid">
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="number" id="note" class="floatLabel"
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
                        <!--  بيانات العقد -->
                        <div class="form-group">
                            <h2 class="heading">بيانات المنشأة العقارية</h2>
                            <div class="grid">
                                <div class="col-1-4">
                                    <div class="controls">
                                        <select name="quarter" class="floatLabel" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"required>
                                            <!--placeholder-->
                                            @foreach ($quarters as $qu)
                                                <option value="{{ $qu->id }}"> {{ $qu->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="active" for="street"> الحي</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">

                                        <input type="text" value="" name="address"
                                            class="floatLabel"placeholder=""required>
                                        <label class="active" for="street">العنوان (يظهر في صفحة العرض)</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">
                                        <input type="text" id="realty_name"
                                            class="floatLabel"value="{{ old('realty_name') }}"name="realty_name"
                                            placeholder=""required>
                                        <label class="active" for="eMail">اسم المنشأة</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">
                                        <input type="text" class="floatLabel"name="agency_name"
                                            value="{{ old('agency_name') }}"placeholder="">
                                        <label class="active" for="eMail">اسم الوكيل</label>
                                    </div>
                                </div>


                            </div>



                            <div class="grid">
                                <div class="col-1-4">
                                    <div class="controls">
                                        <input type="number"
                                            class="floatLabel"name="agency_mobile"value="{{ old('agency_mobile') }}"
                                            placeholder=""required>
                                        <label class="active" for="phone">رقم الوكيل</label>
                                    </div>
                                </div>

                                <div class="col-1-4">
                                    <div class="controls">
                                        <select name="use" id="use" class="floatLabel"
                                            onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"required>
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد النوع</option>
                                            <option value="عائلي"> عائلي</option>
                                            <option value="فردي"> افراد</option>
                                        </select>
                                        <label class="active" for="street"> نوع استخدام العقار</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">
                                        <select name="type" id="type" class="floatLabel"
                                            onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"required>
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد النوع</option>
                                            <option value="فيلا"selected> فيلا</option>
                                            <option value="بناء عقاري">بناء</option>
                                        </select>
                                        <label class="active" for="phone">نوع العقار</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">
                                        <input type="number" id="units" class="floatLabel"
                                            value="{{ old('units') }}"name="units"required>
                                        <label class="active" for="street">عدد الوحدات السكنية</label>
                                    </div>
                                </div>

                            </div>

                                <div class="grid">
                                    <div class="col-1-4">
                                        <div class="controls">
                                            <input type="text"
                                                class="floatLabel"name="shopsNo"value="0"
                                                placeholder=""required>
                                            <label class="active" for="phone">عدد الوحدات التجارية</label>
                                        </div>
                                    </div>
                                </div>

                            <div class="grid">

                                <div class="col-1-4">
                                    <div class="controls">
                                        <input type="number" class="floatLabel"name="roles"
                                            value="{{ old('roles') }}"placeholder=""required>
                                        <label class="active" for="eMail">عدد الأدوار</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">
                                        <input type="text"
                                            class="floatLabel"name="size"value="{{ old('size') }}"
                                            placeholder=""required>
                                        <label class="active" for="phone">المساحة</label>
                                    </div>
                                </div>

                                <div class="col-1-4">
                                    <div class="controls">
                                        <select name="elevator"value="{{ old('elevator') }}" id="type"
                                            class="floatLabel" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"required>
                                            <!--placeholder-->
                                            <option value="" selected disabled>توفر مصاعد</option>
                                            <option value="yes"selected> نعم</option>
                                            <option value="no">لا</option>
                                        </select>
                                        <label class="active" for="eMail">مصاعد</label>
                                    </div>
                                </div>
                                <div class="col-1-4">
                                    <div class="controls">
                                        <select name="parking"value="{{ old('parking') }}" id="type"
                                            class="floatLabel" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"required>
                                            <!--placeholder-->
                                            <option value="" selected disabled>توفر مواقف</option>
                                            <option value="yes"selected> نعم</option>
                                            <option value="no">لا</option>
                                        </select>
                                        <label class="active" for="eMail">مواقف</label>
                                    </div>
                                </div>

                            </div>
                            <div class="grid">
                                <div class="col-2-3">
                                    <div class="controls">
                                        <input type="text" width="100px"height="100px"id="st_rental_date"
                                            class="floatLabel" value="{{ old('advantages') }}"name="advantages"
                                            placeholder=""required>
                                        <label class="active" for="eMail">المميزات</label>
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

                                            <button type="submit" name="action"value="save"class="btn bank-save-btn">حفظ البيانات</button>
@if ($type == 'سكني')
                                            <button type="submit" name="action"value="save_and_add_com" class="btn bank-save-btn">حفظ البيانات واضافة عقد تجاري للمنشأة</button>
@endif



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
