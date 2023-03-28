@extends('layouts.master')
@section('css')

@endsection
@section('title')
تعديل طلب تسليم
@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">



                    <div class="card">
                      <div class="card-body">
                                                                                    <h3 class="page-title">تعديل طلب تسليم  </h3>

                        <form action="{{ route('receives_reports.update', $receive->id) }}" method="post"
                            enctype="multipart/form-data"autocomplete="off">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}

                            <div class="row gutters">

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label class="active" for="ciTy">تاريخ التسليم</label>
                                        <input type="date" class="form-control" name="receive_date"
                                            value="{{ $receive->receive_date }}"required>
                                        <input type="hidden" name="lease_id" value="{{ $receive->lease_id }}"required>

                                    </div>



                                    <div class="form-group">
                                        <label class="active" for="ciTy">حالة الوحدة</label>
                                        <textarea type="name" class="form-control" name="maint_status" value="{{ $receive->maint_status }}"required></textarea>
                                    </div>



                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label class="active" for="ciTy">تصفية الفواتير</label>
                                        <textarea type="name" class="form-control" name="paymennts_status" value="{{ $receive->paymennts_status }}"required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="active" for="ciTy">ملاحظات</label>
                                        <textarea type="name" class="form-control" name="notes" value="{{ $receive->notes }}"required></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">

                                        <button type="submit" name="submit" class="btn btn-dark">حفظ</button>
                                    </div>
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
