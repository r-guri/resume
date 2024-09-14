
    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">{{$chooseData->chooseUsTitle}}</h5>
                <h1 class="mb-0">{{$chooseData->chooseUsSubTitle}}</h1>
            </div>
            <div class="row g-5">
                @foreach($chooseDataArray as $chooseDataValue)
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-cubes text-white"></i>
                            </div>
                            <h4>{{$chooseDataValue['chooseUsHead']}}</h4>
                            <p class="mb-0">{{$chooseDataValue['chooseUsDisc']}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Features Start -->
