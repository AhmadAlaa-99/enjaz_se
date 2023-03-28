@extends('layouts.master')
@section('css')
    <link rel="stylesheet"href="{{ URL::asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('title')
    الوحدات الايجارية في الموقع
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
                                            <li><a href="{{ url('/' . ($page = 'Admin/realties')) }}">المنشأت العقارية</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/rented_units')) }}">الوحدات
                                                    المؤجرة</a></li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/empty_units')) }}">الوحدات الشاغرة</a>
                                            </li>
                                            <li><a href="{{ url('/' . ($page = 'Admin/site_units')) }}"
                                                    class="active">الوحدات النشطة في الموقع</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="invoices-settings-btn">
                                        <a href="invoices-settings.html" class="invoices-settings-icon">
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $units->links() !!}
                </div>
                <div class="row">
                    @forelse ($units as $unit)
                        <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                            <div class="blog grid-blog flex-fill">
                                <div class="blog-image">
                                    <a href=""><img class="img-fluid" style="height:230px;width:407px;"
                                            src="{{ asset('units/' . $unit->img) }}" alt="Post Image"></a>
                                    <div class="blog-views">
                                        <i class="feather-eye me-1"></i> {{ $unit->size }} مساحة الوحدة
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="profile.html">
                                                    <span>
                                                        <span class="post-title">{{ $unit->rent_cost }} </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">
                                            {{ $unit->main_show }}</a></h3>
                                    <p>{{ $unit->address }}
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="edit-options">
                                        <div class="edit-delete-btn">
                                            <span class="badge badge-success">{{ $unit->bathrooms }} دورات المياه </span>
                                            <span class="badge badge-danger">{{ $unit->rooms }} عدد
                                                الغرف</span>

                                            <span class="badge badge-warning">{{ $unit->type->Name }} </span>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

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
