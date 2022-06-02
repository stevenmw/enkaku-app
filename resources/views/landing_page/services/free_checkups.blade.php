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

</section>

<!-- services section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>free</span> check up </h1>

    <div class="row">

        <div class="content">
            <h3>Quality Health Care for Your Whole Family.</h3>
            <p>FreeLife Is 24/7, And So Are We. Access Affordable Medical Care 365 Days A Year, In-Person Or Online!</p>
            <section class="footer">
                <div class="box-container">
                    <div class="box">
                        {{-- <h3>quick links</h3> --}}
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Little-to-no wait times </a>
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Diagnosis and treatment in one visit </a>
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Free consultation </a>
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Dental Care </a>
                    </div>          
                </div>           
            </section>
        </div>

        <div class="image">
            <img src="images/ok-animate.svg" alt="">
        </div>

    </div>

</section>

@endsection

