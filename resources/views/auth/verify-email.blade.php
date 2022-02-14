@extends("frontend.layout.template")

@section('body-content')

	<div role="main" class="main shop py-4">

		<div class="container">

			<div class="row">
				<div class="col-lg-3">
                    
                </div>
				<div class="col-lg-6">
                    

                    <div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
                        <div class="box-content">

                            <!-- varify page  start -->
                            <div class="mb-4 text-sm text-gray-600">
                                <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another. <strong>আপনার প্রফাইল ম্যানেজ করার পূর্বে ভেরিফাই আবশ্যক ।</strong> </p>
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    <p>A new verification link has been sent to the email address you provided during registration.</p>
                                </div>
                            @endif

                            <div class="mt-4 flex items-center justify-between">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div class='form-group'>
                                                <button type="submit" class="btn btn-info btn-block">Resend Verification Email</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6"> 
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-block">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- verify page end -->
                        </div>
                    </div>
                    
                </div>
				<div class="col-lg-3">

                    
                </div>
            </div>
        </div>
    </div>

@endsection