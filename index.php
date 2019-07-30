<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Attendane</title>
    <link rel="stylesheet" href="inc/bootstrap.css">
    <link rel="stylesheet" href="inc/style.css">
    <script src="inc/jquery-3.2.0.min.js"></script>
    <script src="inc/bootstrap.js"></script>
</head>

<body>

    <div class="container-fluied">
        <div class="row">
            <div class="navbar navbar-inverse navbar-fixed-top">

                <ul class="nav navbar-nav">
                    <li><a href="#"><b>Teacher Portal</b></a></li>
                    <li><a href="index.php">Attendance</a></li>
                    <li><a href="addlist.php">Attendance Update</a></li>
                    <li><a href="report.php">Attendance Report</a></li>
                    <li><a href="#">Marks Entry</a></li>
                    <li><a href="#">inQAC</a></li>
                    <li><a href="#">REgistration</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div>
        </div>
    </div> <br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Student Attendance</h4>
                </div>

                <div class="panel-body">
                    <form action="" id="selectform">

                        <div class="form-group">
                            <label for="select_semester">Select Date:</label>
                            <input type="date" name="date" id="date" onchange="submitFunction()" value="<?php echo date('Y-m-d'); ?>" class="form-control">

                        </div>
                        <div class="form-group">
                            <label for="select_course-saction">Select Semester</label>
                            <select name="Semester" id="semester" onchange="submit_semester()" class="form-control" placeholder="Select Semester">
                 <option value="empty">------</option> 
                 <option value="spring">spring</option>
                  <option value="summer">summer</option>
                  <option value="fall">fall</option>
                </select>
                        </div>
                        <div id="show_combo_of_course">
                            <div class="form-group">
                                <label for="select_course-saction">Select course section</label>
                                <select class="form-control" placeholder="Select Semester">
                 <option value="empty">------</option> 
                </select>
                            </div>
                        </div>
                    </form>
                    <script>
                        function submit_semester() {
                            var semester = document.getElementById('semester').value;
                            var date = document.getElementById('date').value;
                            if (semester != 'empty') {
                                $.ajax({
                                    url: 'course_select.php',
                                    type: 'POST',
                                    data: {

                                        semester: semester,
                                        teacher_id: '151-15-444'

                                    },
                                    success: function(result) {
                                        document.getElementById('show_combo_of_course').innerHTML = result;
                                        //pleaze display.php file javascript action code write here......!
                                        $(document).ready(function() {
                                            $("#course").click(function() {
                                                var course_and_section = this.value;
                                                if (course_and_section != 'empty' && date != '' && semester != 'empty') {
                                                    var splitstr = course_and_section.split(',');
                                                    var course_id = splitstr[0];
                                                    var section = splitstr[1];
                                                    $.ajax({
                                                        url: 'display.php',
                                                        type: 'POST',
                                                        data: {
                                                            date: date,
                                                            semester: semester,
                                                            course: course_id,
                                                            section: section
                                                        },
                                                        success: function(data) {
                                                            document.getElementById('display_student_info').innerHTML = data;
                                                        }
                                                    });
                                                }

                                            });
                                        });
                                    }
                                });
                            }
                        }
                    </script>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Student List</h4>
                        </div>
                        <div class="panel-body" id="display_student_info">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>