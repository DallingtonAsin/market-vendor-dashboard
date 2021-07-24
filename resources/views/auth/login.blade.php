
@extends('auth.template')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-4">

        <div class="header nunito-font pt-3">
          <div class="row justify-content-center ">
            @if(isset($companyData) && isset($companyData['company_logo']))
            <img src="{{ asset('uploads/images/company/logo/'.$companyData['company_logo'].'') }}" class="co-icon-center" alt="">
            @else
            <img src="{{ asset('uploads/images/company/logo/default/brand.jpg') }}" class="co-icon-center">
            @endif
        </div>

        <div class="row justify-content-center">
            <label class="col-form-label text-white text-md-center">
              @include('components.company-name') &copy;{{ date('Y') }}
          </label>
      </div>
  </div>
  
  <div class="card card-login">
     <div class="card-body bg-white">
        <form method="POST" action="{{ route('authenticate') }}">
          @csrf

          <h6 class="col-form-label bolded text-dark text-md-center">
           {{ __('Sign in to ') }} @include('components.company-name')
       </h6>
       <div class="form-group">
        <span class="login_span bolded nunito-font">Username or email</span>
        <input id="username" type="text"
        class="form-control nunito-font
        @error('username') is-invalid @enderror
        " name="username" value="{{old('username')}}"
        placeholder="Enter your email or username"  required autocomplete="email" autofocus spellcheck="false">
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-6">
                <span class="login_span nunito-font bolded">Password</span>
            </div>
            <div class="col-md-6">
                @if (Route::has('password.request'))
                <a class="nunito-font text-decoration-none text-primary" href="{{ route('password.request') }}">
                  <small>{{ __('Forgot password?') }}</small>
              </a>
              @endif
          </div>

      </div>

      <input id="password" type="password" class="password form-control  @error('password') is-invalid @enderror nunito-font" name="password" placeholder="Enter your password"
      value="" autocomplete="off" required>
      <small class="text-decoration-none text-info showPwd">
      </small>

      @error('password')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>


  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox"
      name="remember" id="remember" {{ old("remember") ? 'checked' : '' }}>
      <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
</div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-sm btn-block text-white bg-success bolded">
      <strong>{{ __('Sign in') }}</strong>
  </button>
</div>

<div class="form-group px-0 py-0">
    @if($errors->any())
    <span class="login-error nunito-font">
      <span>{{$errors->first()}}</span>
  </span>
  @endif

  @if(session()->get('loginErr'))
  <span class="login-error nunito-font">
   {{ session()->get('loginErr') }}
</span>
@endif

@if(session()->get('sessionExpiredMessage'))
<span class="login-error nunito-font">
  {{ session()->get('sessionExpiredMessage') }}
</span>
@endif

</div>

</form>
</div>
</div>



<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script src="{{ asset('js/login.js') }}"></script>

</div>
</div>
</div>
</div>





@endsection
