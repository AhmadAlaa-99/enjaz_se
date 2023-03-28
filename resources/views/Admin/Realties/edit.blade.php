@extends('layouts.master')
@section('css')

@endsection
@section('title')
تعديل منشأة عقارية
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <div class="card-body">

                            <h5 class="card-title">تعديل منشأة عقارية / {{ $realty->realty_name }}</h5>

                            <form action="{{ route('realties.update', $realty->id) }}" method="post"
                                enctype="multipart/form-data"autocomplete="off">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">


                                        <div class="form-group">
                                            <label class="active" for="eMail">الحي</label>
                                             <select name="quarter" class="form-control SlectBox" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')"required>
                                            <!--placeholder-->
                                            @foreach ($quarters as $qu)
                                                <option value="{{ $qu->id }}"> {{ $qu->name }}</option>
                                            @endforeach
                                        </select>

                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="phone"> عدد الوحدات السكنية</label>
                                            <input type="number" class="form-control" name="units"
                                                value="{{ $realty->units }}"required>
                                        </div>
                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label"> نوع بناء العقار
                                            </label>
                                            <select name="type" value="{{ $realty->type }}"id="type"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--value-->
                                                <option value="بناء عقاري"{{ $realty->type == 'بناء عقاري' ? 'selected' : '' }}>
                                                    بناء</option>
                                                <option value="فيلا"{{ $realty->type == 'فيلا' ? 'selected' : '' }}> فيلا
                                                </option>

                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label class="active" for="phone">العنوان (يظهر في صفحة العرض)</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $realty->address }}"required>
                                        </div>
                                         <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">توفر مواقف
                                            </label>
                                            <select name="parking" value="{{ $realty->parking }}"id="parking"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--value-->
                                                <option value="yes"{{ $realty->parking == 'yes' ? 'selected' : '' }}>
                                                    لا</option>
                                                <option value="no"{{ $realty->parking == 'no' ? 'selected' : '' }}> نعم
                                                </option>

                                            </select>
                                        </div>





                                    </div>


                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="eMail">اسم المنشأة</label>
                                            <input type="text" class="form-control" name="realty_name"
                                                value="{{ $realty->realty_name }}"required>
                                        </div>




                                        <div class="form-group">
                                            <label class="active" for="phone"> عدد الوحدات التجارية</label>
                                            <input type="number" class="form-control" name="shopsNo"
                                                value="{{ $realty->shopsNo }}"required>
                                        </div>


                                        <div class="form-group">
                                            <label class="active" for="phone"> عدد الأدوار</label>
                                            <input type="number" class="form-control" name="roles"
                                                value="{{ $realty->roles }}"required>
                                        </div>
                                         <div class="form-group">
                                            <label class="active" for="phone">اسم الوكيل</label>
                                            <input type="text" class="form-control" name="agency_name"
                                                value="{{ $realty->agency_name }}"required>
                                        </div>
                                         <div class="form-group">
                                            <label class="active" for="inputName" class="control-label">توفر مصاعد
                                            </label>
                                            <select name="elevator" value="{{ $realty->elevator }}"id="elevator"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--value-->
                                                <option value="yes"{{ $realty->elevator == 'yes' ? 'selected' : '' }}>
                                                    لا</option>
                                                <option value="no"{{ $realty->elevator == 'no' ? 'selected' : '' }}> نعم
                                                </option>

                                            </select>
                                        </div>



                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label class="active" for="phone"> المساحة </label>
                                            <input type="number" class="form-control" name="size"
                                                value="{{ $realty->size }}"required>
                                        </div>

                                        <div class="form-group">
                                            <label class="active" for="inputName" class="control-label"> نوع استخدام العقار
                                            </label>
                                            <select name="use" value="{{ $realty->use }}"id="use"
                                                class="form-control SlectBox" onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')"required>
                                                <!--value-->
                                                <option value="عائلي" {{ $realty->use == 'عائلي' ? 'selected' : '' }}>
                                                    عائلي</option>
                                                <option value="فردي"
                                                    {{ $realty->use == 'فردي' ? 'selected' : '' }}> افراد</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="active" for="phone"> المميزات </label>
                                            <input type="text" class="form-control" name="advantages"
                                                value="{{ $realty->advantages }}"required>
                                        </div>
                                          <div class="form-group">
                                            <label class="active" for="phone">رقم الوكيل</label>
                                            <input type="number" class="form-control" name="agency_mobile"
                                                value="{{ $realty->agency_mobile }}"required>
                                        </div>






                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" name="submit" class="btn btn-success">حفظ</button>
                                        </div>

                                    </div>
                            </form>
                            </section>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

@endsection
