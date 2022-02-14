@extends("layouts.auth-template")

@section('login-body')

    <!-- your admin register page code start -->
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo  tx-center tx-28 tx-bold tx-inverse  mg-b-20">
                <span class="tx-normal">[</span> Register<span class="tx-info">Admin</span> <span class="tx-normal">]</span>
            </div>
            

            <!-- register form start -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route('register') }}" method='POST'>

                @csrf

                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Full Name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <input type="email" name="email" id="email"  class="form-control" placeholder="Enter Your Email" value="{{ old('email')}}" required>
                </div>
            
                <div class="form-group">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password"  required autocomplete="new-password">
                </div>
            
                <div class="form-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
            
                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
            </form>
            <!-- register form end -->

            <div class="mg-t-40 tx-center">Already registered ? 
                <a href="{{ route('login') }}" class="tx-info">Sign In</a>
            </div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->
    <!-- your admin register code end -->

@endsection