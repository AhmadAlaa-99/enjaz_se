@extends('layouts.master')
@section('css')
   <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
طلب صيانة
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
                                    <form action="{{ route('request_send') }}" method="post"
                                        enctype="multipart/form-data"autocomplete="off">
                                        {{ csrf_field() }}

                                        <div class="card m-0">
                                            <div class="card-header">
                                                <h3>طلب صيانة</h3>

                                            </div>
                                        </br>
                                            <div class="card-body">

                                                <div class="row gutters">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label>نوع الصيانة </label>
                                                            <select name="type" class="form-control"
                                                                onclick="console.log($(this).val())"
                                                                onchange="console.log('change is firing')"required>
                                                                <!--placeholder-->

                                                                <option value="كهرباء">كهرباء</option>
                                                                <option value="مياه">مياه</option>
                                                                <option value="غاز">غاز</option>

                                                            </select>



                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="message" value="{{ old('desc') }}"name="desc"placeholder="تفاصيل الطلب"
                                                                maxlength="140" rows="3"></textarea>
                                                            <div class="form-text text-muted">
                                                                <p id="characterLeft" class="help-block ">لا يحب ان يتجاوز
                                                                    140 حرف</p>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class=" blog-categories-btn pt-0">
                                                    <div class="bank-details-btn ">
                                                        <button type="submit" id="submit" name="submit"
                                                            class="btn btn-primary float-right">ارسال الطلب </button>
                                                    </div>
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
        </div>
    </div>
@endsection
@section('js')
      <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection
