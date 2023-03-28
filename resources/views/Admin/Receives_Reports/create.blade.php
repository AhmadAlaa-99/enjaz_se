@extends('layouts.master')
@section('css')

@endsection
@section('title')
طلب تسليم
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">



                    <div class="card">
                        <div class="card-body">
                            <div class="bank-inner-details">
                                <div class="row">

                                    <form action="{{ route('receives_reports.store') }}" method="post"
                                        enctype="multipart/form-data"autocomplete="off">
                                        {{ csrf_field() }}
                                        <div class="card m-0">

                                              <div class="card-body">

                                                <div class="row gutters">
                                                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">تاريخ التسليم</label>
                                                        <input type="date"
                                                            class="form-control"value="{{ old('receive_date') }}"
                                                            name="receive_date">
                                                        <input type="hidden"value="{{ $lease->id }}" name="lease_id">

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">حالة الوحدة</label>
                                                        <textarea type="text" class="form-control" value="{{ old('maint_status') }}"name="maint_status"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">تصفية الفواتير</label>
                                                        <textarea type="textarea" class="form-control" value="{{ old('paymennts_status') }}"name="paymennts_status"></textarea>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">ملاحظات</label>

                                                        <textarea type="textarea" class="form-control" value="{{ old('notes') }}"name="notes"></textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class=" blog-categories-btn pt-0">
                                                    <div class="bank-details-btn ">
                                                        <button type="submit" id="submit" name="submit"
                                                            class="btn btn-primary float-right">اكمال الطلب </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--
                                            <div class="row gutters">



                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">تاريخ التسليم</label>
                                                        <input type="date"
                                                            class="form-control"value="{{ old('receive_date') }}"
                                                            name="receive_date">
                                                        <input type="hidden"value="{{ $lease->id }}" name="lease_id">

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">حالة الوحدة</label>
                                                        <textarea type="text" class="form-control" value="{{ old('maint_status') }}"name="maint_status"></textarea>
                                                    </div>

                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">تصفية الفواتير</label>
                                                        <textarea type="textarea" class="form-control" value="{{ old('paymennts_status') }}"name="paymennts_status"></textarea>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="active" for="ciTy">ملاحظات</label>

                                                        <textarea type="textarea" class="form-control" value="{{ old('notes') }}"name="notes"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="text-right">

                                                        <button type="submit" name="submit" name="submit"
                                                            class="btn btn-dark">حفظ</button>
                                                    </div>
                                                </div>

                                            </div>
                                        -->
                                        </div>
                                    </form>
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

@endsection
