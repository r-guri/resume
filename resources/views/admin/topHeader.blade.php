
@include('admin.css')
    <div class="page">
      <!-- Navbar -->
   @include('admin.header')
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Overview
                </div>
                <h2 class="page-title">
                  Top Header
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">

              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body p-0">
                  <div class="card-body">
    
                    <form action="{!! url('updateTop') !!}" method="POST">
                    <div class="row g-5">
                    @csrf
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                              <label class="form-label">Address</label>
                              <input type="text" class="form-control" name="address" value="{{$topHeaderData->address}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Mobile</label>
                              <input type="text" class="form-control" name="mobile" value="{{$topHeaderData->mobile}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Email ID</label>
                              <input type="text" class="form-control" name="email" value="{{$topHeaderData->email}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Facebook Link</label>
                              <input type="text" class="form-control" name="facebook" value="{{$topHeaderData->facebook}}">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                              <label class="form-label">Instagram Link</label>
                              <input type="text" class="form-control" name="instagram" value="{{$topHeaderData->instagram}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Twitter Link</label>
                              <input type="text" class="form-control" name="twitter" value="{{$topHeaderData->twitter}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label"> Youtube Link</label>
                              <input type="text" class="form-control" name="youtube" value="{{$topHeaderData->youtube}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">LinkedIn Link</label>
                              <input type="text" class="form-control" name="linkedin" value="{{$topHeaderData->linkedin}}">
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="card-footer text-end">
                        <input type="submit" class="btn btn-primary" value="Update">
                         
              
                      </div>
                    </form>
                    </div>
                  
                    </svg>
                  </div>
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
   