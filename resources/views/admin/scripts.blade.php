  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('public/lib/wow/wow.min.js')}}"></script>
    <script src="{{url('public/lib/easing/easing.min.js')}}"></script>
    <script src="{{url('public/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{url('public/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{url('public/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{url('public/lib/js/main.js')}}"></script>
      
</body>
</html>

<script>
function calculatePercentage() {
        var totalMarks = parseFloat(document.getElementById('total_marks').value);
        var obtainedMarks = parseFloat(document.getElementById('obtained_marks').value);
        var percent = document.getElementById('percent');
// alert(totalMarks)
        if (totalMarks && obtainedMarks) {
            percent.value = ((obtainedMarks / totalMarks) * 100).toFixed(2) + '%';
        } else {
            percent.value = '0%';
        }
    }

    function handleVisibility() {
        var measurementType = document.getElementById('measurement_type');
        var obtainedMarksContainer = document.getElementById('obtained_marks_container');
        var totalMarksContainer = document.getElementById('total_marks_container');
        var cgpaContainer = document.getElementById('cgpa_container');
        var percentContainer = document.getElementById('percent_container');
            var selectedValue = measurementType.value;

            if (selectedValue === 'cgpa') {
                obtainedMarksContainer.style.display = 'none';
                totalMarksContainer.style.display = 'none';
                percentContainer.style.display = 'none';
                cgpaContainer.style.display = 'block';
            } else if (selectedValue === 'percent') {
                cgpaContainer.style.display = 'none';
                obtainedMarksContainer.style.display = 'block';
                totalMarksContainer.style.display = 'block';
                percentContainer.style.display = 'block';
            } else {
                obtainedMarksContainer.style.display = 'block';
                totalMarksContainer.style.display = 'block';
                cgpaContainer.style.display = 'none';
                percentContainer.style.display = 'none';
            }
        }

        function deleteRecord(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteProject/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
        function deleteRecordEducation(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteEducation/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
        function deleteRecordExperience(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteExperience/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function openTab(event, tabName) {
    // Select only the tabs within the profile-tabs container
    const tabLinks = document.querySelectorAll("#profile-tabs .nav-link");
    const tabContents = document.querySelectorAll(".tab-content");

    // Remove the active, bg-primary, and text-white classes from all tabs
    tabLinks.forEach(link => {
        link.classList.remove("active", "bg-primary", "text-white");
    });
    tabContents.forEach(content => {
        content.style.display = "none";
    });

    // Add the active, bg-primary, and text-white classes to the clicked tab
    event.currentTarget.classList.add("active", "bg-primary", "text-white");

    // Show the content for the clicked tab
    document.getElementById(tabName).style.display = "block";

    // Save the last active tab to localStorage
    localStorage.setItem("lastActiveTab", tabName);
}

function setDefaultTab() {
    // Get the last active tab from localStorage
    const lastActiveTab = localStorage.getItem("lastActiveTab");

    if (lastActiveTab) {
        // Find the corresponding tab link and set it as active
        const defaultTabLink = document.querySelector(`#profile-tabs .nav-link[onclick="openTab(event, '${lastActiveTab}')"]`);
        if (defaultTabLink) {
            openTab({ currentTarget: defaultTabLink }, lastActiveTab);
        }
    } else {
        // Default to the first tab if no last active tab is found
        const defaultTabLink = document.querySelector("#profile-tabs .nav-link.active");
        if (defaultTabLink) {
            const defaultTabName = defaultTabLink.getAttribute("onclick").match(/'([^']+)'/)[1];
            openTab({ currentTarget: defaultTabLink }, defaultTabName);
        }
    }
}

// Initialize default tab on page load
window.onload = setDefaultTab;


function updateCourses() {
            const qualificationId = document.getElementById('Programs').value;
            const courseSelect = document.getElementById('course');

            // Clear existing options
            courseSelect.innerHTML = '<option value="">Choose Course</option>';

            // Fetch courses from server
            if (qualificationId) {
                fetch(`{{ route('courses') }}?qualification_id=${qualificationId}`)
                    .then(response => response.json())
                    .then(courses => {
                        courses.forEach(course => {
                            let option = document.createElement('option');
                            option.value = course.name;
                            option.text = course.name;
                            courseSelect.add(option);
                        });
                    })
                    .catch(error => console.error('Error fetching courses:', error));
            }
        }

        $(document).ready(function() {
            $('#Programs').select2({
                placeholder: 'Select Qualification',
                allowClear: true
            });
            $('#course').select2({
                placeholder: 'Select Course',
                allowClear: true
            });
        });

</script>
<script>
     @if(session('success'))
    var successModal = new bootstrap.Modal(document.getElementById('modal-success'), {});
    successModal.show();
@endif
@if(session('error'))
    var dangerModal = new bootstrap.Modal(document.getElementById('modal-danger'), {});
    dangerModal.show();
@endif

</script>
<script>
// Auto-close alert after 5 seconds (5000 milliseconds)
setTimeout(function() {
    var alertElement = document.getElementById('success-alert');
    if (alertElement) {
        alertElement.style.transition = 'opacity 0.5s ease'; // Smooth fade-out
        alertElement.style.opacity = '0'; // Fade out
        setTimeout(function() {
            alertElement.remove(); // Remove the element from the DOM
        }, 500); // Wait for the fade-out transition to complete
    }
}, 10000); // Adjust the time here (in milliseconds)
</script>
<script>
  document.getElementById('jobStatus').addEventListener('change', function() {
    const jobStatus = this.value;
    const joiningDateDiv = document.getElementById('joiningDateDiv');
    const leaveDateDiv = document.getElementById('leaveDateDiv');
    const totalExperienceDiv = document.getElementById('totalExperienceDiv');
    const leaveResionDiv = document.getElementById('leaveResion');

    joiningDateDiv.style.display = 'none';
    leaveDateDiv.style.display = 'none';
    totalExperienceDiv.style.display = 'none';
    leaveResionDiv.style.display = 'none';

    if (jobStatus === 'working') {
        joiningDateDiv.style.display = 'block';
        leaveDateDiv.style.display = 'none';
        leaveResionDiv.style.display = 'none';
        totalExperienceDiv.style.display = 'block';
    } else if (jobStatus === 'leave') {
        joiningDateDiv.style.display = 'block';
        leaveDateDiv.style.display = 'block';
        totalExperienceDiv.style.display = 'block';
        leaveResionDiv.style.display = 'block';
    }
});

document.getElementById('joiningDate').addEventListener('change', calculateExperience);
document.getElementById('leaveDate').addEventListener('change', calculateExperience);

function calculateExperience() {
    const jobStatus = document.getElementById('jobStatus').value;
    const joiningDate = document.getElementById('joiningDate').value;
    const leaveDate = jobStatus === 'leave' && document.getElementById('leaveDate').value ? document.getElementById('leaveDate').value : new Date().toISOString().split('T')[0];
// alert(joiningDate+'::'+leaveDate)
    if (joiningDate) {
        const start = new Date(joiningDate);
        const end = new Date(leaveDate);

        let years = end.getFullYear() - start.getFullYear();
        let months = end.getMonth() - start.getMonth();

        if (months < 0) {
            years--;
            months += 12;
        }

        const days = end.getDate() - start.getDate();
        if (days < 0) {
            months--;
            if (months < 0) {
                years--;
                months += 12;
            }
        }

        const totalExperience = `${years} years ${months} months`;
        document.getElementById('totalExperience').value = totalExperience;
    }
}

</script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
                var inputSkills = document.querySelector('#skills');
                var tagifySkills = new Tagify(inputSkills, {
                    whitelist: [
                        'Programming', 'Design', 'Management', 'PHP', 'JavaScript', 'Python', 'Java', 'C++', 'Ruby', 'Swift',
                        'SQL', 'HTML', 'CSS', 'React', 'Angular', 'Vue.js', 'Node.js', 'Django', 'Laravel', 'Ruby on Rails',
                        'Android', 'iOS', 'UI/UX Design', 'Graphic Design', 'SEO', 'Digital Marketing', 'Project Management',
                        'Data Analysis', 'Machine Learning', 'Cloud Computing', 'DevOps', 'Cybersecurity', 'Business Analysis',
                        'Database Management', 'Networking', 'Technical Writing', 'JavaScript Frameworks', 'API Development',
                        'Software Testing', 'Quality Assurance', 'Embedded Systems', 'Game Development', 'Blockchain', 'AR/VR',
                        'Web Development', 'Systems Administration', 'Big Data', 'Business Intelligence', 'Salesforce', 'SAP',
                        'Product Management', 'Consulting', 'Training', 'Customer Support', 'Systems Analysis', 'DevOps',
                        'Scrum', 'Agile', 'Content Creation', 'Video Editing', '3D Modeling', 'Animation', 'Photography',
                        'Audio Production', 'Virtualization', 'ERP Systems', 'Data Science', 'Statistical Analysis', 'Mathematics',
                        'Physics', 'Engineering', 'Chemistry', 'Biology', 'Geology', 'Astronomy', 'Architecture', 'Urban Planning',
                        'Civil Engineering', 'Electrical Engineering', 'Mechanical Engineering', 'Chemical Engineering',
                        'Biomedical Engineering', 'Environmental Science', 'Sociology', 'Psychology', 'Economics', 'Finance',
                        'Accounting', 'Law', 'Legal Research', 'Policy Analysis', 'Public Speaking', 'Negotiation', 'Sales',
                        'Marketing', 'Customer Relationship Management', 'E-commerce', 'Supply Chain Management', 'Logistics',
                        'Manufacturing', 'Quality Control', 'Inventory Management', 'Health & Safety', 'Human Resources',
                        'Recruitment', 'Talent Management', 'Employee Relations', 'Organizational Development', 'Training & Development',
                        'Project Coordination', 'Administrative Support', 'Office Management', 'Event Planning', 'Fundraising',
                        'Nonprofit Management', 'Grant Writing', 'Public Relations', 'Media Relations', 'Communications',
                        'Crisis Management', 'Risk Management', 'Legal Compliance', 'Regulatory Affairs'
                    ],
                    enforceWhitelist: false,
                    dropdown: {
                        enabled: 1
                    }
                });
             
            }); 
    </script>
     <script>
            document.addEventListener('DOMContentLoaded', function() {
                var inputLanguages = document.querySelector('#languages');
                var tagify = new Tagify(inputLanguages, {
                    whitelist: [
                        'English', 'Hindi', 'Punjabi', 'Spanish', 'French', 'German', 'Chinese', 'Japanese', 'Korean', 'Italian',
                        'Portuguese', 'Russian', 'Arabic', 'Bengali', 'Turkish', 'Vietnamese', 'Thai', 'Dutch', 'Swedish', 'Greek',
                        'Hebrew', 'Polish', 'Romanian', 'Hungarian', 'Czech', 'Ukrainian', 'Danish', 'Finnish', 'Norwegian', 'Serbo-Croatian',
                        'Slovak', 'Bulgarian', 'Catalan', 'Lithuanian', 'Latvian', 'Estonian', 'Malay', 'Indonesian', 'Swahili', 'Hindi',
                        'Nepali', 'Tamil', 'Telugu', 'Marathi', 'Gujarati', 'Malayalam', 'Sinhala', 'Burmese', 'Khmer', 'Lao', 'Pashto',
                        'Farsi', 'Kurdish', 'Uzbek', 'Kazakh', 'Turkmen', 'Tajik', 'Azerbaijani', 'Georgian', 'Armenian', 'Mongolian', 
                        'Tibetan', 'Japanese', 'Korean', 'Mandarin', 'Cantonese', 'Hokkien', 'Wu', 'Min', 'Hakka'
                    ],
                    enforceWhitelist: false,
                    dropdown: {
                        enabled: 1
                    }
                });
            });



       function  deleteRecordBook(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteBook/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordPublication(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deletePublication/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordThesisSupervised(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteThesisSupervised/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordConferenceDetail(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteConferenceDetail/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordSeminar(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteSeminar/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordWorkshop(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteWorkshop/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordPatent(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deletePatent/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordMembership(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteMembership/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordAward(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteAward/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
function deleteRecordResearch(id){
     if (confirm('Are you sure you want to delete this record?')) {
        fetch('/deleteResearch/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
                // console.log(response);
                location.reload();
            })
       
        .catch(error => {
            alert('An error occurred: ' + error.message);
        });
    }
}
            
document.getElementById('toggleOldPassword').addEventListener('click', function (e) {
    const oldPasswordInput = document.getElementById('oldpassword');
    const icon = this;
    if (oldPasswordInput.type === 'password') {
      oldPasswordInput.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      oldPasswordInput.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });

  document.getElementById('toggleNewPassword').addEventListener('click', function (e) {
    const newPasswordInput = document.getElementById('newpassword');
    const icon = this;
    if (newPasswordInput.type === 'password') {
      newPasswordInput.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      newPasswordInput.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });

  document.getElementById('toggleConfirmPassword').addEventListener('click', function (e) {
    const confirmPasswordInput = document.getElementById('confirmpassword');
    const icon = this;
    if (confirmPasswordInput.type === 'password') {
      confirmPasswordInput.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      confirmPasswordInput.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  });
</script>


<!-- Add these before the closing </body> tag -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.9.7/tagify.min.js"></script>

