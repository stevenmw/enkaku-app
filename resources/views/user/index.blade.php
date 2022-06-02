@extends('templates.layouts.home')

@section('page_content')
    
<main class="mt-5 pt-3">
  <div class="container-fluid">
      <div class="col-md-12">
        {{-- <h4>Welcome Home, {{ auth()->user()->name }} </h4> --}}
        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        @if (session('error'))
          <div class="alert alert-warning">
            {{ session('error') }}
          </div>
       @endif
      </div>
    </div>

    {{-- /dashboard --}}
    <div class="d-flex justify-content-center">
      <div class="img-fluid" alt="Responsive image">
        <img src="images/dashboard.png" alt="home.image" style="max-width:100%;">
        <div class="content">
          {{-- <h3>Telerehabilitation Prodigy in Medical History</h3> --}}
          {{-- <p>We build a Telerehabilitation information system that offers one solution in providing rehabilitation services for medical industry</p> --}}
        </div>
      </div>      
    </div>
  </div>
</main>

@endsection
