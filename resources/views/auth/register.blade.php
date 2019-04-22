@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div id="login_box">
                <h2 id="crud_header">Register</h2>
                <hr class="orange_hr"/>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                          <div class="col-md-6 offset-md-3">
                              <h5>Clock Number (Optional)</h5>
                                <input id="clockNumber" type="number" class="form-control{{ $errors->has('clockNumber') ? ' is-invalid' : '' }}" name="clockNumber" value="{{ old('clockNumber') }}" min="0" autofocus>

                                @if ($errors->has('clockNumber'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('clockNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                          <div class="col-md-6 offset-md-3">
                              <h5>Emergency Contact (Optional)</h5>
                                <input id="emergencycontact" type="emergencycontact" class="form-control{{ $errors->has('emergencycontact') ? ' is-invalid' : '' }}" name="emergencycontact" value="{{ old('emergencycontact') }}" >

                                @if ($errors->has('emergencycontact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('emergencycontact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                          <div class="col-md-6 offset-md-3">
                              <h5>Email Address</h5>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                          <div class="col-md-6 offset-md-3">
                              <h5>Password</h5>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                          <div class="col-md-6 offset-md-3">
                              <h5>Confirm Password</h5>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-center">
                          <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-outline-info btn-lg">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
