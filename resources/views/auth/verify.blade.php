@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div id="login_box">
                <h2 id="crud_header">{{ __('Verify Your Email Address') }}</h2>
                <hr class="orange_hr"/>
                <div class="verify">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('In order to access this website, you need to verify your email address.  Check your inbox for the verification link.') }}
                    <br/></br/>
                    {{ __('If you did not receive the email') }}, <a id="verifylink" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
