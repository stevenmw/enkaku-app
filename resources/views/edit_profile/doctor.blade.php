@extends('templates.layouts.home')

@section('page_content')
    <main class="mt-5 mb-3 pt-3">
        <div class="container-fluid">
            <div class="col-md-6 mx-auto">            
                <h2 class="fw-bold text-center">Update Doctor Profile</h3>
                    @if (session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @endif
                <form method="POST" action="/update-doctor/{{ $account->id }}" class="form-horizontal">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $account->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $account->email) }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="confirm_password" class="form-control" id="confirm_password" name="confirm_password">
                    </div> --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $account->address) }}">
                    </div>
                    <div class="mb-3">
                        <label for="dateofbirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', $account->date_birth) }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        {{-- <input type="text" class="form-control" id="gender" name="gender"> --}}
                        <select name="gender" class="form-select" aria-label="Default select example">
                            <option value="">--- Please input your gender ----</option>
                            <option value="Laki-laki" @if(old('gender', $account->gender) == 'Laki-laki')  'selected' @endif>Laki-laki</option>
                            <option value="Perempuan" @if(old('gender', $account->gender) == 'Perempuan')  'selected' @endif>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="specialist" class="form-label">Specialist</label>
                        <input type="text" class="form-control" id="specialist" name="specialist" value="{{ old('specialist', $doctor->specialist) }}">
                    </div>
                    <div class="mb-3">
                        <label for="start_hour" class="form-label">Start hour</label>
                        <input type="time" class="form-control" id="start_hour" name="start_hour" value= "{{ old('start_hour', $doctor->start_hour) }}">
                    </div>
                    <div class="mb-3">
                        <label for="end_hour" class="form-label">End hour</label>
                        <input type="time" class="form-control" id="end_hour" name="end_hour" value= "{{ old('end_hour', $doctor->end_hour) }}">
                    </div>
                    <button type="submit" class="btn btn-dark">Update Profile</button>
                </form>
            </div>
        </div>
    </main>
@endsection