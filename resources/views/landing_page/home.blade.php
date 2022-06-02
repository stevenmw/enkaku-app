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

<section class="home" id="home">

    <div class="image">
        <img src="images/nursing-home-animate.svg" alt="home.image">
    </div>

    <div class="content">
        <h3>Telerehabilitation Prodigy in Medical History</h3>
        <p>We build a Telerehabilitation information system that offers one solution in providing rehabilitation services for medical industry</p>
        @if (!auth()->user())
            <a href="/login" class="btn-login"> Sign In <span class="fas fa-chevron-right"></span> </a>
            <a href="/register-patient" class="btn-signup">Sign Up<span class="fas fa-chevron-right"></span> </a>
        @endif
    </div>

</section>

<!-- home section ends -->

<!-- icons section starts  -->

{{-- <section class="icons-container">

    <div class="icons">
        <i class="fas fa-user-md"></i>
        <h3>140+</h3>
        <p>doctors at work</p>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <h3>1040+</h3>
        <p>satisfied patients</p>
    </div>

    <div class="icons">
        <i class="fas fa-procedures"></i>
        <h3>500+</h3>
        <p>training facilities</p>
    </div>

    <div class="icons">
        <i class="fas fa-hospital"></i>
        <h3>80+</h3>
        <p>available hospitals</p>
    </div>

</section> --}}

<!-- icons section ends -->

<!-- services section starts  -->

<section class="services" id="services">

    <h1 class="heading"> our <span>services</span> </h1>

    <div class="box-container">
        
        <div class="box">
            <i class="fas fa-hospital-user"></i>
            <h3>Pasca Stroke Physiotherapy</h3>
            <p>Physiotherapy with expert doctors using a robotic exoskeleton and Functional Electrical Stimulation</p>
            <a href="/physiotherapy" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Free checkup</h3>
            <h3></h3>
            <p>FreeLife is 24/7, and so are we. Access affordable medical care 365 days a year, in-person or online!</p>
            <a href="/free-checkup" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>Expert doctors</h3>
            <h3></h3>
            <p>We have several doctors who are experts in their respective fields, one of whom is a neurologist</p>
            <a href="/expert-doctor" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-briefcase-medical"></i>
            <h3>Total Care</h3>
            <p>treatment in the inpatient rehabilitation setting has been shown to provide a higher level of care and achieve better results versus other types of rehabilitation programs.</p>
            <a href="/rehabilitation-facility" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        {{-- <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>Rehabilitation Facility</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Total care</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad, omnis.</p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div> --}}

    </div>

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
            <p>Enkaku Rehabilitation application system has the main feature in the form of report results related to patient progress data. This will provide an injection of enthusiasm and motivation for patients with post-stroke and similar comorbid diseases to recover quickly by observing the progress of the rehabilitation process through the infrastructure of the telerehabilitation system. </p>
            <a href="/about-us" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- doctors section starts  -->

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

<!-- doctors section ends -->

<!-- booking section starts   -->

{{-- <section class="book" id="book">

    <h1 class="heading"> <span>book</span> now </h1>    

    <div class="row">

        <div class="image">
            <img src="images/book-img.svg" alt="">
        </div>

        <form action="">
            <h3>book appointment</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="number" placeholder="your number" class="box">
            <input type="email" placeholder="your email" class="box">
            <input type="date" class="box">
            <input type="submit" value="book now" class="btn">
        </form>

    </div>

</section> --}}

<!-- booking section ends -->

<!-- review section starts  -->

<section class="review" id="review">
    
    <h1 class="heading"> client's <span>review</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/sherelle.png" alt="">
            <h3>Sharlotte Vyvian</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">A hybrid approach platform to primary care that offers quick reporting for post stroke patient after carrying out a series of physiotherapeutic training. Helpful for caregivers in monitoring the training process and doctors in providing the right training menu according to the progress of each patient</p>
        </div>

        <div class="box">
            <img src="images/ace.png" alt="">
            <h3>Ajeng Zurliana</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">Great applications! User friendly Interface for commoners. Hopefully enkaku can increase access to medical services while maintaining quality.</p>
        </div>

        <div class="box">
            <img src="images/fl.png" alt="">
            <h3>Dian Sastro</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <p class="text">I'm still going to use it because even though I'm not satisfied with the lack of features, I'll have a direct consultation with a physiotherapist after the results of the training show up. However, this is a lifesaver. Easy for newby!</p>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- blogs section starts  -->

{{-- <section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/blog-1.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>blog title goes here</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/blog-2.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>blog title goes here</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/blog-3.jpg" alt="">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>blog title goes here</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, eius.</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span> </a>
            </div>
        </div>

    </div>

</section> --}}

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="#home"> <i class="fas fa-chevron-right"></i> home </a>
            <a href="#services"> <i class="fas fa-chevron-right"></i> services </a>
            <a href="#about"> <i class="fas fa-chevron-right"></i> about </a>
            <a href="#doctors"> <i class="fas fa-chevron-right"></i> doctors </a>
            <a href="#review"> <i class="fas fa-chevron-right"></i> review </a>
        </div>

        <div class="box">
            <h3>our services</h3>
            <a href="#"> <i class="fas fa-chevron-right"></i> neuorologis </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> message therapy </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> physiotherapy </a>
            <a href="#"> <i class="fas fa-chevron-right"></i> diagnosis </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +62-031-5923644 </a>
            <a href="#"> <i class="fas fa-envelope"></i> enkaku@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Surabaya, Indonesia </a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>

    </div>


</section>

<!-- footer section ends -->

<!-- custom js file link  -->
    
@endsection
