@include('admin.css')
<div class="page">
    <!-- Navbar -->
    @include('admin.header')
    <div class="page-wrapper">
        <!-- Page header -->
       <style>
        .tab-content {
    display: none; /* Hide all tab content by default */
}

.nav-link.active {
    background-color: #007bff; /* Bootstrap primary color or any custom color */
    color: #fff; /* White text color */
}
.contact-us-section {
    background-color: #f8f9fa; /* Light grey background */
    padding: 15px;
    border-radius: 5px;
    font-size: 16px;
}

.contact-us-section p {
    margin: 0;
    color: #333; /* Dark grey text */
}

.contact-link {
    color: #007bff; /* Link color (Bootstrap primary color) */
    text-decoration: none;
}

.contact-link:hover {
    text-decoration: underline;
}

       </style>
        <!-- Page body -->
        <div class="page-body">
                <div class="container">
                    <div class="row row-cards">
                        <div class="col-md-12">
                        <div style="overflow: hidden; white-space: nowrap; font-size: 16px; color: #333; width: 100%;">
    <div style="display: inline-block; animation: marquee 20s linear infinite;">
        For any problems, suggestions, or changes to the portal, please contact us at: 
        <strong><a href="mailto:99codehub@gmail.com">99codehub@gmail.com</a></strong>
    </div>
</div>

<style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="card-body">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills acTab" >
                                                <li class="nav-item" ><a
                                                        class="nav-link {{ $step == 1 ? 'active bg-primary text-white' : '' }}">Basic</a></li>
                                                <li class="nav-item"><a
                                                        class="nav-link {{ $step == 2 ? 'active bg-primary text-white' : '' }}">Contact</a>
                                                </li>
                                                <li class="nav-item"><a
                                                        class="nav-link {{ $step == 3 ? 'active bg-primary text-white' : '' }}">Academic</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $step == 4 ? 'active bg-primary text-white' : '' }}">Research</a></li>
                                                <li class="nav-item"><a
                                                        class="nav-link {{ $step == 5 ? 'active bg-primary text-white' : '' }}">Experience</a>
                                                </li>
                                                <li class="nav-item"><a
                                                        class="nav-link {{ $step == 6 ? 'active bg-primary text-white' : '' }}">Projects</a>
                                                </li>
                                                <li class="nav-item"><a
                                                        class="nav-link {{ $step == 7 ? 'active bg-primary text-white' : '' }}">About</a>
                                                </li>
                                            </ul>
                                        </div>
                                    
                                        <div class="card-body">
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                          
                        
                                        

                                            <form id="multiStepForm" method="POST" action="{{ route('form.save') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="step" value="{{ $step }}">

                                                <!-- Step 1: Basic Information -->
                                                @if($step == 1)
                                                <div class="tab-pane {{ $step == 1 ? 'active' : '' }}"
                                                    id="personal_details">
                                                    <h3>Basic Information</h3>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-3">
                                                            <div class="form-group">
                                                            <label class="form-label required">First Name:</label>
                                                                <input type="text" class="form-control" id="first_name"
                                                                    name="first_name"
                                                                    value="{{ $formData['first_name'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-3">
                                                            <div class="form-group">
                                                            <label class="form-label">Last Name:</label>
                                                                <input type="text" class="form-control" id="last_name"
                                                                    name="last_name"
                                                                    value="{{ $formData['last_name'] ?? '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label class="form-label required">Father's Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="fatherName" id="fatherName"
                                                                    placeholder="Enter father's name"
                                                                    value="{{ $formData['fatherName'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label class="form-label required">Mother's Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="motherName" id="motherName"
                                                                    placeholder="Enter mother's name"
                                                                    value="{{ $formData['motherName'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-3">
                                                            <label class="form-label required">Date of Birth</label>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control" name="dob"
                                                                    id="dob" value="{{ $formData['dob'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-3">
                                                            <div class="form-group">
                                                                <label class="form-label required">Gender</label>
                                                                <select class="form-select" name="gender" id="gender">
                                                                    <option value="{{ $formData['gender'] ?? '' }}">{{
                                                                        $formData['gender'] ?? 'Select' }}
                                                                    </option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-3">
                                                            <label class="form-label required">Blood Group</label>
                                                            <select class="form-select" name="bloodgroup"
                                                                id="bloodgroup">
                                                                <option value="{{ $formData['bloodgroup'] ?? '' }}">{{
                                                                    $formData['bloodgroup'] ?? 'Select' }}</option>
                                                                <option value="A +ve">A +Ve</option>
                                                                <option value="A -ve">A -Ve</option>
                                                                <option value="AB +ve">AB +Ve</option>
                                                                <option value="AB -ve">AB -Ve</option>
                                                                <option value="B +ve">B +Ve</option>
                                                                <option value="B -ve">B -Ve</option>
                                                                <option value="O +ve">O +Ve</option>
                                                                <option value="O -ve">O -Ve</option>
                                                                <option value="NA">NA</option>

                                                            </select>
                                                        </div>

                                                        
                                                    </div>


                
                                                                <br><div class="card-footer text-end">
                                                    <button type="submit" class="btn btn-primary" name="action"
                                                        value="next">Save & Next</button>
                                                                </div>
                                                </div>
                                                @endif

                                                <!-- Step 2: Contact Information -->
                                                @if($step == 2)
                                                <div class="tab-pane {{ $step == 2 ? 'active' : '' }}" id="contact">
                                                    <h3>Contact Information</h3>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group">
                                                            <label class="form-label required">Email:</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" value="{{ $formData['email'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group">
                                                            <label class="form-label required">Mobile Number:</label>
                                                                <input type="text" class="form-control" id="phone"
                                                                    name="phone" value="{{ $formData['phone'] ?? '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label required">Permanent Address</label>
                                                                <input type="text" class="form-control"
                                                                    name="permanentAddress" id="permanentAddress"
                                                                    placeholder="Enter permanent address"
                                                                    value="{{ $formData['permanentAddress'] ?? '' }}">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label required">Postal Code</label>
                                                                <input type="text" class="form-control" id="pincode"
                                                                    name="pincode"
                                                                    value="{{ $formData['pincode'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label required">State</label>
                                                                <input type="text" class="form-control" name="state"
                                                                    value="{{ $formData['state'] ?? '' }}" id="state">

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label required">District</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $formData['district'] ?? '' }}"
                                                                    id="district" name="district"
                                                                    placeholder="Enter district">

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <br><div class="card-footer text-end">
                                                    <button type="submit" class="btn btn-secondary" name="action"
                                                        value="previous">Previous</button>
                                                    <button type="submit" class="btn btn-primary" name="action"
                                                        value="next">Save & Next</button>
                                                </div>
                                                </div>
                                                @endif
                                                @if($step == 3)
                                                <div class="tab-pane {{ $step == 3 ? 'active' : '' }}">
                                                    <h3>Educational Details</h3>
                                                    <div class="col-lg-12">

                                                        <div class="row">

                                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                                        
        <label class="form-label required">Qualification</label>
        <select class="form-select" name="qualification" id="Programs" onchange="updateCourses()">
            <option value="">Choose Qualification</option>
            <!-- Example options, replace with dynamic options if needed -->
            @foreach($qualifications as $qualification)
                <option value="{{ $qualification->id }}">{{ $qualification->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">
        <label class="form-label required">Course</label>
        <select class="form-select" name="course" id="course">
            <option value="">Choose Course</option>
        </select>
    </div>

                                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                                <label class="form-label required"> Mode </label>
                                                                <select class="form-select" name="mode">
                                                                    <option value="">Choose Mode of Study</option>
                                                                    <option value="Regular">Regular</option>
                                                                    <option value="Private">Private</option>
                                                                    <option value="Correspondence">Correspondence
                                                                    </option>
                                                                    <option value="Distance">Distance</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                                <label class="form-label required">School/College </label>
                                                                <input class="form-control" type="text"
                                                                    pattern="[A-Za-z\s]*"
                                                                    placeholder="Enter School/College..."
                                                                    name="school_clg">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                                <label class="form-label required"> University/Board </label>
                                                                <input class="form-control" type="text"
                                                                    pattern="[A-Za-z\s]*"
                                                                    placeholder="Enter University/Board..."
                                                                    name="uni_board">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                                <label class="form-label required"> Date of Passing</label>
                                                                <input class="form-control" type="date"
                                                                    name="passing_date">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-sm-6">
                                                                <label class="form-label required">Measurement Type</label>
                                                                <select class="form-select" id="measurement_type"
                                                                    onchange="handleVisibility();"
                                                                    name="measurement_type">
                                                                    <option value="">Select Measurement Type</option>
                                                                    <option value="cgpa">CGPA</option>
                                                                    <option value="percent">Percentage</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-sm-6"
                                                                id="obtained_marks_container">
                                                                <label class="form-label required">Obtained Marks</label>
                                                                <input class="form-control" onblur="calculatePercentage();" type="number"
                                                                    placeholder="Enter Obtained Marks..."
                                                                    name="marks_obtained" id="obtained_marks">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-sm-6"
                                                                id="total_marks_container">
                                                                <label class="form-label required">Total Marks</label>
                                                                <input class="form-control" onblur="calculatePercentage();" type="number"
                                                                    placeholder="Enter Total Marks..."
                                                                    name="total_marks" id="total_marks">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-6" id="cgpa_container">
                                                                <label class="form-label required">CGPA</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Enter CGPA..." name="cgpa" id="cgpa">
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-6"
                                                                id="percent_container">
                                                                <label class="form-label required">Percentage</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Percentage..." name="percent"
                                                                    id="percent" readonly>
                                                            </div>


                                                            <div class="col-lg-1 col-md-1 col-sm-6">
                                                            <label class="form-label ">Action </label>

                                                                <input type="submit" name="action"
                                                                    class="btn btn-primary" value="Save">
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="table-responsive col-lg-12">

                                                            <table class="table">
                                                                <tr>
                                                                    <th>Qualification</th>
                                                                    <th>Course</th>

                                                                    <th>Mode</th>
                                                                    <th>School / College</th>
                                                                    <th>University / Board</th>
                                                                    <th>Date of Passing</th>
                                                                    <th>Obtained </th>
                                                                    <th>Total </th>
                                                                    <th>CGPA</th>
                                                                    <th>%Age</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                <tbody>
                                                                    @foreach($academicData as $academicDataValue)
                                                                    <tr>

                                                                        <td>{{$academicDataValue['qualification_name'] ?? 'N/A' }}</td>
                                                                        <td>{{$academicDataValue['course']}}</td>

                                                                        <td>{{$academicDataValue['mode']}}</td>
                                                                        <td>{{$academicDataValue['school_clg']}}</td>
                                                                        <td>{{$academicDataValue['uni_board']}}</td>
                                                                        <td>{{$academicDataValue['passing_date']}}</td>
                                                                        <td>{{$academicDataValue['marks_obtained']}}
                                                                        </td>
                                                                        <td>{{$academicDataValue['total_marks']}}</td>
                                                                        <td>{{$academicDataValue['cgpa']}}</td>
                                                                        <td>{{$academicDataValue['percent']}}</td>

                                                                        <td>
                                                                        <button type="button" onclick="deleteRecordEducation({{ $academicDataValue['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
                                                      
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>

                                                </div>

                                                <br><div class="card-footer text-end">
                                                <button type="submit" class="btn btn-secondary" name="action"
                                                    value="previous">Previous</button>
                                                <button type="submit" class="btn btn-primary" name="action"
                                                    value="next">Next</button>
                                        </div>
                                        </div>
                                        @endif




                                        
                                        @if($step == 4)
                                        <div class="tab-pane {{ $step == 4 ? 'active' : '' }}" id="Research">
                                        <div id="profile-tabs">
                                        <div class="alert alert-danger" role="alert">
                                       <b>Note: </b> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8h8.5a1.5 1.5 0 0 1 0 3h-7.5" /><path d="M13.5 11h2a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M14.5 14a1.5 1.5 0 0 1 0 3h-1.5" /><path d="M13.5 17a1.5 1.5 0 1 1 0 3h-4.5a6 6 0 0 1 -6 -6v-2v.208a6 6 0 0 1 2.7 -5.012l.3 -.196q .718 -.468 5.728 -3.286a1.5 1.5 0 0 1 2.022 .536c.44 .734 .325 1.674 -.28 2.28l-1.47 1.47" /></svg>&nbsp;These details are not required. Please fill in the information if you have any research, publications, or other relevant details. If not, you may ignore these sections.
</div>
                                        <ul class="nav nav-tabs">
       
        <li class="nav-item">
            <a class="nav-link active" href="#" onclick="openTab(event, 'ResearchA')">Research</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Books')">Books/Chapters/Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Publication')">Publication</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'ThesisSupervised')">Thesis Supervised</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'ConferenceDetail')">Conference Detail</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Seminars')">Seminars</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Workshops')">Workshops</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Patents')">Patents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Awards')">Awards</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openTab(event, 'Memberships')">Memberships</a>
        </li>
    
    </ul>
                                   
                                                </div>
    <br>
    @if (session('errorA'))
    <div class="alert alert-important alert-danger alert-dismissible" role="alert" id="success-alert">
                      <div class="d-flex">
                        <div>
                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                        </div>
                        <div>
                        {!! session('errorA') !!}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>

                @endif
    @if (session('successSub'))
<div class="alert alert-important alert-success alert-dismissible" role="alert" id="success-alert">
                      <div class="d-flex">
                        <div>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        </div>
                        <div>
                        {!! session('successSub') !!}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
@endif
    <div id="ResearchA" class="tab-content">
        <h3>Research</h3>
        
        <form action="{{ route('researchsave') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label" for="research_interest">Research Interest</label>
        <input type="text" class="form-control" id="research_interest" name="research_interest">
    </div>
    <div class="form-group">
        <label class="form-label" for="area_of_research">Area of Research</label>
        <input type="text" class="form-control" id="area_of_research" name="area_of_research">
    </div>
    </br>
    <button type="submit" class="btn btn-primary">Save</button>
                                                                </form>


                                                                <div class="row">
                                                                </br>
                                                        <div class="table-responsive col-lg-12">

                                                            <table class="table">
                                                                <tr>
                                                                    <th>Research Interest</th>
                                                                    <th>Area of Research</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                <tbody>
                                                                
                                                                    @foreach($Research as $ResearchShow)
                                                                    <tr>
                                                                        <td>{{$ResearchShow['research_interest']}}</td>
                                                                        <td>{{$ResearchShow['area_of_research']}}</td>
                                                                        <td>
                                                                        <button type="button" onclick="deleteRecordResearch({{ $ResearchShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
</div>

    <div id="Books" class="tab-content">
        <h3>Books/Chapters/Articles</h3>
        
        <form action="{{ route('bookssave') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="first_author">First Author</label>
                <input type="text" class="form-control" id="first_author" name="first_author" >
            </div>
            <div class="form-group">
                <label class="form-label" for="co_authors">Co-Authors</label>
                <input type="text" class="form-control" id="co_authors" name="co_authors">
            </div>
            <div class="form-group">
                <label class="form-label" for="title_of_book">Title of Book</label>
                <input type="text" class="form-control" id="title_of_book" name="title_of_book" >
            </div>
            <div class="form-group">
                <label class="form-label" for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" >
            </div>
            <div class="form-group">
                <label class="form-label" for="issn_isbn_no">ISSN/ISBN No</label>
                <input type="text" class="form-control" id="issn_isbn_no" name="issn_isbn_no" >
            </div>
            <div class="form-group">
                <label class="form-label" for="type_of_book">Type of Book</label>
                <input type="text" class="form-control" id="type_of_book" name="type_of_book" >
            </div>
                                                                </br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <div class="table-responsive col-lg-12">

<table class="table">
    <tr>
    <th>First Author</th>
<th>Co Authors</th>
<th>Title of Book</th>
<th>Publisher</th>
<th>ISSN/ISBN No</th>
<th>Type of BooK</th>
        <th>Action</th>
    </tr>

    <tbody>

        @foreach($Book as $BookShow)
        <tr>
            <td>{{$BookShow['first_author']}}</td>
            <td>{{$BookShow['co_authors']}}</td>
            <td>{{$BookShow['title_of_book']}}</td>
            <td>{{$BookShow['publisher']}}</td>
            <td>{{$BookShow['issn_isbn_no']}}</td>
            <td>{{$BookShow['type_of_book']}}</td>
            <td>
            <button type="button" onclick="deleteRecordBook({{ $BookShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div> 

    <div id="Publication" class="tab-content">
        <h3>Publication</h3>
        
        <form action="{{ route('publicationsave') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="first_author">First Author</label>
                <input type="text" class="form-control" id="first_author" name="first_author" >
            </div>
            <div class="form-group">
                <label class="form-label" for="co_authors">Co Authors</label>
                <input type="text" class="form-control" id="co_authors" name="co_authors">
            </div>
            <div class="form-group">
                <label class="form-label" for="title_of_research_paper">Title of Research Paper</label>
                <input type="text" class="form-control" id="title_of_research_paper" name="title_of_research_paper" >
            </div>
            <div class="form-group">
                <label class="form-label" for="name_of_journal">Name of Journal</label>
                <input type="text" class="form-control" id="name_of_journal" name="name_of_journal" >
            </div>
            <div class="form-group">
                <label class="form-label" for="volume_no">Volume No</label>
                <input type="text" class="form-control" id="volume_no" name="volume_no">
            </div>
            <div class="form-group">
                <label class="form-label" for="issue_no">Issue No</label>
                <input type="text" class="form-control" id="issue_no" name="issue_no">
            </div>
            <div class="form-group">
                <label class="form-label" for="page_no">Page No</label>
                <input type="text" class="form-control" id="page_no" name="page_no">
            </div>
            <div class="form-group">
                <label class="form-label" for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" min="1900" max="{{ date('Y') }}" >
            </div>
            <div class="form-group">
                <label class="form-label" for="impact_factor">Impact Factor</label>
                <input type="text" class="form-control" id="impact_factor" name="impact_factor">
            </div>
            <div class="form-group">
                <label class="form-label" for="national_international">National/International</label>
                <select class="form-control" id="national_international" name="national_international" >
                    <option value="National">National</option>
                    <option value="International">International</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="source_of_authorization">Source of Authorization</label>
                <input type="text" class="form-control" id="source_of_authorization" name="source_of_authorization" >
            </div>
            
                                                                </br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <div class="table-responsive col-lg-12">

<table class="table">
    <tr>
    <th>First Author</th>
            <th>Co Author</th>
            <th>Title of Research Paper</th>
            <th>Journal</th>
            <th>Volume No</th>
            <th>Issue No</th>
            <th>Page No</th>
            <th>Year</th>
            <th>Impact Factor</th>
            <th>Type of Publication</th>
            <th>Source of Authorization</th>

                        
        <th>Action</th>
    </tr>

    <tbody>
                                                                
        @foreach($Publication as $PublicationShow)
        <tr>
        <td>{{$PublicationShow['first_author']}}</td>
       <td>{{$PublicationShow['co_authors']}}</td>
     <td>{{$PublicationShow['title_of_research_paper']}}</td>
     <td>{{$PublicationShow['name_of_journal']}}</td>
     <td>{{$PublicationShow['volume_no']}}</td>
     <td>{{$PublicationShow['issue_no']}}</td>
     <td>{{$PublicationShow['page_no']}}</td>
     <td>{{$PublicationShow['year']}}</td>
     <td>{{$PublicationShow['impact_factor']}}</td>
     <td>{{$PublicationShow['national_international']}}</td>
     <td>{{$PublicationShow['source_of_authorization']}}</td>
            <td>
            <button type="button" onclick="deleteRecordPublication({{ $PublicationShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>

    <div id="ThesisSupervised" class="tab-content">
        <h3>P.hD/M.Tech/M.Phil Thesis Supervised</h3>
        
        <form action="{{ route('thesis_supervisedsave') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title_of_research">Title of Research</label>
                <input type="text" class="form-control" id="title_of_research" name="title_of_research" >
            </div>
            <div class="form-group">
                <label class="form-label" for="supervisor">Supervisor</label>
                <input type="text" class="form-control" id="supervisor" name="supervisor" >
            </div>
            <div class="form-group">
                <label class="form-label" for="co_supervisor">Co-Supervisor</label>
                <input type="text" class="form-control" id="co_supervisor" name="co_supervisor">
            </div>
            <div class="form-group">
                <label class="form-label" for="year_of_completion">Year of Completion</label>
                <input type="number" class="form-control" id="year_of_completion" name="year_of_completion" min="1900" max="{{ date('Y') }}" >
            </div>
            <div class="form-group">
                <label class="form-label" for="name_of_university">Name of University</label>
                <input type="text" class="form-control" id="name_of_university" name="name_of_university" >
            </div>
            <div class="form-group">
                <label class="form-label" for="name_of_student">Name of Student</label>
                <input type="text" class="form-control" id="name_of_student" name="name_of_student" >
            </div>
            <div class="form-group">
                <label class="form-label" for="registration_number">Registration Number</label>
                <input type="text" class="form-control" id="registration_number" name="registration_number" >
            </div>
            <div class="form-group">
                <label class="form-label" for="date_of_enrollment">Date of Enrollment</label>
                <input type="date" class="form-control" id="date_of_enrollment" name="date_of_enrollment" >
            </div>
            <div class="form-group">
                <label class="form-label" for="date_of_completion">Date of Completion</label>
                <input type="date" class="form-control" id="date_of_completion" name="date_of_completion" >
            </div>
           
           </br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>        <div class="table-responsive col-lg-12">

<table class="table">
<tr>
    <th>Title of Research</th>
    <th>Supervisor</th>
    <th>Co-Supervisor</th>
    <th>Year of Completion</th>
    <th>Name of University</th>
    <th>Name of Student</th>
    <th>Registration Number</th>
    <th>Date of Enrollment</th>
    <th>Date of Completion</th>
        <th>Action</th>
    </tr>

    <tbody>
                                                                
        @foreach($ThesisSupervised as $ThesisSupervisedShow)
        <tr>
       <td>{{$ThesisSupervisedShow['title_of_research']}}</td>
       <td>{{$ThesisSupervisedShow['supervisor']}}</td>
       <td>{{$ThesisSupervisedShow['co_supervisor']}}</td>
       <td>{{$ThesisSupervisedShow['year_of_completion']}}</td>
       <td>{{$ThesisSupervisedShow['name_of_university']}}</td>
       <td>{{$ThesisSupervisedShow['name_of_student']}}</td>
       <td>{{$ThesisSupervisedShow['registration_number']}}</td>
       <td>{{$ThesisSupervisedShow['date_of_enrollment']}}</td>
       <td>{{$ThesisSupervisedShow['date_of_completion']}}</td>
            <td>
            <button type="button" onclick="deleteRecordThesisSupervised({{ $ThesisSupervisedShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>


    </div>

    <div id="ConferenceDetail" class="tab-content">
        <h3>Conference Detail</h3>
        
        <form action="{{ route('conference_detailsave') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label" for="conference_type">Online/Offline</label>
                <select class="form-control" id="conference_type" name="conference_type" >
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="national_international">National/International</label>
                <select class="form-control" id="national_international" name="national_international" >
                    <option value="National">National</option>
                    <option value="International">International</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="participation_type">Participated/Paper Presented/Key Note Speaker</label>
                <select class="form-control" id="participation_type" name="participation_type" >
                    <option value="Participated">Participated</option>
                    <option value="Paper Presented">Paper Presented</option>
                    <option value="Key Note Speaker">Key Note Speaker</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="organizing_institute">Organizing Institute/College/University Details</label>
                <input type="text" class="form-control" id="organizing_institute" name="organizing_institute" >
            </div>
            <div class="form-group">
                <label class="form-label" for="organising_secretary">Organising Secretary</label>
                <input type="text" class="form-control" id="organising_secretary" name="organising_secretary">
            </div>
            <div class="form-group">
                <label class="form-label" for="joint_secretary">Joint Secretary</label>
                <input type="text" class="form-control" id="joint_secretary" name="joint_secretary">
            </div>
            <div class="form-group">
                <label class="form-label" for="start_date_of_conference">Start Date of Conference</label>
                <input type="date" class="form-control" id="start_date_of_conference" name="start_date_of_conference" >
            </div>
            <div class="form-group">
                <label class="form-label" for="date_of_validity">Date of Validity of Conference</label>
                <input type="date" class="form-control" id="date_of_validity" name="date_of_validity" >
            </div>
            <div class="form-group">
                <label class="form-label" for="no_of_days_attended">No of Days Attended</label>
                <input type="number" class="form-control" id="no_of_days_attended" name="no_of_days_attended" min="1" >
            </div>
          </br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <div class="table-responsive col-lg-12">

<table class="table">
<tr>
    <th>Mode</th>
    <th>Organization Level</th>
    <th>Organizing Board</th>
    <th>Organizing Secretary</th>
    <th>Joint Secretary</th>
    <th>Start Date</th>
    <th>Date of Valedictory</th>
    <th>Days Attended</th>
        <th>Action</th>
    </tr>
    <tbody>                                                
        @foreach($ConferenceDetail as $ConferenceDetailShow)
        <tr>
       <td>{{$ConferenceDetailShow['conference_type']}}</td>
       <td>{{$ConferenceDetailShow['national_international']}}</td>
      
       <td>{{$ConferenceDetailShow['organizing_institute']}}</td>
       <td>{{$ConferenceDetailShow['organising_secretary']}}</td>
       <td>{{$ConferenceDetailShow['joint_secretary']}}</td>
       <td>{{$ConferenceDetailShow['start_date_of_conference']}}</td>
       <td>{{$ConferenceDetailShow['date_of_validity']}}</td>
       <td>{{$ConferenceDetailShow['no_of_days_attended']}}</td>
            <td>
            <button type="button" onclick="deleteRecordConferenceDetail({{ $ConferenceDetailShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

    </div>

    <div id="Seminars" class="tab-content">
        <h3>Seminars</h3>
        
        <form action="{{ route('seminarsstore') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
        <label class="form-label" for="seminar_type">Online/Offline:</label>
        <select class="form-control" id="seminar_type" name="seminar_type" >
            <option value="online">Online</option>
            <option value="offline">Offline</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="theme_topic">Theme/Topic of Seminar:</label>
        <input type="text" class="form-control" id="theme_topic" name="theme_topic" >
    </div>

    <div class="form-group">
        <label class="form-label" for="seminar_level">National/International:</label>
        <select class="form-control" id="seminar_level" name="seminar_level" >
            <option value="national">National</option>
            <option value="international">International</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="participation_type">Participated/Paper Presented/Key Note Speaker:</label>
        <select class="form-control" id="participation_type" name="participation_type" >
            <option value="participated">Participated</option>
            <option value="paper_presented">Paper Presented</option>
            <option value="key_note_speaker">Key Note Speaker</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label" for="seminar_date">Date of Seminar:</label>
        <input type="date" class="form-control" id="seminar_date" name="seminar_date" >
    </div>

    <div class="form-group">
        <label class="form-label" for="organizing_institute">Organizing Institute/College/University Details:</label>
        <input type="text" class="form-control" id="organizing_institute" name="organizing_institute" >
    </div>
                                                                </br>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <div class="table-responsive col-lg-12">

<table class="table">
<tr>
<th>Title</th>
    <th>Mode</th>
    <th>Organization Level</th>
    <th>Organizing Board</th>
    <th>Join Type</th>
    <th>Start Date</th>
        <th>Action</th>
    </tr>
    <tbody>                                                
        @foreach($Seminar as $SeminarShow)
        <tr>
        
        <td>{{$SeminarShow['seminar_type']}}</td>
        <td>{{$SeminarShow['theme_topic']}}</td>
        <td>{{$SeminarShow['seminar_level']}}</td>
        <td>{{$SeminarShow['participation_type']}}</td>
        <td>{{$SeminarShow['seminar_date']}}</td>
        <td>{{$SeminarShow['organizing_institute']}}</td>
            <td>
            <button type="button" onclick="deleteRecordSeminar({{ $SeminarShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>

    <div id="Workshops" class="tab-content">
        <h3>Workshops</h3>
       
        <form action="{{ route('workshopsstore') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label class="form-label" for="workshop_type">Online/Offline:</label>
        <select class="form-control" id="workshop_type" name="workshop_type" >
            <option value="online">Online</option>
            <option value="offline">Offline</option>
        </select>

        <label class="form-label" for="theme_topic">Theme/Topic of Workshop:</label>
        <input type="text" class="form-control" id="theme_topic" name="theme_topic" >

        <label class="form-label" for="workshop_level">National/International:</label>
        <select class="form-control" id="workshop_level" name="workshop_level" >
            <option value="national">National</option>
            <option value="international">International</option>
        </select>

        <label class="form-label" for="participation_type">Participated/Paper Presented/Key Note Speaker:</label>
        <select class="form-control" id="participation_type" name="participation_type" >
            <option value="participated">Participated</option>
            <option value="paper_presented">Paper Presented</option>
            <option value="key_note_speaker">Key Note Speaker</option>
        </select>

        <label class="form-label" for="organizing_institute">Organizing Institute/College/University Details:</label>
        <input type="text" class="form-control" id="organizing_institute" name="organizing_institute" >

        <label class="form-label" for="organizing_secretary">Organizing Secretary:</label>
        <input type="text" class="form-control" id="organizing_secretary" name="organizing_secretary" >

        <label class="form-label" for="joint_secretary">Joint Secretary:</label>
        <input type="text" class="form-control" id="joint_secretary" name="joint_secretary" >

        <label class="form-label" for="start_date">Start Date of Workshop:</label>
        <input type="date" class="form-control" id="start_date" name="start_date" >

        <label class="form-label" for="validity_date">Date of Validity of Workshop:</label>
        <input type="date" class="form-control" id="validity_date" name="validity_date" >

        <label class="form-label" for="days_attended">No of Days Attended:</label>
        <input type="number" class="form-control" id="days_attended" name="days_attended" >

        <label class="form-label" for="sponsoring_body">Sponsoring Body:</label>
        <input type="text" class="form-control" id="sponsoring_body" name="sponsoring_body" >

        
                                                                </br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>


    <div class="table-responsive col-lg-12">

<table class="table">
<tr>
<th>Theme/Topic</th>
    <th>Sponsoring Body</th>
    <th>Mode</th>
    <th>Organization Level</th>
    <th>Organizing Board</th>
    <th>Organizing Secretary</th>
    <th>Joint Secretary</th>
    <th>Start Date</th>
    <th>Date of Valedictory</th>
    <th>Days Attended</th>
        <th>Action</th>
    </tr>
    <tbody>                                                
        @foreach($Workshop as $WorkshopShow)
        <tr>
            <td>{{$WorkshopShow['sponsoring_body']}}</td>
       <td>{{$WorkshopShow['workshop_type']}}</td>
       <td>{{$WorkshopShow['theme_topic']}}</td>
       <td>{{$WorkshopShow['workshop_level']}}</td>

       <td>{{$WorkshopShow['organizing_institute']}}</td>
       <td>{{$WorkshopShow['organizing_secretary']}}</td>
       <td>{{$WorkshopShow['joint_secretary']}}</td>
       <td>{{$WorkshopShow['start_date']}}</td>
       <td>{{$WorkshopShow['validity_date']}}</td>
       <td>{{$WorkshopShow['days_attended']}}</td>
       
            <td>
            <button type="button" onclick="deleteRecordWorkshop({{ $WorkshopShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>

    <div id="Patents" class="tab-content">
        <h3>Patents</h3>
       
        <form action="{{ route('patentsstore') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label class="form-label" for="title">Title of Patent:</label>
        <input type="text" class="form-control" id="title" name="title" >

        <label class="form-label" for="status">Status:</label>
        <input type="text" class="form-control" id="status" name="status" >

        <label class="form-label" for="patent_agency">Patent Agency:</label>
        <input type="text" class="form-control" id="patent_agency" name="patent_agency" >

        <label class="form-label" for="number_and_date">Number and Date:</label>
        <input type="text" class="form-control" id="number_and_date" name="number_and_date" >

                                                                </br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>


    
    <div class="table-responsive col-lg-12">

<table class="table">
<tr>
<th>Patent Title</th>
    <th>Patent Status</th>
    <th>Patent Agency</th>
    <th>Number and Date</th>
        <th>Action</th>
    </tr>
    <tbody>                                                
        @foreach($Patent as $PatentShow)
        <tr>
        <td>{{$PatentShow['title']}}</td>
        <td>{{$PatentShow['status']}}</td>
        <td>{{$PatentShow['patent_agency']}}</td>
        <td>{{$PatentShow['number_and_date']}}</td>
            <td>
            <button type="button" onclick="deleteRecordPatent({{ $PatentShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>

    <div id="Awards" class="tab-content">
        <h3>Awards</h3>
       
        <form action="{{ route('awardsstore') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label class="form-label" for="title">Title of Award:</label>
        <input type="text" class="form-control" id="title" name="title" >

        <label class="form-label" for="year">Year of Award:</label>
        <input type="number" class="form-control" id="year" name="year" min="1900" max="2099" >

        <label class="form-label" for="awarding_agency">Awarding Agency:</label>
        <input type="text" class="form-control" id="awarding_agency" name="awarding_agency" >

        <label class="form-label" for="type">Type of Award:</label>
        <input type="text" class="form-control" id="type" name="type" >

                                                                </br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>


      
    <div class="table-responsive col-lg-12">

<table class="table">
<tr>
<th>Award Title</th>
    <th>Award Year</th>
    <th>Awarding Agency</th>
    <th>Award Type</th>
        <th>Action</th>
    </tr>
    <tbody>                                                
        @foreach($Award as $AwardShow)
        <tr>

       <td>{{$AwardShow['title']}}</td>
       <td>{{$AwardShow['year']}}</td>
       <td>{{$AwardShow['awarding_agency']}}</td>
       <td>{{$AwardShow['type']}}</td>
       
            <td>
            <button type="button" onclick="deleteRecordAward({{ $AwardShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>

    <div id="Memberships" class="tab-content">
        <h3>Memberships</h3>
       
        <form action="{{ route('membershipsstore') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label class="form-label" for="detail">Detail of Membership:</label>
        <input type="text" class="form-control" id="detail" name="detail" >

        <label class="form-label" for="membership_number">Membership Number:</label>
        <input type="text" class="form-control" id="membership_number" name="membership_number" >

        <label class="form-label" for="year">Year of Membership:</label>
        <input type="number" class="form-control" id="year" name="year" min="1900" max="2099" >

        <label class="form-label" for="validity">Validity of Membership:</label>
        <input type="date" class="form-control" id="validity" name="validity" >

                                                                </br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <div class="table-responsive col-lg-12">

<table class="table">
<tr>
<th>Membership Number</th>
    <th>Membership Detail</th>
    <th>Year</th>
    <th>Validity</th>
        <th>Action</th>
    </tr>
    <tbody>                                                
        @foreach($Membership as $MembershipShow)
        <tr>
       <td>{{$MembershipShow['detail']}}</td>
       <td>{{$MembershipShow['membership_number']}}</td>
       <td>{{$MembershipShow['year']}}</td>
       <td>{{$MembershipShow['validity']}}</td>
      
       
            <td>
            <button type="button" onclick="deleteRecordMembership({{ $MembershipShow['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    </div>

    <!-- <div id="Courses" class="tab-content">
        <h3>Courses</h3>
        <p>Details about courses...</p>
    </div> -->
    <br><div class="card-footer text-end">
                                                <button type="submit" class="btn btn-secondary" name="action"
                                                    value="previous">Previous</button>
                                                <button type="submit" class="btn btn-primary" name="action"
                                                    value="next">Next</button>
                                        </div>
                                                                </div>
    @endif







<!-- 4=7 -->


                                        @if($step == 5)   
                                        <div class="tab-pane {{ $step == 5 ? 'active' : '' }}" id="Experience">
                                            <h3>Experience</h3>
                                            <div class="alert alert-danger" role="alert">
                                       <b>Note: </b> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8h8.5a1.5 1.5 0 0 1 0 3h-7.5" /><path d="M13.5 11h2a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M14.5 14a1.5 1.5 0 0 1 0 3h-1.5" /><path d="M13.5 17a1.5 1.5 0 1 1 0 3h-4.5a6 6 0 0 1 -6 -6v-2v.208a6 6 0 0 1 2.7 -5.012l.3 -.196q .718 -.468 5.728 -3.286a1.5 1.5 0 0 1 2.022 .536c.44 .734 .325 1.674 -.28 2.28l-1.47 1.47" /></svg>&nbsp;
                                       These details are not required. Please fill in the information if you have any Experience. If not, you may ignore these sections.
</div>
                                            <div class="col-lg-12">

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                    <label class="form-label ">Experience Type</label>
                                                        <select name="experienceType" class="form-select">
                                                            <option value="">Select</option>

                                                            <option value="Education">Education</option>
                                                            <option value="Teaching">Teaching</option>
                                                            <option value="Non-Teaching">Non-Teaching</option>
                                                            <option value="Industry">Industry</option>
                                                            <option value="Research">Research</option>
                                                            <option value="Administration">Administration</option>
                                                            <option value="Consulting">Consulting</option>
                                                            <option value="Freelance">Freelance</option>
                                                            <option value="Other Experience">Other Experience</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                    <label class="form-label ">Designation</label>
                                                        <input type="text" name="designation" class="form-control"
                                                            placeholder="Enter Designation...">
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                    <label class="form-label ">Department/Organization</label>
                                                        <input type="text" name="department" class="form-control"
                                                            placeholder="Enter Department Name...">
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                                   
    <label class="form-label ">Job Status</label>
    <select id="jobStatus" class="form-select">
        <option value="">Select Status</option>
        <option value="working">Working</option>
        <option value="leave">Leave</option>
    </select>
</div>
<div id="joiningDateDiv" class="col-lg-3 col-md-3 col-sm-6" style="display: none;">
    <label class="form-label ">Joining Date</label>
    <input type="date" id="joiningDate" name="from_date" class="form-control">
</div>

<div id="leaveDateDiv" class="col-lg-3 col-md-3 col-sm-6"  style="display: none;">
    <label class="form-label ">Leave Date</label>
    <input type="date" id="leaveDate" name="to_date" class="form-control">
</div>

<div id="totalExperienceDiv" class="col-lg-3 col-md-3 col-sm-6"  style="display: none;">
    <label class="form-label ">Total Experience</label>
    <input type="text" id="totalExperience" name="totalExperience" class="form-control" readonly>
</div>

                                                    <!-- <div class="col-lg-3 col-md-3 col-sm-6">
                                                    <label class="form-label ">Salary</label>
                                                        <input class="form-control" type="number"
                                                            placeholder="Enter Salary Amount..." name="salary">
                                                    </div> -->
                                                    <div class="col-lg-4 col-md-4 col-sm-6" id="leaveResion"  style="display: none;">
                                                    <label class="form-label required">Reason of Leaving</label>
                                                        <input class="form-control" type="text" name="left_reason"
                                                            placeholder="Reason of Leaving...">
                                                    </div>

                                                    <div class="col-lg-1 col-md-1 col-sm-6">
                                                    <label class="form-label">Action</label>
                                                        <input type="submit" name="action" class="btn btn-primary"
                                                            value="Save">
                                                    </div>
                                                </div>

                                            </div>


                                            <br>
                                            <div class="row">
                                            <div class="table-responsive col-lg-12">

                                                    <table class="table">
                                                
                                                            <tr>
                                                                <th>Experience Type</th>
                                                                <th>Designation</th>
                                                                <th>Department / Organization</th>
                                                                <th>Date of Joining</th>
                                                                <th>Date of Leaving</th>
                                                                <th>Total Experience</th>
                                                               
                                                                <th>Action</th>

                                                            </tr>
                                                
                                                        <tbody>
                                                            @foreach($experienceData as $experienceDataValue)
                                                            <tr>

                                                                <td>{{$experienceDataValue['experienceType']}}</td>
                                                                <td>{{$experienceDataValue['designation']}}</td>
                                                                <td>{{$experienceDataValue['department']}}</td>
                                                                <td>{{$experienceDataValue['from_date']}}</td>
                                                                <td>{{$experienceDataValue['to_date'] ??'Working'}}</td>
                                                                <td>{{$experienceDataValue['experiencefile']}}</td>
                                                             
                                                                <td>    <button type="button" onclick="deleteRecordExperience({{ $experienceDataValue['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
                                                      
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br><div class="card-footer text-end">
                                            <button type="submit" class="btn btn-secondary" name="action"
                                                value="previous">Previous</button>
                                            <button type="submit" class="btn btn-primary" name="action"
                                                value="next">Next</button>
                                                                </div>
                                        </div>

                                        @endif

                                        @if($step == 6)
                                        <div class="tab-pane {{ $step == 6 ? 'active' : '' }}">
                                            <h3>Projects</h3>
                                            <div class="alert alert-danger" role="alert">
                                       <b>Note: </b> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 8h8.5a1.5 1.5 0 0 1 0 3h-7.5" /><path d="M13.5 11h2a1.5 1.5 0 0 1 0 3h-2.5" /><path d="M14.5 14a1.5 1.5 0 0 1 0 3h-1.5" /><path d="M13.5 17a1.5 1.5 0 1 1 0 3h-4.5a6 6 0 0 1 -6 -6v-2v.208a6 6 0 0 1 2.7 -5.012l.3 -.196q .718 -.468 5.728 -3.286a1.5 1.5 0 0 1 2.022 .536c.44 .734 .325 1.674 -.28 2.28l-1.47 1.47" /></svg>&nbsp;
                                       These details are not required. Please fill in the information if you have any project. If not, you may ignore these sections.
</div>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-6">
                                                    <label class="form-label ">Title Project</label>
                                                    <input type="text" name="title" class="form-control"
                                                    placeholder="Enter Your Role...">
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    <label class="form-label ">Project Description</label>
                                                    <textarea name="discription" class="form-control"
                                                    placeholder="Enter Project Description..." rows="1"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label class="form-label ">Technologies Used(Optional)</label>
                                                    <input type="text" name="technologies" class="form-control"
                                                    placeholder="Enter Technologies Used...">
                                                </div>
                                                
                                                
                                                
                                                <div class="col-lg-5 col-md-5 col-sm-12">
                                                    <label class="form-label ">Project URL(Optional)</label>
                                                    <input type="url" name="projectUrl" class="form-control"
                                                    placeholder="Enter Project URL...">
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-12">
                                                    <label class="form-label">Action</label>
                                                    <input type="submit" name="action" class="btn btn-primary"
                                                    value="Save">
                                                </div>
                                            </div>
                                        </br>
                                            <div class="row">
                                                <div class="table-responsive col-lg-12">
                                                    
                                                    <table class="table">
                                                        
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Discription</th>
                                                                <th>Technologies</th>

                                                                <th>Project URL</th>
                                                                <th>Action</th>

                                                            </tr>
                                                            
                                                            <tbody>
                                                                @foreach($projectData as $projectDataValue)
                                                                
                                                                <tr>
                                                                    
                                                                    

                                                                    
                                                                    <td>{{$projectDataValue['title']}}</td>
                                                                    <td>{{$projectDataValue['discription']}}</td>
                                                                    <td>{{$projectDataValue['technologies']}}</td>
                                                                    <td>{{$projectDataValue['projectUrl']}}</td>
                                                                    
                                                                    <td>
                                                                        <button type="button" onclick="deleteRecord({{ $projectDataValue['id'] }})" class="btn btn-danger btn-sm">  Delete </button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br><div class="card-footer text-end">
                                                <button type="submit" class="btn btn-secondary" name="action"
                                                value="previous">Previous</button>
                                                <button type="submit" class="btn btn-primary" name="action"
                                                value="next">Next</button>
                                            </div>
                                            <!-- <button type="submit" class="btn btn-success" name="action" value="submit">Submit</button> -->
                                        </div>
                                        @endif
                                        @if($step == 7)
                                        <div class="tab-pane {{ $step == 7 ? 'active' : '' }}">
                                            <h3>Projects</h3>
                                            
    <div class="container">
        <!-- Summary Field -->
        <div class="form-group">
        <label class="form-label required">Summary</label>
            <textarea id="summary" name="summary" class="form-control" rows="4">{{ $summary ?? '' }}</textarea>
        </div>

        <!-- Image Upload Field -->
        <div class="form-group">
        <label class="form-label required">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <br>
        @if ($image)
    <img src="data:image/jpeg;base64,{{ $image }}" width="150" height="180" alt="Profile Image">
@endif
                                                                </br>
                                                                </br>
        <!-- Languages Field -->
        <div class="form-group">
    <label class="form-label required">Languages</label>
    <input id="languages" name="languages" placeholder="Type to add languages" class="form-control" value="{{ is_array($languages) ? implode(', ', $languages) : $languages }}">
</div>

        <!-- Skills Field -->
        <div class="form-group">
    <label class="form-label required">Skills</label>
    <input id="skills" name="skills" placeholder="Type to add skills" class="form-control" value="{{ is_array($skills) ? implode(', ', $skills) : $skills }}">
</div>

        <!-- Submit Button -->
        <br><div class="card-footer text-end">
                                                <button type="submit" class="btn btn-secondary" name="action"
                                                value="previous">Previous</button>
                                                <button type="submit" class="btn btn-primary" name="action"
                                                value="final">Submit</button>
                                            </div>
    </div>

                                        </div>
                                        </form>
@endif
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('admin.footer')
</div>

@include('admin.scripts')



