<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Preview</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
        }
        .header {
            margin-bottom: 30px;
            overflow: hidden;
        }
        .header table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }
        .header td {
            vertical-align: top;
            padding: 10px;
        }
        .header img.profile-img {
            border-radius: 0;
            border: 2px solid #007bff;
            max-width: 120px;
            height: 150px;
            display: block;
            margin-left: auto;
        }
        h1, h3 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 20px;
            color: #007bff;
        }
        .resume-heading {
            text-align: center;
            margin-bottom: 30px;
            font-size:15px;
        }
        .preview-section {
            margin-bottom: 30px;
        }
        .table-style {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }
        .table-style th, .table-style td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
            white-space: normal; /* Ensure text wraps */
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn-group {
            text-align: center;
            margin-top: 20px;
        }
        .btn-print, .btn-edit, .btn-download {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-print {
            background-color: #007bff;
        }
        .btn-print:hover {
            background-color: #0056b3;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-edit:hover {
            background-color: #218838;
        }
        .btn-download {
            background-color: #dc3545;
        }
        .btn-download:hover {
            background-color: #c82333;
        }
        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            border-top: 2px solid #007bff;
            padding-top: 10px;
        }
        @media print {
            @page {
                margin: 5mm;
            }
            .btn-print,.btn-edit{
                display:none;
            }
            body, html {
                margin: 0;
                padding: 0;
                overflow: visible;
                background: #fff;
                font-size: 16px; /* Set font size to 16px */
            }
            .container {
                padding: 0;
                margin: 0;
                width: 100%;
                border: none;
                box-shadow: none;
                page-break-inside: avoid;
            }
            .header {
                page-break-after: avoid;
            }
            .header table {
                table-layout: auto;
            }
            .header img.profile-img {
                margin-left: 0;
                max-width: 100px;
                height: 150px;
            }
            h3 {
                page-break-after: avoid;
                font-size: 16px;
                margin-bottom: 10px;
            }
            h1{
                page-break-after: avoid;
                font-size: 28px;
                margin-bottom: 10px;
            }
            .preview-section {
                page-break-inside: avoid;
                margin-bottom: 20px;
            }
            .table-style th, .table-style td {
                /* padding: 5px; */
                font-size: 14px; /* Set font size to 16px */
            }
            .table-style {
                width: 100%;
                page-break-inside: avoid;
            }
            .footer {
                page-break-before: avoid;
                font-size: 16px; /* Ensure the footer is properly styled */
            }
        }
    </style>
</head>
<body>
    <div class="container" id="resume-content">
        <!-- Resume Heading -->
        <div class="resume-heading">
            <h1>Resume</h1>
        </div>

        <!-- Header: Contact Info and Image -->
        <div class="header">
            <h3>Professional Summary</h3>
            <table class="table-style">
                <tr>
                    <td style="width: 90%;">
                        <table class="table-style">
                        <tr>
                                <td colspan="2">
                                    @if (!empty($summary))
                                        <div class="">
                                          
                                            <p style="white-space: normal;">{{ $summary }}</p>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ $formData['email'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Mobile Number:</strong></td>
                                <td>{{ $formData['phone'] ?? '' }}</td>
                            </tr>
                           
                        </table>
                    </td>
                    <td style="width: 10%;">
                        @if ($image)
                            <img src="data:image/jpeg;base64,{{ $image }}" alt="Profile Image" class="profile-img">
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <!-- Skills and Languages -->
        @if (!empty($skills) || !empty($languages))
            <div class="preview-section">
                @if (!empty($skills))
                    <h3>Skills</h3>
                    <p>
                        @php
                            $skillsArray = json_decode($skills, true);
                            $skillsList = array_column($skillsArray, 'value');
                            echo implode(', ', $skillsList);
                        @endphp
                    </p>
                @endif
                @if (!empty($languages))
                    <h3>Languages</h3>
                    <p>
                        @php
                            $languagesArray = json_decode($languages, true);
                            $languagesList = array_column($languagesArray, 'value');
                            echo implode(', ', $languagesList);
                        @endphp
                    </p>
                @endif
            </div>
        @endif

        <!-- Educational Details -->
        @if (!empty($academicData))
            <div class="preview-section">
                <h3>Educational Details</h3>
                <div class="table-responsive">
                    <table class="table-style">
                        <thead>
                            <tr>
                                <th>Qualification</th>
                                <th>Course</th>
                                <th>Mode</th>
                                <th>School/College</th>
                                <th>University/Board</th>
                                <th>Date of Passing</th>
                                <th>Obtained Marks</th>
                                <th>Total Marks</th>
                                <th>CGPA</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($academicData as $academicDataValue)
                                <tr>
                                    <td>{{ $academicDataValue['qualification_name'] ?? '' }}</td>
                                    <td>{{ $academicDataValue['course'] }}</td>
                                    <td>{{ $academicDataValue['mode'] }}</td>
                                    <td>{{ $academicDataValue['school_clg'] }}</td>
                                    <td>{{ $academicDataValue['uni_board'] }}</td>
                                    <td>{{ $academicDataValue['passing_date'] }}</td>
                                    <td>{{ $academicDataValue['marks_obtained'] }}</td>
                                    <td>{{ $academicDataValue['total_marks'] }}</td>
                                    <td>{{ $academicDataValue['cgpa'] }}</td>
                                    <td>{{ $academicDataValue['percent'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

      
        @if (!empty($BookA))
            <div class="preview-section">
                <h3>Books/Chapters/Articles</h3>
                <table class="table-style">
    <tr>
    <th>First Author</th>
<th>Co Authors</th>
<th>Title of Book</th>
<th>Publisher</th>
<th>ISSN/ISBN No</th>
<th>Type of BooK</th>
        
    </tr>

    <tbody>

        @foreach($BookA as $BookShow)
        <tr>
            <td>{{$BookShow['first_author']}}</td>
            <td>{{$BookShow['co_authors']}}</td>
            <td>{{$BookShow['title_of_book']}}</td>
            <td>{{$BookShow['publisher']}}</td>
            <td>{{$BookShow['issn_isbn_no']}}</td>
            <td>{{$BookShow['type_of_book']}}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Publications -->
        @if (!empty($PublicationA))
            <div class="preview-section">
                <h3>Publications</h3>
                <table class="table-style">
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
    </tr>

    <tbody>
                                                                
        @foreach($PublicationA as $PublicationShow)
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
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Thesis Supervised -->
        @if (!empty($ThesisSupervisedA))
            <div class="preview-section">
                <h3>Thesis Supervised</h3>
                <table class="table-style">
                    <thead>
                        <tr>
                            <th>Title of Research</th>
                            <th>Supervisor</th>
                            <th>Co-Supervisor</th>
                            <th>Year of Completion</th>
                            <th>Name of University</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ThesisSupervisedA as $thesis)
                            <tr>
                                <td>{{ $thesis['title_of_research'] }}</td>
                                <td>{{ $thesis['supervisor'] }}</td>
                                <td>{{ $thesis['co_supervisor'] }}</td>
                                <td>{{ $thesis['year_of_completion'] }}</td>
                                <td>{{ $thesis['name_of_university'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Conference Details -->
        @if (!empty($ConferenceDetailA))
            <div class="preview-section">
                <h3>Conferences</h3>
                <table class="table-style">
<tr>
    <th>Mode</th>
    <th>Organization Level</th>
    <th>Organizing Board</th>
    <th>Organizing Secretary</th>
    <th>Joint Secretary</th>
    <th>Start Date</th>
    <th>Date of Valedictory</th>
    <th>Days Attended</th>
      
    </tr>
    <tbody>                                                
        @foreach($ConferenceDetailA as $ConferenceDetailShow)
        <tr>
       <td>{{$ConferenceDetailShow['conference_type']}}</td>
       <td>{{$ConferenceDetailShow['national_international']}}</td>

       <td>{{$ConferenceDetailShow['organizing_institute']}}</td>
       <td>{{$ConferenceDetailShow['organising_secretary']}}</td>
       <td>{{$ConferenceDetailShow['joint_secretary']}}</td>
       <td>{{$ConferenceDetailShow['start_date_of_conference']}}</td>
       <td>{{$ConferenceDetailShow['date_of_validity']}}</td>
       <td>{{$ConferenceDetailShow['no_of_days_attended']}}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Seminars -->
        @if (!empty($SeminarA))
            <div class="preview-section">
                <h3>Seminars</h3>
                <table class="table-style">
<tr>
<th>Title</th>
    <th>Mode</th>
    <th>Organization Level</th>
    <th>Organizing Board</th>
    <th>Join Type</th>
    <th>Start Date</th>
     
    </tr>
    <tbody>                                                
        @foreach($SeminarA as $SeminarShow)
        <tr>
        
        <td>{{$SeminarShow['seminar_type']}}</td>
        <td>{{$SeminarShow['theme_topic']}}</td>
        <td>{{$SeminarShow['seminar_level']}}</td>
        <td>{{$SeminarShow['participation_type']}}</td>
        <td>{{$SeminarShow['seminar_date']}}</td>
        <td>{{$SeminarShow['organizing_institute']}}</td>
          
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Workshops -->
        @if (!empty($WorkshopA))
            <div class="preview-section">
                <h3>Workshops</h3>
                <table class="table-style">
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
     
    </tr>
    <tbody>                                                
        @foreach($WorkshopA as $WorkshopShow)
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
       
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Patents -->
        @if (!empty($PatentA))
            <div class="preview-section">
                <h3>Patents</h3>
                <table class="table-style">
<tr>
<th>Patent Title</th>
    <th>Patent Status</th>
    <th>Patent Agency</th>
    <th>Number and Date</th>
    
    </tr>
    <tbody>                                                
        @foreach($PatentA as $PatentShow)
        <tr>
        <td>{{$PatentShow['title']}}</td>
        <td>{{$PatentShow['status']}}</td>
        <td>{{$PatentShow['patent_agency']}}</td>
        <td>{{$PatentShow['number_and_date']}}</td>
         
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Memberships -->
        @if (!empty($MembershipA))
            <div class="preview-section">
                <h3>Memberships</h3>
                <table class="table-style">
<tr>
<th>Membership Number</th>
    <th>Membership Detail</th>
    <th>Year</th>
    <th>Validity</th>
       
    </tr>
    <tbody>                                                
        @foreach($MembershipA as $MembershipShow)
        <tr>
       <td>{{$MembershipShow['detail']}}</td>
       <td>{{$MembershipShow['membership_number']}}</td>
       <td>{{$MembershipShow['year']}}</td>
       <td>{{$MembershipShow['validity']}}</td>
      
       

        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Awards -->
        @if (!empty($AwardA))
            <div class="preview-section">
                <h3>Awards</h3>
                <table class="table-style">
<tr>
<th>Award Title</th>
    <th>Award Year</th>
    <th>Awarding Agency</th>
    <th>Award Type</th>
    
    </tr>
    <tbody>                                                
        @foreach($AwardA as $AwardShow)
        <tr>

       <td>{{$AwardShow['title']}}</td>
       <td>{{$AwardShow['year']}}</td>
       <td>{{$AwardShow['awarding_agency']}}</td>
       <td>{{$AwardShow['type']}}</td>
       
         
        </tr>
        @endforeach
    </tbody>
</table>
            </div>
        @endif

        <!-- Research Projects -->
        @if (!empty($ResearchA))
            <div class="preview-section">
                <h3>Research Projects</h3>
                <table class="table-style">
                                                                <tr>
                                                                    <th>Research Interest</th>
                                                                    <th>Area of Research</th>
                                                                  
                                                                </tr>
                                                                <tbody>
                                                                
                                                                    @foreach($ResearchA as $ResearchShow)
                                                                    <tr>
                                                                        <td>{{$ResearchShow['research_interest']}}</td>
                                                                        <td>{{$ResearchShow['area_of_research']}}</td>
                                                                       
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
            </div>
        @endif

  <!-- Experience -->
  @if (!empty($experienceData))
            <div class="preview-section">
                <h3>Experience</h3>
                <div class="table-responsive">
                    <table class="table-style">
                        <thead>
                            <tr>
                                <th>Experience Type</th>
                                <th>Designation</th>
                                <th>Department/Organization</th>
                                <th>Date of Joining</th>
                                <th>Date of Leaving</th>
                                <th>Total Experience</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($experienceData as $experienceDataValue)
                                <tr>
                                    <td>{{ $experienceDataValue['experienceType'] }}</td>
                                    <td>{{ $experienceDataValue['designation'] }}</td>
                                    <td>{{ $experienceDataValue['department'] }}</td>
                                    <td>{{ $experienceDataValue['from_date'] }}</td>
                                    <td>{{ $experienceDataValue['to_date'] ?? 'Working' }}</td>
                                    <td>{{ $experienceDataValue['experiencefile'] }}</td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <!-- Projects -->
        @if (!empty($projectData))
            <div class="preview-section">
                <h3>Projects</h3>
                <div class="table-responsive">
                    <table class="table-style">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Technologies Used</th>
                                <th>Project URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projectData as $projectDataValue)
                                <tr>
                                    <td>{{ $projectDataValue['title'] }}</td>
                                    <td>{{ $projectDataValue['discription'] }}</td>
                                    <td>{{ $projectDataValue['technologies'] }}</td>
                                    <td class="project-url"><a href="{{ $projectDataValue['projectUrl'] }}" target="_blank">{{ $projectDataValue['projectUrl'] }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Address Information -->
        @if (!empty($formData['permanentAddress']) || !empty($formData['pincode']) || !empty($formData['state']) || !empty($formData['district']))
            <div class="preview-section">
                <h3>Address Information</h3>
                <table class="table-style">
                    @if (!empty($formData['permanentAddress']))
                        <tr>
                            <td>Permanent Address:</td>
                            <td>{{ $formData['permanentAddress'] }}</td>
                        </tr>
                    @endif
                    @if (!empty($formData['pincode']))
                        <tr>
                            <td>Postal Code:</td>
                            <td>{{ $formData['pincode'] }}</td>
                        </tr>
                    @endif
                    @if (!empty($formData['state']))
                        <tr>
                            <td>State:</td>
                            <td>{{ $formData['state'] }}</td>
                        </tr>
                    @endif
                    @if (!empty($formData['district']))
                        <tr>
                            <td>District:</td>
                            <td>{{ $formData['district'] }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        @endif

        <!-- Signature and Date Section -->
         <br><br><br>
        <div class="signature-date">
            <div class="signature" >
                <span style="float:right">Signature___________________</span>
                <span>Date: ____________________</span>
            </div>
          
        </div>
        <br><br>

        <!-- Print, Download PDF, and Edit Buttons -->
        <div class="button-container">
            <button class="btn-print" onclick="window.print()">Print</button>
            <button class="btn-edit" onclick="window.location.href='/form/6'">Edit</button>
        </div>
    </div>
</body>
</html>
