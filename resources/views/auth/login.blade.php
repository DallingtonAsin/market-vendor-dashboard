@extends('layouts.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <span>
    </span>
  </div>
  <div class="login-box-body">
    <div class="header nunito-fontjustify-content-center ">
      
      
      <div class="row justify-content-center">
        <strong class="col-form-label text-dark text-md-center font-weight-bold">
          @if(isset($companyData))
          {{ $companyData['name'] }}
          @else
          {{ env('APP_NAME') }}
          @endif
          
        </strong>
      </div>
      
      <div class="row justify-content-center mt-2">
        @if(isset($companyData) && isset($companyData['logo']))
        <img src="{{ asset('uploads/images/company/logo/'.$companyData['logo'].'') }}" class="co-icon-center" alt="">
        @else
        <img src="{{ asset('images/icons/default/brand.png') }}" class="co-icon-center"> 
        @endif
      </div>
      
      
    </div>
    
    
    <p class="login-box-msg">Sign in to start your session</p>
    
    
    <form class="form-horizontal mx-5" role="form" method="POST" action="{{ route('authenticate') }}">
      @csrf
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Enter your username or email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Enter your password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      
      
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox"
          name="remember" id="remember" {{ old("remember") ? 'checked' : '' }}>
          <span class="form-check-label" for="remember">
            {{ __('Remember me') }}
          </span>
        </div>
      </div>
      
      
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Sign In</button>
      </div>
      <br/>
      
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
      
      @if(count($errors) > 0)
      @foreach( $errors->all() as $message )
      <div class="alert alert-danger display-hiden pt-2">
        <button class="close" data-close="alert"></button>
        <span>{{ $message }}</span>
      </div>
      @endforeach
      @endif
    </form>
    
  </div>
  @endsection