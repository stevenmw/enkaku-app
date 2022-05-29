<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
  <div class="offcanvas-body p-0">
    <nav class="navbar-dark">
      <ul class="navbar-nav">
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3">
            CORE
          </div>
        </li>
        <li>
          <a href="/dashboard" class="nav-link px-3 sidebar-link">
            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
            <span>Dashboard</span>
          </a>
        </li>

        @if ( !auth()->user()->isPatient() )     
          <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
              Managemenet
            </div>
          </li>
          <li>
            <a class="nav-link px-3 {{ (Request::is('/user-list')) ? 'active' : ''}}" href="/user-list">
              <span class="me-2"><i class="bi bi-layout-split"></i></span>
              <span>User Lists</span>
            </a>
          </li>
          <li>
            @if (auth()->user()->isAdmin())    
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
                <span>Registration</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="/register-admin" class="nav-link px-3">
                      <span class="me-2">
                        <i class="bi bi-clipboard-data"></i>
                      </span>
                      <span>Admin Registration</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="/register-doctor" class="nav-link px-3">
                      <span class="me-2">
                        <i class="bi bi-clipboard2-data-fill"></i>
                      </span>
                      <span>Doctor Registration</span>
                    </a>
                  </li>
                </ul>
              </div>
            @endif
          </li>
        @endif

        <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
        <li>
          <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
            Analytics
          </div>
        </li>
        <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#layouts"
          >
            <span class="me-2"><i class="bi bi-file-earmark-bar-graph-fill"></i></span>
            <span>Charts</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="layouts">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="/velocity" class="nav-link px-3">
                  <span class="me-2">
                    <i class="bi bi-speedometer2"></i>
                  </span>
                  <span>Velocity</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="collapse" id="layouts">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="/current" class="nav-link px-3">
                  <span class="me-2">
                    <i class="bi bi-activity"></i>
                  </span>
                  <span>Current</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="collapse" id="layouts">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="/trajectory" class="nav-link px-3">
                  <span class="me-2">
                    {{-- <i class="bi bi-speedometer2"></i> --}}
                    <i class="bi bi-graph-down"></i>
                  </span>
                  <span>Trajectory</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-table"></i></span>
            <span>Tables</span>
          </a>
        </li>
        <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
        <li>
          <a href="/helpcenter" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-question-circle"></i></span>
            <span>Help Center</span>
          </a>
        </li>
        <li>
          <a href="#" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-question-circle"></i></span>
            <span>Privacy & Policy</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>