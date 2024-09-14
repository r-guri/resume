<header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <span>Dashboard</span>
              <!-- <img src="admin/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
           
           
            <div class="nav-item dropdown">
        
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
              <span class="avatar avatar-sm" style="background-image: url('data:image/jpeg;base64,{{ $image }}')"> 
</span>

                <div class="d-none d-xl-block ps-2">
                  <div>{{Auth::user()->name}}</div>
                  <!-- <div class="mt-1 small text-secondary">UI Designer</div> -->
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <!-- <a href="#" class="dropdown-item">Status</a> -->
                <!-- <a href="{{URL('create-resume')}}" class="dropdown-item">Profile</a> -->
                <!-- <a href="#" class="dropdown-item">Feedback</a> -->
                <!-- <div class="dropdown-divider"></div> -->
                <!-- <a href="./settings.html" class="dropdown-item">Settings</a> -->
                <a href="{{url('logout')}}" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>

      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
              @if(Auth::id() == 1)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Website Manage
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <div class="dropend">
                          <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                            99 Code Hub
                          </a>
                          <div class="dropdown-menu">
                            <a href="{{url('topHeader')}}" class="dropdown-item">
                              Top Header
                            </a>
                            <a href="{{url('ViewCount')}}" class="dropdown-item">
                              Main Count
                            </a>
                            <a href="{{url('ViewAbout')}}" class="dropdown-item">
                              About
                            </a>
                            <a href="{{url('ViewChoose')}}" class="dropdown-item">
                              Choose
                            </a>
                           
                          </div>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                </li>
                @endif
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Services
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <div class="dropend">
                          <a class="dropdown-item" href="{{url('form')}}" >
                            Create Resume
                          </a>
                         
                        </div>
                      </div>
                     
                    </div>
                  </div>
                </li>
            
              
              </ul>
           
            </div>
          </div>
        </div>
      </header>

      <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-success"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
            <h3>Successfully</h3>
            <div class="text-secondary">{{ session('success') }}
            </div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn btn-success w-100" data-bs-dismiss="modal">
                    Okay!
                  </a></div>
                <!-- <div class="col"><a href="#" class="btn btn-success w-100" data-bs-dismiss="modal">
                    View invoice
                  </a></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>
            <h3>Oops!</h3>
            <div class="text-secondary">{{session('error')}}</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <!-- <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Cancel
                  </a></div> -->
                <div class="col"><a href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                    Okay!
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>