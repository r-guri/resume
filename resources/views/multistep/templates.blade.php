@include('admin.css')
<div class="page">
    <!-- Navbar -->
    @include('admin.header')
    <div class="page-wrapper">
        <!-- Page body -->
        <div class="page-body">
            <div class="page-body">
    <div class="container">
<div class="page">
    <div class="container-xl">
      <div class="page-header d-print-none">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="page-title">
              Select a Resume Template
            </h2>
          </div>
        </div>
      </div>

      <form action="generate-resume" method="POST" class="row row-cards">
        <!-- Template 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <input type="radio" id="template1" name="template" value="template1" class="card-input-element" required>
            <label class="card-body" for="template1">
              <img src="template1-preview.jpg" class="card-img-top" alt="Template 1 Preview">
              <h3 class="card-title">Template 1</h3>
            </label>
          </div>
        </div>

        <!-- Template 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <input type="radio" id="template2" name="template" value="template2" class="card-input-element">
            <label class="card-body" for="template2">
              <img src="template2-preview.jpg" class="card-img-top" alt="Template 2 Preview">
              <h3 class="card-title">Template 2</h3>
            </label>
          </div>
        </div>

        <!-- Additional Templates -->
        <!-- Add more template blocks as needed -->

        <!-- Submit Button -->
        <div class="col-12">
          <button type="submit" class="btn btn-primary mt-3">Generate Resume</button>
        </div>
      </form>
    </div>
  </div>

  </div>

@include('admin.footer')
</div>

@include('admin.scripts')