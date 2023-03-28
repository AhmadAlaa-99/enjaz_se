@extends('layouts.master')
@section('css')

@endsection
@section('title')
    تعديل بيانات الوحدة
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">



            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">تعديل وحدة ايجارية</h5>

                            <form action="{{ route('units.update', $unit->id) }}" method="post"
                                enctype="multipart/form-data"autocomplete="off">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="row gutters">

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="fullName"> عدد الغرف </label>
                                            <input type="number" class="form-control" id="rooms" name="rooms"
                                                value="{{ $unit->rooms }}"placeholder="rooms"required>
                                        </div>

                                        <div class="form-group">
                                            <label class="active" for="eMail">رقم الدور</label>
                                            <input type="number" class="form-control" name="role_number"
                                                value="{{ $unit->role_number }}"placeholder="role_number"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label"> خزائن مطبخ مركبة
                                            </label>
                                            <select name="kitchen_Cabinets" value="{{ $unit->kitchen_Cabinets }}"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option
                                                    value="yes"{{ $unit->kitchen_Cabinets == 'yes' ? 'selected' : '' }}>
                                                    نعم
                                                </option>
                                                <option
                                                    value="no"{{ $unit->kitchen_Cabinets == 'no' ? 'selected' : '' }}>لا
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="sTate"> عدد دورات المياه</label>
                                            <input type="number" class="form-control"value="{{ $unit->bathrooms }}"
                                                name="bathrooms" placeholder="bathrooms"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">تفصيل (يظهر في صفحة العرض)</label>
                                            <textarea type="textarea" class="form-control" name="main_show" required>{{ $unit->main_show }}</textarea>
                                        </div>







                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">نوع الوحدة</label>
                                            <select name="type"value="{{ $unit->type->Name }}"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>

                                                @foreach ($types as $type)
                                                    <option
                                                        value="{{ $type->id }}"{{ $unit->type->Name == $type->id ? 'selected' : '' }}>
                                                        {{ $type->Name }}</option>
                                                @endforeach




                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="ciTy">مساحة الوحدة</label>
                                            <input type="number" class="form-control"
                                                name="size"value="{{ $unit->size }}" placeholder="size"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="sTate">عدد وحدات التكييف</label>
                                            <input type="number" class="form-control"
                                                name="condition_units"value="{{ $unit->condition_units }}"
                                                placeholder="condition_units"required>

                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">رقم فاتورة الكهرباء</label>
                                            <input type="number" value="{{ $unit->elect_number }}" class="form-control"
                                                name="elect_number" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">كلفة الايجار (يظهر في صفحة العرض "بالريال
                                                السعودي")</label>
                                            <input type="text" value="{{ $unit->rent_cost }}" class="form-control"
                                                name="rent_cost" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="addRess">رقم الوحدة</label>
                                            <input type="text" class="form-control" name="number"
                                                value="{{ $unit->number }}"placeholder="number"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">حالة الأثاث
                                            </label>
                                            <select name="furnished_mode"
                                                value="{{ $unit->furnished_mode }}"class="form-control SlectBox"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option
                                                    value="لا يوجد أثاث"{{ $unit->furnished_mode == 'لا يوجد أثاث' ? 'selected' : '' }}>
                                                    غير مؤثثة</option>
                                                <option
                                                    value="جديد"{{ $unit->furnished_mode == 'جديد' ? 'selected' : '' }}>
                                                    مؤثثة جديد</option>
                                                <option
                                                    value="مستعمل"{{ $unit->furnished_mode == 'مستعمل' ? 'selected' : '' }}>
                                                    مؤثثة مستعملة </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">نوع
                                                التكييف</label>
                                            <select name="condition_type"
                                                value="{{ $unit->condition_type }}"class="form-control SlectBox"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--placeholder-->
                                                <option
                                                    value="سبليت"{{ $unit->condition_type == 'سبليت' ? 'selected' : '' }}>
                                                    سبليت</option>
                                                <option
                                                    value="شباك"{{ $unit->condition_type == 'شباك' ? 'selected' : '' }}>
                                                    شباك</option>
                                                <option
                                                    value="مركزي"{{ $unit->condition_type == 'مركزي' ? 'selected' : '' }}>
                                                    مركزي </option>


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="addRess">رفع صورة للعرض</label>
                                            <input type="file" value="{{ $unit->img }}"class="form-control"
                                                name="img" required>
                                        </div>





                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">

                                            <button type="submit" name="submit" name="submit"
                                                class="btn btn-primary">حفظ
                                            </button>
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
