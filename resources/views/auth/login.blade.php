@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 offset-md-2">
  <div id="login_box">
    <form method="POST" action="{{ route('login') }}">
        @csrf

    <h2 id="crud_header">Login</h2>
    <hr class="orange_hr"/>
    <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="float-left">
        <h5>Email Address</h5>
      </div>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
  </div>
  <br/>
  <div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="float-left">
    <h5>Password</h5>
  </div>
  <div class="float-right">
    <a class="forgotpassword" href="{{ route('password.request') }}">Forgot <i class="fas fa-question-circle"></i></a>
  </div>
      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      @if ($errors->has('password'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
  </div>
</div>
<br/>
<div class="form-group row">
    <div class="col-md-4 offset-md-3">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div>

<div class="form-group row justify-content-center">
  <button type="submit" class="btn btn-outline-info btn-lg">
      {{ __('Login') }}
  </button>
</div>
</form>


</div>

</div>
</div>

@endsection
