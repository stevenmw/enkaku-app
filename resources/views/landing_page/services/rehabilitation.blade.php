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

    <h1 class="heading"> <span>Total</span> Care </h1>

    <div class="row">
        
        <div class="image">
            <img src="images/hospital-wheelchair-animate.svg" alt="">
        </div>


        <div class="content">
            <h3>Types of Care</h3>
            <p>We know that making the decision about where you receive your next level of care can be confusing – especially with so many different options to consider. When you choose inpatient rehabilitation, sometimes referred to as an acute rehabilitation program, you will be cared for by a team that understands your individual situation and shares the same goals you do – getting you home as healthy and as fast as possible.</p>
            <p>In fact, treatment in the inpatient rehabilitation setting has been shown to provide a higher level of care and achieve better results versus other types of rehabilitation programs. For example, those receiving inpatient rehabilitation:</p>
            <section class="footer">
                <div class="box-container">
                    <div class="box">
                        {{-- <h3>quick links</h3> --}}
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Return home sooner </a>
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Have greater success walking independently again</a>
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Receive more doctor and nurse time and attention, including regular visits by their doctor </a>
                        <a href="#"> <i class="fa-solid fa-chevron-right"></i> Have lower rates of readmission to the hospital during or after treatment </a>
                    </div>          
                </div>           
            </section>
        </div>
        
    </div>

</section>

@endsection

