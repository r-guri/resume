@include ('admin.css')

  <body  class=" d-flex flex-column">
     <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
         
          <a href="." class="navbar-brand navbar-brand-autodark"><h1>99CodeHub</h1></a>
        
        </div>
        <form class="card card-md" action="{{ route('register') }}" method="POST" autocomplete="off" novalidate>
                
                @csrf <!-- This is important for Laravel to verify the form submission -->
    
          <div class="card-body">
            
            <h2 class="card-title text-center mb-4">Create new account</h2>
            @if (session('error'))
        <div class="alert alert-danger" role="alert">
        {!! session('error') !!}
        </div>
         @endif
                        @if (session('success'))
        <div class="alert alert-success" role="alert">
        {!! session('success') !!}
            </div>
                  @endif
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text"  name="name"class="form-control"  placeholder="name"  autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
              <input type="password"  name="password"class="form-control"  placeholder="Your password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <!-- <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
              </label>
            </div> -->
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">
              Already have account? <a href="{{url('sa')}}" tabindex="-1">login</a>
              </div>
      </div>
  
@include ('admin.scripts')