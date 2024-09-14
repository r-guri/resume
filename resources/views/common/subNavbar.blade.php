
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="{{ url('/') }}" class="navbar-brand p-0">
                <h1 class="m-0">99CodeHub</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">

                  
                   @foreach($navbarData as $navValue)
                    <a href="{{ url('') }}" class="nav-item nav-link">{{ $navValue['mainMenu'] }}</a>
                   @endforeach
                    <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
                    <a href="{{ url('service') }}" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ url('blog') }}" class="dropdown-item">Blog Grid</a>
                            <a href="{{ url('detail') }}" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ url('price') }}" class="dropdown-item">Pricing Plan</a>
                            <a href="{{ url('feature') }}" class="dropdown-item">Our features</a>
                            <a href="{{ url('team') }}" class="dropdown-item">Team Members</a>
                            <a href="{{ url('testimonial') }}" class="dropdown-item">Testimonial</a>
                          
                        </div>
                    </div>
                    <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
                    <a href="https://www.99codehub.cloud/sa" class="nav-item nav-link">Login</a>
                </div>
                <!-- <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                <!-- <a href="https://htmlcodex.com/startup-company-website-template" class="btn btn-primary py-2 px-4 ms-3">Download Pro Version</a> -->
            </div>
        </nav>