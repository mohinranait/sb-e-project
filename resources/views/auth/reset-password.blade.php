@extends("layouts.auth-template")

@section('login-body')

    <!-- This is form html code start -->
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse mg-b-20">
                <span class="tx-normal">[</span> Admin <span class="tx-info"></span> <span class="tx-normal">]</span>
            </div>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class='form-group'>
                    <label for="email" >Email </label>
                    <input id="email" class="form-control" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input id="password" class="form-control" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>

                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-block">Reset Password</button>
                </div>
            </form>

        </div>
    </div>

@endsection