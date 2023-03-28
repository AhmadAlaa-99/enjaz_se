@extends('layouts.master')
@section('css')

@endsection
@section('title')

@stop
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row justify-content-lg-center">
                <div class="col-lg-10">


                    <div class="profile-cover">
                        <div class="profile-cover-wrap">
                            <img class="profile-cover-img" src="assets/img/profiles/avatar-02.jpg" alt="Profile Cover">



                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                            <img class="avatar-img" src="assets/img/profiles/avatar-02.jpg" alt="Profile Image">
                            <input type="file" id="avatar_upload">

                        </label>
                        <h2> <i class="fas fa-certificate text-primary small" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Verified"></i></h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="far fa-building"></i> <span>Hafner Pvt Ltd.</span>
                            </li>
                            <li class="list-inline-item">
                                <i class="fas fa-map-marker-alt"></i> West Virginia, US
                            </li>
                            <li class="list-inline-item">
                                <i class="far fa-calendar-alt"></i> <span>Joined November 2017</span>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>change password</span>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0">
                                        <li class="py-0">
                                            <h6>About</h6>
                                        </li>
                                        <li>

                                        </li>
                                        <li>
                                            Hafner Pvt Ltd.
                                        </li>
                                        <li class="pt-2 pb-0">
                                            <h6>Contacts</h6>
                                        </li>
                                        <li>
                                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="72111a13001e17011a13141c170032170a131f021e175c111d1f">[email&#160;protected]</a>
                                        </li>
                                        <li>
                                            +1 (304) 499-13-66
                                        </li>
                                        <li class="pt-2 pb-0">
                                            <h6>Address</h6>
                                        </li>
                                        <li>
                                            4663 Agriculture Lane,<br>
                                            Miami,<br>
                                            Florida - 33165,<br>
                                            United States.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Profile</h5>
                                </div>
                                <div class="card-body card-body-height">

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
