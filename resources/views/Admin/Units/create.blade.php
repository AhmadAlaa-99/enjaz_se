@extends('layouts.master')
@section('css')

@endsection
@section('title')
    اضافة وحدة ايجارية
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session()->has('max'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('max') }}</strong>
                            </div>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">اضافة وحدة ايجارية / {{ $realty->realty_name }}</h3>
                            <form action="{{ route('realty_units_store', $realty->id) }}" method="post"
                                enctype="multipart/form-data"autocomplete="off">
                                {{ csrf_field() }}
                                <div class="row gutters">

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="fullName"> عدد الغرف </label>
                                            <input type="number" class="form-control" id="rooms" name="rooms"
                                                value="{{ old('rooms') }}"placeholder="rooms"required>
                                        </div>

                                        <div class="form-group">
                                            <label class="active" for="eMail">رقم الدور</label>
                                            <input type="number" class="form-control" name="role_number"
                                                value="{{ old('role_number') }}"placeholder="role_number"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label"> خزائن مطبخ مركبة
                                            </label>
                                            <select name="kitchen_Cabinets"value="{{ old('kitchen_Cabinets') }}"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option value="" selected disabled>مركبة؟؟</option>
                                                <option value="yes"> نعم</option>
                                                <option value="no"> لا</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="sTate"> عدد دورات المياه</label>
                                            <input type="number" class="form-control"value="{{ old('bathrooms') }}"
                                                name="bathrooms" placeholder="bathrooms"required>
                                        </div>

                                        <div class="form-group">
                                            <label class="active" for="addRess">تفصيل (يظهر في صفحة العرض)</label>
                                            <textarea type="textarea" class="form-control" name="main_show" required></textarea>
                                        </div>

                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">نوع الوحدة</label>
                                            <select name="type"value="{{ old('type') }}" class="form-control SlectBox"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option value="" selected disabled>حدد النوع</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->Name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="ciTy">مساحة الوحدة</label>
                                            <input type="number" class="form-control"
                                                name="size"value="{{ old('size') }}" placeholder="size"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="sTate">عدد وحدات التكييف</label>
                                            <input type="number" class="form-control"
                                                name="condition_units"value="{{ old('condition_units') }}"
                                                placeholder="condition_units"required>

                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">رقم فاتورة الكهرباء</label>
                                            <input type="number" class="form-control" name="elect_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">كلفة الايجار (يظهر في صفحة العرض "بالريال
                                                السعودي")</label>
                                            <input type="number" class="form-control" name="rent_cost" required>
                                        </div>






                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="addRess">رقم الوحدة</label>
                                            <input type="text" class="form-control" name="number"
                                                value=""placeholder="number"required>
                                        </div>


                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">حالة الأثاث
                                            </label>
                                            <select name="furnished_mode"
                                                value="{{ old('furnished_mode') }}"class="form-control SlectBox"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option value="" selected disabled>حدد الحالة</option>
                                                <option value="لا يوجد أثاث"> غير مؤثثة</option>
                                                <option value="جديد"> جديد</option>
                                                <option value="مستعمل"> مستعمل</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">نوع
                                                التكييف</label>
                                            <select name="condition_type"
                                                value="{{ old('condition_type') }}"class="form-control SlectBox"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option value="" selected disabled>حدد النوع</option>
                                                <option value="سبليت">سبليت</option>
                                                <option value="شباك">شباك</option>
                                                <option value="مركزي"> مركزي</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">رفع صورة للعرض</label>
                                            <input type="file" class="form-control" name="img" required>
                                        </div>







                                    </div>


                                    <div class="modal-footer">
                                        <div class="bank-details-btn">
                                            <button type="submit"
                                                name="action"value="save_more"class="btn bank-save-btn">حفظ واضافة
                                                المزيد</button>
                                            <button type="submit"
                                                name="action"value="save_close"class="btn bank-save-btn">حفظ
                                                واغلاق</button>
                                        </div>
                                    </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
