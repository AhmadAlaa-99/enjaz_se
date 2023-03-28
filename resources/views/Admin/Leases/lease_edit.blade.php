@extends('layouts.master')
@section('css')
    <!-- Steps Wizard CSS -->

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/summernote/summernote-bs4.css') }}" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/wizard.css') }}">
@endsection
@section('title')
    تعديل بيانات العقد
@stop

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title"></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"></a></li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="invoices.html" class="invoices-links active">
                        </a>
                        <a href="invoice-grid.html" class="invoices-links">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Page header start -->

            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <form action="{{ route('lease_update') }}" method="post" enctype="multipart/form-data"autocomplete="off">
                    {{ csrf_field() }}
                    <!--  بيانات العقد -->
                    <div class="form-group">
                        <h2 class="heading">بيانات العقد</h2>
                        <div class="grid">
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="hidden" value="{{ $unit->id }}"name="unit_id">
                                    <input type="hidden" value="{{ $realty->id }}"name="realty_id">
                                    <input type="hidden" value="{{ $lease->id }}"name="lease_id">

                                    <input type="hidden" value="{{ $tenant->id }}"name="tenant_id">


                                    <input type="text" id="reco_number" class="floatLabel"
                                        value="{{ $lease->reco_number }}"name="reco_number"readonly>
                                    <label class="active" for="street">رقم سجل العقد - ID</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" id="place" class="floatLabel"
                                        value="{{ $lease->place }}"name="place">
                                    <label class="active" for="eMail"> مكان ابرام العقد</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" id="place" class="floatLabel"
                                        value="{{ $lease->fee }}"name="fee"required>
                                    <label class="active" for="eMail">رسوم العقد (تدفع لمرة واحدة)</label>
                                </div>
                            </div>


                        </div>

                        <div class="grid">
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="date" id="le_date" class="floatLabel"value="{{ $lease->le_date }}"
                                        name="le_date"required>
                                    <label class="active" for="phone">تاريخ ابرام العقد</label>
                                </div>
                            </div>

                            <div class="col-1-3">

                                <div class="controls">
                                    <input type="date" id="st_rental_date" class="floatLabel"
                                        value="{{ $lease->st_rental_date }}"name="st_rental_date"required>
                                    <label class="active" for="eMail">تاريخ بداية مدة الايجار</label>
                                </div>
                            </div>

                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="date" id="end_rental_date" class="floatLabel"
                                        value="{{ $lease->end_rental_date->format('Y-m-d') }}"name="end_rental_date"required>
                                    <label class="active" for="phone">تاريخ نهاية مدة الايجار</label>
                                </div>
                            </div>
                        </div>
                         <div class="grid">
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" id="account_number" class="floatLabel"
                                        value="{{$lease->account_number}}"name="account_number"required>
                                    <label class="active" for="street">رقم الحساب</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" id="insurance" class="floatLabel"
                                        value="{{$lease->insurance}}"name="insurance">
                                    <label class="active" for="eMail">رقم التأمين</label>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="controls">
                                    <input type="text" id="water" class="floatLabel"
                                        value="{{$lease->water}}"name="water"required>
                                    <label class="active" for="eMail">عداد المياه</label>
                                </div>
                            </div>


                        </div>

                    </div>




                    <!--  بيانات المستأجر -->
                    <div class="form-group">
                        <h2 class="heading">بيانات المستأجر</h2>
                        <div class="grid">
                            <div class="col-1-4">
                                <div class="controls">

                                    <input type="text" name="t_name"
                                        value="{{ $tenant->user->name }}"class="floatLabel"required>
                                    <label class="active" for="street">الاسم الكامل</label>

                                </div>
                            </div>
                            <div class="col-1-4">
                                <div class="controls">
                                    <select name="nationalitie_id" class="floatLabel"
                                        onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')"value="{{ $tenant->user->nationalitie_id }}"required>
                                        <!--placeholder-->
                                        @foreach ($nationals as $national)
                                            <option value="{{ $national->id }}"> {{ $national->Name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="active" for="street"> الجنسية</label>

                                </div>
                            </div>
                            <div class="col-1-4">
                                <div class="controls">
                                    <select name="t_gender" class="floatLabel" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')"value="{{ $tenant->user->gender }}"required>
                                        <!--placeholder-->

                                        <option value="female">Female</option>
                                        <option value="male">Male</option>

                                    </select>
                                    <label class="active" for="street"> الجنس</label>

                                </div>
                            </div>


                            <div class="col-1-4">
                                <div class="controls">
                                    <input type="text"
                                        name="t_ID_num"value="{{ $tenant->user->ID_num }}"class="floatLabel"required>
                                    <label class="active" for="eMail">رقم الهوية</label>
                                    @error('t_ID_num')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="col-1-4">
                                <div class="controls">
                                    <select name="t_ID_type" class="floatLabel" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')"value="{{ $tenant->user->ID_type }}"required>
                                        <!--placeholder-->

                                        <option value="civilian">سجل مدني</option>
                                        <option value="stay">اقامة</option>


                                    </select>
                                    <label class="active" for="street">نوع الهوية</label>

                                </div>
                            </div>


                            <div class="col-1-4">
                                <div class="controls">
                                    <input type="email" name="t_email"
                                        value="{{ $tenant->user->email }}"class="floatLabel"required>
                                    <label class="active" for="eMail"> البريد الالكتروني</label>
                                </div>
                            </div>
                            <div class="col-1-4">
                                <div class="controls">
                                    <input type="text" name="t_phone"
                                        value="{{ $tenant->user->phone }}"class="floatLabel"required>
                                    <label class="active" for="eMail">رقم الجوال</label>

                                </div>

                            </div>
                            @error('t_phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-1-4">
                                <div class="controls">
                                    @error('t_telephone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="t_telephone"
                                        value="{{ $tenant->user->telephone }}"class="floatLabel">

                                    <label class="active" for="eMail">رقم الهاتف</label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h2 class="heading"> بيانات المنشأة العقارية</h2>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped m-0">
                                                <thead>
                                                    <tr>
                                                        <th> اسم المنشأة :</br></br> {{ $realty->realty_name }}</th>
                                                        <th> الحي : </br></br> {{ $realty->quarters->name }}</th>
                                                        <th> نوع العقار : </br> </br>{{ $realty->type }}</th>
                                                        <th>الوحدات السكنية</br> </br>{{ $realty->units }}</th>
                                                        <th> الوحدات التجارية :</br> </br>{{ $realty->shopsNo }}</th>
                                                        <th> الادوار : </br></br>{{ $realty->roles }}</th>
                                                        <th> المساحة : </br></br>{{ $realty->size }}</th>
                                                        <th> الاستخدام : </br> </br>{{ $realty->use }}</th>
                                                        <th> المميزات :</br></br> {{ $realty->advantages }}</th>



                                                    </tr>
                                                </thead>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--  بيانات الوحدة الايجارية -->

                        <div class="form-group">
                            <h2 class="heading"> بيانات الوحدة الايجارية</h2>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped m-0">
                                                <thead>
                                                    <tr>
                                                        <th> رقم الوحدة :</br></br> {{ $unit->number }}</th>
                                                        <th> رقم الدور : </br></br> {{ $unit->role_number }}</th>
                                                        <th> نوع الوحدة : </br> </br>{{ $unit->type->Name }}</th>
                                                        <th> مساحة الوحدة :</br> </br>{{ $unit->size }}</th>
                                                        <th> حالة الأثاث : </br></br>{{ $unit->furnished_mode }}</th>
                                                        <th> خزائن مطبخ : </br></br>{{ $unit->kitchen_Cabinets }}</th>
                                                        <th> نوع التكييف : </br> </br>{{ $unit->condition_type }}</th>
                                                        <th> عدد وحدات التكييف : </br> </br>{{ $unit->condition_units }}
                                                        </th>
                                                        <th> عدد دورات المياه :</br></br> {{ $unit->bathrooms }}</th>
                                                        <th> تفاصيل :</br></br> {{ $unit->details }}</th>
                                                    </tr>
                                                </thead>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                       <div class="form-group">
                        <h2 class="heading">بيانات الوحدة الايجارية</h2>
                          <div class="grid">
                          <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="number" name="number" value="{{ $unit->number }}" class="floatLabel"readonly>
                               <label class="active" for="eMail">رقم الوحدة</label>
                              </div>
                            </div>

                            <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="role_number" name="role_number" value="{{ $unit->role_number }}" class="floatLabel"readonly>
                               <label class="active" for="eMail"> رقم الدور</label>
                              </div>
                            </div>

                            <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="type" name="type" value="{{ $unit->type }}" class="floatLabel"readonly>
                               <label class="active" for="eMail"> نوع الوحدة</label>
                              </div>
                            </div>

                            <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="size" name="size" value="{{ $unit->size }}" class="floatLabel"readonly>
                               <label class="active" for="street">مساحة الوحدة</label>
                              </div>
                            </div>






                          </div>
                          <div class="grid">
                          <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="furnished_mode" name="furnished_mode" value="{{ $unit->furnished_mode }}"readonly>
                               <label class="active" for="street">حالة الأثاث</label>
                              </div>
                            </div>

                            <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="kitchen_Cabinets" name="kitchen_Cabinets" value="{{ $unit->kitchen_Cabinets }}" class="floatLabel"readonly>
                               <label class="active" for="eMail"> خزائن مطبخ مركبة</label>
                              </div>
                            </div>
                            <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="condition_type" name="condition_type" value="{{ $unit->condition_type }}" class="floatLabel"readonly>
                               <label class="active" for="eMail">نوع التكييف</label>
                              </div>
                            </div>

                            <div class="col-1-4">
                              <div class="controls">
                               <input type="text" id="condition_units" name="condition_units" value="{{ $unit->condition_units }}" class="floatLabel"readonly>
                               <label class="active" for="eMail">عدد وحدات التكييف</label>
                              </div>
                            </div>
                          </div>
                          <div class="grid">
                          <div class="col-1-3">
                              <div class="controls">
                               <input type="text" id="water_number" name="water_number" value="{{ $unit->weater_number }}" class="floatLabel" readonly>
                               <label class="active" for="street"> رقم عداد المياه</label>
                              </div>
                            </div>
                            <div class="col-1-3">
                              <div class="controls">
                               <input type="text"  id="Elecrtricity_number" name="Elecrtricity_number" value="{{ $unit->Elecrtricity_number }}" class="floatLabel"readonly>
                               <label class="active" for="eMail"> رقم عداد الكهرباء</label>
                              </div>
                            </div>
                            <div class="col-1-3">
                              <div class="controls">
                               <input type="date" id="bathrooms"  name="bathrooms" value="{{ $unit->bathrooms }}" class="floatLabel"readonly>
                               <label class="active" for="eMail"> عدد دورات المياه</label>
                              </div>
                            </div>

                          </div>
                          <div class="grid">
                          <div class="col-1-1">
                              <div class="controls">
                               <input type="text" id="details" name="details" value="{{ $unit->details }}" class="floatLabel"readonly >

                               <label class="active" for="street"> تفاصيل </label>
                              </div>
                            </div>
                          </div>
                      </div>


                                <!--  البيانات المالية -->
                        <div class="form-group">
                            <h2 class="heading">البيانات المالية</h2>
                            <div class="grid">
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" name="ejar_cost" id="Amount_Commission"
                                            onchange="myFunction()"
                                            class="floatLabel"value="{{ $lease->financial->ejar_cost }}"required>
                                        <label class="active" for="eMail"> قيمة العقد</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <select name="payment_cycle"id="payment_cycle"class="floatLabel"
                                            onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"requiredvalue="{{ $lease->financial->payment_cycle }}">
                                            <!--placeholder-->
                                            <option value="quarterly">ربع سنوي</option>
                                            <option value="midterm">نصف سنوي</option>
                                            <option value="monthly">شهري</option>
                                            <option value="annual">سنوي</option>

                                        </select>
                                        <label class="active" for="fruit">دورة سداد الايجارٍ</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" name="num_rental_payments"
                                            value="{{ $lease->financial->num_rental_payments }}"class="floatLabel"required>
                                        <label class="active" for="eMail">عدد دفعات الايجار</label>
                                    </div>
                                </div>




                                <div class="grid">


                                    <div class="col-1-2">
                                        <div class="controls">
                                            <select name="payment_channels"id="payment_channels"class="floatLabel"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"value="{{ $lease->financial->payment_channels }}"required>
                                                <!--placeholder-->
                                                <option value="كاش">كاش</option>
                                                <option value="فيزا ">فيزا</option>
                                                <option value="بنك">بنك</option>
                                            </select>
                                            <label class="active" for="eMail">طريقة دفع الرسوم</label>
                                        </div>
                                    </div>
                                    <div class="col-1-2">
                                        <div class="controls">
                                            <input type="text" name="recurring_rent_payment"
                                                value="{{ $lease->financial->recurring_rent_payment }}"class="floatLabel"required>
                                            <label class="active" for="eMail"> دفعة الايجار الدورية</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid">
                                    <div class="col-2-3">
                                        <div class="controls">
                                            <input type="text" name="notes"
                                                value="{{ $lease->financial->notes }}"class="floatLabel">
                                            <label class="active" for="eMail"> ملاحظات </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @if ($unit->type->Name == 'محل تجاري')
                            <div class="grid">
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="Rate_VAT"
                                            class="floatLabel"value="15%"name="tax"readonly>
                                        <label class="active" for="street">نسبة الضريبة </label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="Value_VAT"name="tax_ammount"
                                            class="floatLabel"value="{{ $lease->financial->tax_ammount }}"required>
                                        <label class="active" for="eMail">مبلغ الضريبة</label>
                                    </div>
                                </div>
                                <div class="col-1-3">
                                    <div class="controls">
                                        <input type="text" id="Total"name="rent_value"
                                            class="floatLabel"value="{{ $lease->financial->rent_value }}"required>
                                        <label class="active" for="eMail">اجمالي قيمة العقد</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endif
                    <!--   جدول سداد الدفعات -->
                    <div class="form-group">
                        <h2 class="heading">جدول سداد الدفعات</h2>
                             <h3> تنويه : القسط الأول والثاني يتضمن قسط المياه السنوي وقدره الف ريال سعودي </h3>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-center add-table-items" id="tableEstimate">
                                            <thead>
                                                <tr>
                                                    <th>تاريخ الاصدار</th>
                                                    <th>تاريخ الاستحقاق</th>
                                                    <th>اجمالي القيمة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($payments as $payment)
                                                    <tr>
                                                        <td><input class="form-control"
                                                                value="{{ $payment->release_date->format('Y-m-d') }}"type="date"
                                                                id="release_date" name="release_date[]"readonly></td>
                                                        <td><input class="form-control"
                                                                value="{{ $payment->due_date }}"type="date"
                                                                id="due_date" name="due_date[]"required></td>
                                                        <td><input class="form-control unit_price"
                                                                value="{{ $payment->total }}" type="text"
                                                                id="total" name="total[]"required></td>
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








                    <div class="form-group">
                        <h2 class="heading">التزامات الأطراف</h2>
                        <textarea name="desc" id="your_summernote" class="form-control" rows="4">{{$Commitment->desc }}</textarea>
                    </div>

                            <!-- التزامات الأطراف -->
                            <div class="form-group">
                                <h2 class="heading"> مرفقات العقد</h2>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                        <div class="mb-3">
                                            <input class="form-control"
                                                name="docFile" accept=".pdf,.jpg, .png, image/jpeg, image/png"type="file"
                                                id="formFileDisabled">
                                        </div>


                                    </div>
                                </div>

                            </div>
                    <div class="form-group">
                        <button type="submit" value="Submit" class="col-1-4">حفظ البيانات</button>
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
                    '<td><button type="button" class="btn btn-danger" id="remove"><i class="fas fa-plus-circle"></button></td>';
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>

@endsection
