@extends('landing_page.index')

@section('landing-page')

<!-- header section starts  -->

<header class="header">

    <a href="/" class="logo"> <i class="fas fa-hand-holding-heart"></i> Enkaku </a>

    <nav class="navbar">
        <a href="/">home</a>
        <a href="#services">services</a>
        <a href="#about">about</a>
        <a href="#doctors">doctors</a>
        <a href="#review">review</a>
        <a href="#review" type="hidden"></a>
        @if (auth()->user())         
            <a href="/dashboard">
                <button type="button" class="btn btn-primary">Dashboard</button>
            </a>
        @endif
        {{-- <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Profile
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a href="#about" class="dropdown-item" href="#">My Profile</a></li>
                <li><a href='#' class="dropdown-item" href="#">Settings</a></li>
                <li><a href='#' class="dropdown-item" href="#">Logut</a></li>
            </ul>
        </div> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="services" id="services">

    <h2 class="heading"></h2>

    {{-- <div class="box-container">

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>free checkups</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-ambulance"></i>
            <h3>24/7 ambulance</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>expert doctors</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>medicines</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>bed facility</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>total care</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div> --}}

</section>

<!-- services section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>about</span> us </h1>

    <div class="row">

        <div class="image">
            <img src="images/health-professional-team-animate.svg" alt="">
        </div>

        <div class="content">
            <h3>we take care of your healthy life</h3>
            <p>The Enkaku Rehabilitation application system has the main feature in the form of report results related to patient progress data. This will provide an injection of enthusiasm and motivation for patients with post-stroke and similar comorbid diseases to recover quickly by observing the progress of the rehabilitation process through the infrastructure of the telerehabilitation system. This application is also expected to help the rehabilitation center to provide data reports related to the progress of each patient undergoing the medical rehabilitation process. This will be very helpful, especially for health centers that still use conventional methods for recording patient progress systems.</p>
            <p>In this application, patients will get a history of rehabilitation results that are packaged in the form of a rehabilitation progress record so that patients can continue to monitor their progress. In addition, this web application will also be designed with an application programming interface to make it easier for further developers to develop into mobile or tablet devices. By using an API combined with websocket, this application will send data between devices quickly and efficiently.</p>
            {{-- <a href="/about" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a> --}}
        </div>

    </div>

</section>

@endsection