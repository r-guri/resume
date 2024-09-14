
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
                  Choose
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
          <div class="container-xl">
            <div class="row row-cards">
               <div class="col-md-12">
                <!-- <div class="card"> -->
                  <div class="card-body p-0">
                  <div class="card-body">
               
              
                    </svg>
                  </div>
                </div>
              </div>
            <div class="card">
              <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><button class="table-sort" data-sort="sort-name">#</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Title</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Sub Title</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Head</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Discription</button></th>
                        <th><button class="table-sort" data-sort="sort-name">Action</button></th>
                       
                      </tr>
                    </thead>
                    <tbody class="table-tbody">           
                     
                   @foreach($chooseDataArray as $chooseDataValue)    
                      <tr>
                          <td class="sort-score">1</td>
                          <td class="sort-name">{{$chooseDataValue['chooseUsTitle']}}</td>
                          <td class="sort-name">{{$chooseDataValue['chooseUsSubTitle']}}</td>
                          <td class="sort-city">{{$chooseDataValue['chooseUsHead']}}</td>
                          <td class="sort-type">{{$chooseDataValue['chooseUsDisc']}}</td>
                          <td class="sort-score">
                            <button class="btn btn-danger btn-sm">Delete</button>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit">
                    Edit
                  </button>
                        </td>
                       
                     
                      </tr>
                      
                      @endforeach
                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      @include('admin.footer')
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Sub Title</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="mb-3">
                  <label class="form-label">Heads</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label class="form-label">Discription</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Create new report
            </a>
          </div>
        </div>
      </div>
    </div>
    
@include('admin.scripts')
   