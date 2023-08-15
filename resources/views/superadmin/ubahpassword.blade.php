@extends('template')

@section('main')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Change Password</h5>
            @include('pesan')
            <div class="row">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Generate Password</h1>
                        <label for="length">Password Length:</label>
                        <input type="number" id="length" min="6" max="20" value="8">
                        <br>
                        <br>
                        <button onclick="generatePassword()">Generate</button>
                        <br>
                        <br>
                        <label for="password">Generated Password:</label>
                        <form action="/superadmin/update_password" method="POST">
                            @csrf
                            <input type="hidden" name='user_id' value="{{ $userss->id }}">
                            <div class="form-group">
                                <label>New Password <span class="login-danger">*</span></label>
                                <input class="form-control pass-input" type="text" name="password" id="password"
                                    value="{{ $password }}" autofocus>
                                <span class="profile-views feather-eye toggle-password"
                                    onclick="togglePasswordVisibility()"></span>
                            </div>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
