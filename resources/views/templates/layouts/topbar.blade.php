<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#sidebar"
      aria-controls="offcanvasExample"
    >
      <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
    </button>
    <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="/">Enkaku - Telerehab</a
    >
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#topNavBar"
      aria-controls="topNavBar"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="topNavBar">
      <form class="d-flex ms-auto my-3 my-lg-0">
        {{-- <div class="input-group">
          <input
            class="form-control"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-primary" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </div> --}}
      </form>
      <ul class="navbar-nav">
        @if ($user->role == 'Admin')
          <a class="navbar-brand me-auto ms-lg-0 ms-3">{{auth()->user()->name}} - Administrator</a>
        @elseif ($user->role == 'Doctor')
          <a class="navbar-brand me-auto ms-lg-0 ms-3">{{auth()->user()->name}} - Doctor</a>
        @elseif ($user->role == 'Patient')
          <a class="navbar-brand me-auto ms-lg-0 ms-3">{{auth()->user()->name}} - Patient</a>
        @endif
        {{-- <a class="navbar-brand me-auto ms-lg-0 ms-3">{{auth()->user()->name}}</a> --}}
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle ms-2"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="bi bi-person-fill"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            @if ($user->role == 'Patient')
              <li><a class="dropdown-item" href="/update-patient">My Profiles</a></li>               
            @elseif ($user->role == 'Doctor')
              <li><a class="dropdown-item" href="/update-doctor">My Profiles</a></li>
            @elseif ($user->role == 'Admin')
              <li><a class="dropdown-item" href="/update-admin">My Profiles</a></li>
            @endif
            <li><a class="dropdown-item" href="/">Settings</a></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                {{-- <a class="dropdown-item" href="/login" onclick="return logout(event);">
                  <span class="text-danger">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                  </span>
                </a> --}}
                <button type="submit" class="dropdown-item" onclick="return logout(event);">
                  <i class="fa fa-fw fa-sign-out"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="./js/logout.js"></script>
