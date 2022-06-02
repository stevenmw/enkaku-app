@extends('templates.layouts.home')

@section('page_content')
    <main class="mt-5 mb-3 pt-3">
        <div class="container-fluid">
            <div class="col-md-6 mx-auto">    
                <h2 class="fw-bold text-center">Data Patient</h3>
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @endif
                <form class="form-horizontal">
                    <fieldset disabled>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ old('name', $account->name) }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $account->email) }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $account->address) }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="{{ old('address', $account->gender) }}">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $patient->contact_number) }}">
                    </div>
                    <div class="mb-3">
                        <label for="dateofbirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', $account->date_birth) }}">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight</label>
                        <input type="number" class="form-control" id="weight" name="weight" value= "{{ old('weight', $patient->weight) }}">
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Height</label>
                        <input type="number" class="form-control" id="height" name="height" value="{{ old('height', $patient->height) }}">
                    </div>
                    <div class="mb-3">
                        <label for="condition" class="form-label">Disease and Condition</label>
                        <input type="text" class="form-control" id="condition" name="condition" value="{{ old('condition', $patient->disease_and_condition) }}">
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
@endsection
