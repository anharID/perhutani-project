@extends('layouts.app')

@section('content')
<div class="wrap-login100">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card overflow-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="assets/img/logo-perhutani.png" alt="" class="img-logo mb-2">
                                    <h1 class="h4 text-gray-900 mb-5">Login AMINS</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="row">
                                        {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email or Username') }}</label> --}}
                                    <input id="username" type="username" class="form-control mb-3 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username / Email" required autocomplete="username" autofocus>
    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
            
                                    <div class="row">
                                        {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                                    <input id="password" type="password" class="form-control mb-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
            
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
            
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection