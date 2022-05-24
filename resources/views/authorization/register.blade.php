@extends('authorization.templates.index_r')

@section('form_register')
<div class="wrapper">
    @if ($account == 'PATIENT')
    <h2>Patient Registration</h2>
      <form id="form" action="/register-patient" method='POST'>    
    @endif

    @if ($account == 'DOCTOR')
    <h2>Doctor Registration</h2>
      <form id="form" action="/register-doctor" method='POST'>    
    @endif

    @if ($account == 'ADMIN')
    <h2>Admin Registration</h2>
    <form id="form" action="/register-admin" method='POST'>    
  @endif
    
      @csrf
      <div class="input-box">
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="email" id="email" name="email" placeholder="Enter your email" required onkeydown="validation()">
        <span id="text"></span>
      </div>
      <div class="input-box">
        <input type="password" id="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
        <span id="message"></span>
      </div>
      {{-- <div class="policy">
        <label for="confirmation"></label>
        <input type="checkbox" id="confirmation">
          <h3>I accept all terms & condition</h3>
      </div> --}}
      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already registered? <a href="/login">Signin now</a></h3>
      </div>
    </form>
</div>

{{-- Email, Password, and Confirm Password Validation  --}}
<script type="text/javascript" src="js/validation.js"></script>
@endsection
