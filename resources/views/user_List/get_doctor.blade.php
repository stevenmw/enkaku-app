@extends('templates.layouts.home')

@section('page_content')
    <main class="mt-5 mb-3 pt-3">
        <div class="container-fluid">
            <div class="col-md-6 mx-auto">    
                <h2 class="fw-bold text-center">Data Doctor</h3>
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
                        <label for="dateofbirth" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', $account->date_birth) }}">
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
@endsection
