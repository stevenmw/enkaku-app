@extends('landing_page.index')

@section('landing-page')

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>

</header>

<section class="services" id="services">

    <h2 class="heading"></h2>

</section>

<section class="about" id="about">

    <h1 class="heading"> <span>Pasca Stroke</span> Physiotherapy </h1>

    <div class="row">

        <div class="content">
            <h3>Robot Eksoskeleton.</h3>
            <p>Post-stroke motor disorders in the upper extremities including hemiplegia can inhibit daily activities, so patients need rehabilitation that can improve basic motor skills to restore and restore upper extremity movement function. The pattern of movement that will be given to the patient is flexion, extension, abduction, and adduction to train movements in the shoulder and elbow joints. This robotic exoskeleton is active as an external power source and is controlled based on speed and angle.</p>
            <p>The motor can reach both position and speed targets with a 100% success rate. Apart from that, the motor is also capable of detecting changes in current when there is a voluntary movement that is opposite to the direction of the motor's motion and it can be indicated that the torque exerted by the subject on the motor is detected. This can be used as material for evaluating the success rate of rehabilitation in further studies.</p>
        </div>

        <div class="image">
            <img src="images/eksofix.png" alt="ekso">
        </div>

    </div>

</section>

<section class="about" id="about">

    <div class="row">
        <div class="image">
            <img src="images/fes1.png" alt="">
        </div>

        <div class="content">
            <h3>Functional Electrical Stimulation</h3>
            <p>Functional Electrical Stimulation (FES) uses surface-stimulation electrodes to provide electrical stimulation to motor neurons in muscles, resulting in muscle contraction. At the existing facility, we developed a wearable FES system for the upper limbs specifically for elbow flexion-extension and shoulder flexion-extension movements. The proposed stimulator is monophasic and biphasic waveform using a boost converter, dual output boost converter, pulse generator, and a supply-stepping switch driver. Tests on the subject are able to produce optimal movement with a certain tension.</p>
        </div>

    </div>

</section>

@endsection

