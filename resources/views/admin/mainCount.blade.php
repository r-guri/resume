
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
                  Main Count
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
                 
                <form action="{!! url('mainCountPost') !!}" method="POST">
                    @csrf
                    <div class="row g-5">
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                              <label class="form-label">Frist Count</label>
                              <input type="text" class="form-control" name="first" value="{{$mainCountData->happClientsTitle}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Second Count</label>
                              <input type="text" class="form-control" name="second" value="{{$mainCountData->projectDoneTitle}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Third Count</label>
                              <input type="text" class="form-control" name="third" value="{{$mainCountData->winAwardsTitle}}">
                            </div>
                         
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="row">
                          <div class="col-md-6 col-xl-12">
                          <div class="mb-3">
                              <label class="form-label">First Value</label>
                              <input type="text" class="form-control" name="firstValue" value="{{$mainCountData->happyClientsValue}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label">Second Value</label>
                              <input type="text" class="form-control" name="secondValue" value="{{$mainCountData->projectDoneValue}}">
                            </div>
                          <div class="mb-3">
                              <label class="form-label"> Third Value</label>
                              <input type="text" class="form-control" name="thirdValue" value="{{$mainCountData->winAwardValue}}">
                            </div>
                          
                          </div>
                          
                        </div>
                      </div>
                      <div class="card-footer text-end">
                        <input type="submit" class="btn btn-primary" value="Update">
                         
              
                      </div>
                    </div>
                </form>
                  
                    <!-- </svg> -->
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
   