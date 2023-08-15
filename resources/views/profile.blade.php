@extends('template')

@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header"
                style="background-image: url('/img/bg/bg-profile.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#">
                            <img class="rounded-circle" alt="User Image" src="/img/profile/default.jpg">
                        </a>
                    </div>
                    <div class="col ms-md-n2 profile-user-info">
                        <h4 class="user-name mb-0" style="color: white;">{{ $userall->name }}</h4>
                        <h6 style="color: white;">{{ $userall->username }}</h6>
                    </div>
                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span>
                                    </h5>
                                    @include('pesan')
                                    <form action="/home/profile_update/{{ $userall->id }}" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="{{ $userall->id }}">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $userall->email }}" required autofocus>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            @include('pesan')
                            <div class="row">
                                {{-- <div class="col-md-10 col-lg-6"> --}}
                                <div class="login-right">
                                    <div class="login-right-wrap">
                                        <form action="/home/password_update/{{ $userall->id }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>New Password <span class="login-danger">*</span></label>
                                                <input class="form-control pass-input" type="password" name="password" id="password"
                                                    autofocus>
                                                <span class="profile-views feather-eye toggle-password"></span>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
