@extends('authorization.templates.index')

@section('login_form')

<div class="container col-md-4">
    @if (session()->has('success'))                
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))                
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="forms"> 
        <div class="form login">
            
            <span class="title">Login</span>
            
            <form action="/login" method="post">
                @csrf
                <div class="input-field">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" autofocus required value="{{ old('email') }}">
                    <i class="uil uil-envelope icon"></i>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" class="password" placeholder="Enter your password" required>
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
    
                {{-- <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">Remember me</label>
                    </div>
                    
                    <a href="#" class="text">Forgot password?</a>
                </div> --}}
    
                <div class="input-field button">
                    <input type="submit" value="Login Now">
                </div>
            </form>
    
            <div class="login-signup">
                <span class="text">Need an account?
                    <a href="/register-patient" class="text signup-link">Signup now</a>
                    <br>
                    <a href="/" class="text signup-link">Back to Landing Page</a>
                </span>
            </div>
        </div>  
    </div>
</div>
@endsection