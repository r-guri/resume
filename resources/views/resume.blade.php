@include('common.css')
@include('common.topHeader')

<link rel="stylesheet" href="https://hkrnl.itiharyana.gov.in/css/indexstyle.css" />
<link href="{{url('css/resume-style.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-breadcrumb">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="pt-3">
                    <ul class="steps-ul list-style-none">
                        <li class="active-li">
                            <strong class="w-100 hei-hun">
                                <a id="linkMemberDetails" href="#">Step 1 <span>Personal Details</span></a>
                            </strong>
                        </li>
                        <li>
                            <strong class="w-100 hei-hun">
                                <a id="linkEducationDetails" href="#">Step 2 <span>Education Details</span></a>
                            </strong>
                        </li>
                        <li>
                            <strong class="w-100 hei-hun">
                                <a id="linkSocioEconomicCriteria" href="#">Step 3 <span>Socio Economic Criteria</span></a>
                            </strong>
                        </li>
                        <li>
                            <strong class="w-100 hei-hun">
                                <a id="linkExperienceDetails" href="#">Step 4 <span>Experience Details</span></a>
                            </strong>
                        </li>
                        <li>
                            <strong class="w-100 hei-hun">
                                <a id="linkVacantJob" href="#">Step 5 <span>Apply For A Job</span></a>
                            </strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ContentPlaceHolder1_updatepannel1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div id="contentMemberDetails" class="tab-content">
                <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="info-detail-box">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="info-detail-box">
                                    <h2>Personal Details</h2>
                                    <div class="row">
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Full Name (English)</h4>
                                            </label>
                                            <input name="txtFullName" type="text" id="txtFullName" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Full Name (Hindi)</h4>
                                            </label>
                                            <input name="txtFullNameHindi" type="text" id="txtFullNameHindi" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Father Name (English)</h4>
                                            </label>
                                            <input name="txtFatherName" type="text" id="txtFatherName" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Father Name (Hindi)</h4>
                                            </label>
                                            <input name="txtFatherNameHindi" type="text" id="txtFatherNameHindi" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Mother Name (English)</h4>
                                            </label>
                                            <input name="txtMotherName" type="text" id="txtMotherName" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Mother Name (Hindi)</h4>
                                            </label>
                                            <input name="txtMotherNameHindi" type="text" id="txtMotherNameHindi" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Date Of Birth</h4>
                                            </label>
                                            <input name="txtDOB" type="text" id="txtDOB" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Age</h4>
                                            </label>
                                            <input name="txtAge" type="text" id="txtAge" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Gender</h4>
                                            </label>
                                            <input name="txtGender" type="text" id="txtGender" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Marital Status</h4>
                                            </label>
                                            <input name="txtMaritalStatus" type="text" id="txtMaritalStatus" class="form-control tang" value="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="info-detail-box pt-0">
                                    <h2>Communication Details</h2>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Address</h4>
                                            </label>
                                            <input name="txtAddress" type="text" id="txtAddress" value="" class="form-control tang" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>District</h4>
                                            </label>
                                            <input name="txtDistrict" type="text" id="txtDistrict" value="" class="form-control tang" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Block Town</h4>
                                            </label>
                                            <input name="txtBlock" type="text" id="txtBlock" value="" class="form-control tang" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Ward/Village</h4>
                                            </label>
                                            <input name="txtWardVillage" type="text" id="txtWardVillage" value="" class="form-control tang" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Pincode</h4>
                                            </label>
                                            <input name="txtPinCode" type="text" id="txtPinCode" value="" class="form-control tang" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Mobile No.</h4>
                                            </label>
                                            <input name="txtMobile" type="text" id="txtMobile" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Email Id</h4>
                                            </label>
                                            <input name="txtEmail" type="text" id="txtEmail" class="form-control tang" value="" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="info-detail-box pt-0">
                                    <h2>Other Details</h2>
                                    <div class="row">
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Benchmark Disability</h4>
                                            </label>
                                            <input name="txtIsDivyang" type="text" id="txtIsDivyang" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Caste Category</h4>
                                            </label>
                                            <input name="txtCasteCategory" type="text" id="txtCasteCategory" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Highest Qualification</h4>
                                            </label>
                                            <input name="txtHighestQual" type="text" id="txtHighestQual" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-6 mb-4">
                                            <label class="mt-0">
                                                <h4>Family ID</h4>
                                            </label>
                                            <input name="txtFamilyId" type="text" id="txtFamilyId" class="form-control tang" value="" />
                                        </div>
                                        <div class="col-sm-12 text-right mt-3">
                                            <input name="txtPPFile" type="hidden" id="txtPPFile" value="" />
                                            <input name="hfFile" type="hidden" id="hfFile" />
                                            <input name="txtPPImage" type="hidden" id="txtPPImage" />
                                            <input name="HiddenField1" type="hidden" id="HiddenField1" />
                                            <input name="txtPPFile" type="hidden" id="txtPPFile" />
                                            <input name="txtPPFileChanged" type="hidden" id="txtPPFileChanged" />
                                            <input type="submit" name="btnSave" value="Save & Continue" id="btnSave" class="btn btn-success" />
                                            <input type="submit" name="btnCancel" value="Cancel" id="btnCancel" class="btn btn-danger" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
                </div>
                <div id="contentEducationDetails" class="tab-content" style="display: none;">
                    Education Details Form Content Here
                </div>
                <div id="contentSocioEconomicCriteria" class="tab-content" style="display: none;">
                    Socio Economic Criteria Form Content Here
                </div>
                <div id="contentExperienceDetails" class="tab-content" style="display: none;">
                    Experience Details Form Content Here
                </div>
                <div id="contentVacantJob" class="tab-content" style="display: none;">
                    Apply For A Job Form Content Here
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.steps-ul li a');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function(event) {
                event.preventDefault();

                tabs.forEach(function(tab) {
                    tab.parentElement.parentElement.classList.remove('active-li');
                });

                this.parentElement.parentElement.classList.add('active-li');

                document.querySelectorAll('.tab-content').forEach(function(content) {
                    content.style.display = 'none';
                });

                const contentId = this.getAttribute('id').replace('link', 'content');
                document.getElementById(contentId).style.display = 'block';
            });
        });

        if (tabs.length > 0) {
            tabs[0].click();
        }
    });
</script>
