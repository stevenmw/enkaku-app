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

<section class="doctors" id="doctors">

    <h1 class="heading"> our <span>doctors</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/doc-1.jpg" alt="">
            <h3>Livy Renata</h3>
            <span>Internist</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="images/doc-2.jpg" alt="">
            <h3>lionel messi</h3>
            <span>neuorlogist</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="images/doc-3.jpg" alt="">
            <h3>john deo</h3>
            <span>physiotherapy</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="images/doc-4.jpg" alt="">
            <h3>Dea afrizal</h3>
            <span>physiotherapy</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="images/doc-5.jpg" alt="">
            <h3>Abdur arsyad</h3>
            <span>Radiologist</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <img src="images/doc-6.jpg" alt="">
            <h3>dr. strange</h3>
            <span>Anesthetic</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

    </div>

</section>

@endsection

