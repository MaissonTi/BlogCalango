@extends('auth.assets')


@section('bsb_css')
    <style rel="stylesheet" type="text/css">
        body{
            background-image: url("{{ url('/')}}/img/space.jpg");                
            background-size: cover;
            background-position: 50% 50%;
            background-repeat: no-repeat;
        }
    </style>
@endsection

@section('body')

<div style="max-width: 360px; position: absolute;">

<div class="login-box">
  
    <div class="logo">
      <a href="javascript:void(0);">Ca<b>lango</b></a>
      <br>
      <small>O seu novo blog</small>
    </div>

  <div class="card">
      <div class="body">
          <form id="sign_in" method="POST" action="{{ route('login') }}">
            @csrf
              <div class="msg">Sign in to start your session</div>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="material-icons">person</i>
                  </span>
                  <div class="form-line">
                      <input id="email" type="email" class="form-control" name="email" placeholder="Username" value="{{ old('email') }}" required autofocus>
                  </div>
                  @if ($errors->has('email'))
                  <span class="invalid-feedback font-bold col-pink">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif  
              </div>
              <div class="input-group">
                  <span class="input-group-addon">
                      <i class="material-icons">lock</i>
                  </span>
                  <div class="form-line">
                      <input id="password" type="password" class="form-control" pattern=.*\S.* name="password" placeholder="Password" required> 
                  </div>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback font-bold col-pink">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                 @endif 
              </div>
              <div class="row">
                  <div class="col-xs-8 p-t-5">
                      <input type="checkbox" name="remember" id="rememberme" class="filled-in chk-col-pink" {{ old('remember') ? 'checked' : '' }}>
                      <label for="rememberme">Remember Me</label>
                  </div>
                  <div class="col-xs-4">
                      <button class="btn btn-block bg-blue waves-effect" type="submit">SIGN IN</button>
                  </div>
              </div>
              <div class="row m-t-15 m-b--20">
                  <div class="col-xs-6">
                      <a href="sign-up.html">Register Now!</a>
                  </div>
                  <div class="col-xs-6 align-right">
                      <a href="forgot-password.html">Forgot Password?</a>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>

</div>

@endsection