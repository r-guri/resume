@include('admin.css')
<div class="page">
  <!-- Navbar -->
  @include('admin.header')
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-body">
      <div class="container-xl ">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Password Change</h4>
              </div>
              <div class="card-body">
                @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif

                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <form action="{{ route('passwordchangeAction') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="oldpassword" class="form-label">Old Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                      <span class="input-group-text">
                        <i class="far fa-eye" id="toggleOldPassword" style="cursor: pointer;"></i>
                      </span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="newpassword" class="form-label">New Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="newpassword" name="newpassword">
                      <span class="input-group-text">
                        <i class="far fa-eye" id="toggleNewPassword" style="cursor: pointer;"></i>
                      </span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                      <span class="input-group-text">
                        <i class="far fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                      </span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    @include('admin.footer')
  </div>
</div>
@include('admin.scripts')