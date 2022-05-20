@extends('templates.layouts.home')

@section('page_content')
  <main class="mt-5 pt-3">
    {{-- <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <h2 class="text-justify" class="font-weight-bold">Help Center Enkaku</h2>
          <div class="img-fluid" alt="Responsive image">
            <img src="images/call-center-animate.svg" alt="home.image">
            <div class="content">
              <h3>Telerehabilitation Prodigy in Medical History</h3>
              <p>We build a Telerehabilitation information system that offers one solution in providing rehabilitation services for medical industry</p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="d-flex justify-content-center">
      <h2 class="font-weight-bold">Help and Center Enkaku</h2>
    </div>
    <div class="d-flex justify-content-center">
      <div class="img-fluid" alt="Responsive image">
        <img src="images/call-center-animate.svg" alt="home.image">
        <div class="content">
          <h3>Telerehabilitation Prodigy in Medical History</h3>
          <p>We build a Telerehabilitation information system that offers one solution in providing rehabilitation services for medical industry</p>
        </div>
      </div>      
    </div>
  </main>
@endsection