</div>
<!-- Page Area End Here -->
</div>
<!-- resources/views/your-view.blade.php -->
<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    var classDropdown = document.getElementById('class-dd');
    var sectionDropdown = document.getElementById('section-dd');

    classDropdown.addEventListener('change', function() {
        var classId = classDropdown.value;
        sectionDropdown.innerHTML = ''; // Clear previous options

        if (classId) {
            fetch('/fetch-sections', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ class_id: classId })
            })
            .then(response => response.json())
            .then(data => {
                sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                data.sections.forEach(function(section) {
                    var option = document.createElement('option');
                    option.value = section.id;
                    option.text = section.name;
                    sectionDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
        }
    });
});

   document.addEventListener('DOMContentLoaded', function() {
    var classDropdown = document.getElementById('class-dd');
    var sectionDropdown = document.getElementById('section-dd');
    var subjectDropdown = document.getElementById('subject-dd');
    var studentsList = document.getElementById('students-list');
    

    // Fetch Sections based on Class
    classDropdown.addEventListener('change', function() {
        var classId = classDropdown.value;
        sectionDropdown.innerHTML = '<option value="">Select Section</option>';
        subjectDropdown.innerHTML = '<option value="">Select Subject</option>';
        studentsList.innerHTML = ''; // Clear students list

        if (classId) {
            fetch('/api/fetch-section', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ class_id: classId })
            })
            .then(response => response.json())
            .then(data => {
                data.sections.forEach(function(section) {
                    var option = document.createElement('option');
                    option.value = section.id;
                    option.text = section.name;
                    sectionDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
        }
    });

    // Fetch Subjects based on Section
    sectionDropdown.addEventListener('change', function() {
        var sectionId = sectionDropdown.value;
        subjectDropdown.innerHTML = '<option value="">Select Subject</option>';
        studentsList.innerHTML = ''; // Clear students list

        if (sectionId) {
            fetch('/api/fetch-subject', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ section_id: sectionId })
            })
            .then(response => response.json())
            .then(data => {
                data.subjects.forEach(function(subject) {
                    var option = document.createElement('option');
                    option.value = subject.id;
                    option.text = subject.name;
                    subjectDropdown.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
        }
    });

    // Fetch Students based on Section
    sectionDropdown.addEventListener('change', function() {
        var sectionId = sectionDropdown.value;
        studentsList.innerHTML = ''; // Clear students list

        if (sectionId) {
            fetch('/api/fetch-students', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ section_id: sectionId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.students.length > 0) {
                    var studentsHTML = '<table class="table">';
                    studentsHTML += '<thead><tr><th>Roll No.</th><th>Name</th><th>Obtained Marks</th><th>Total Marks</th></tr></thead><tbody>';
                    data.students.forEach(function(student) {
                        studentsHTML += '<tr>';
                        studentsHTML += '<td>' + student.roll + '</td>';
                        studentsHTML += '<td>' + student.f_name + student.l_name + '</td>';
                        studentsHTML += '<td><input type="number" name="marks[' + student.id + '][obtained_marks]" class="form-control" required></td>';
                        studentsHTML += '<td><input type="number" name="marks[' + student.id + '][total_marks]" class="form-control" required></td>';
                        studentsHTML += '</tr>';
                    });
                    studentsHTML += '</tbody></table>';
                    studentsList.innerHTML = studentsHTML;
                } else {
                    studentsList.innerHTML = 'No students found for this section.';
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});


    // For parent select
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('parent_id');
        var choices = new Choices(element, {
            placeholder: true,
            placeholderValue: 'Select a parent',
            searchEnabled: true, // Enables the search functionality
            shouldSort: false,   // Keeps the order as in the original list
            removeItemButton: true, // Adds a clear button
        });
    });

    // For Gender
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('gender');
        var choices = new Choices(element, {
            placeholder: true,
            placeholderValue: 'Please Select Gender',
            searchEnabled: true, // Enables the search functionality
            shouldSort: false,   // Keeps the order as in the original list
            removeItemButton: true, // Adds a clear button
        });
    });
    // For blood_group
    document.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('blood_group');
        var choices = new Choices(element, {
            placeholder: true,
            placeholderValue: 'Please Select Group ',
            searchEnabled: true, // Enables the search functionality
            shouldSort: false,   // Keeps the order as in the original list
            removeItemButton: true, // Adds a clear button
        });
    });
    

    // Back Button
    function goBack() {
        window.history.back();
    }



 </script>
<!-- jquery-->
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Counterup Js -->
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<!-- Moment Js -->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<!-- Waypoints Js -->
<script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
<!-- Scroll Up Js -->
<script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
<!-- Full Calender Js -->
<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>
<!-- Chart Js -->
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('assets/js/main.js')}}"></script>
<!-- Include Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


</body>

</html>