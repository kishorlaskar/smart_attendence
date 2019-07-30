<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Attendane</title>
    <link rel="stylesheet" href="inc/bootstrap.css">
    <link rel="stylesheet" href="inc/style.css">
    
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
                   <h4>Student Attendance Update</h4>
               </div> 
               <div class="show_student_list_for_update">
              <div class="panel-body">
                  
            
              <div class="form-group">
                            <label for="select_course-saction">Select Semester</label>
                            <select name="Semester" id="Semester" onchange="submit_semester()" class="form-control" placeholder="Select Semester">
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
                
                  
                   
                   
                 
                 
                   <div class="panel panel-default">
                     <div class="panel-heading text-center">
                         <h4>Student attendance List</h4>
                     </div>
                     
                     <div class="panel-body">
                         <div id="show_attendance_list"></div>
                         
                     </div>
                 </div>
                    
                     
                 
                  
                   
               </div> 
               
                </div> 
            </div>
            
            
        </div>
    </div>    
    <script>
                            function submit_semester() {
                                var semester = document.getElementById('Semester').value;

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
                                                    // alert(course_and_section);

                                                    if (course_and_section != 'empty') {
                                                        var splitstr = course_and_section.split(',');
                                                        var course_id = splitstr[0];
                                                        var section = splitstr[1];
                                                        $.ajax({
                                                            url: 'show_attendance_list.php',
                                                            type: 'POST',
                                                            data: {
                                                                course_id: course_id,
                                                                semester: semester,
                                                                section: section
                                                            },
                                                            success: function(data) {
                                                                document.getElementById('show_attendance_list').innerHTML = data;
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

    <script src="inc/jquery-3.2.0.min.js"></script>
    <script src="inc/bootstrap.js"></script>
</body>
</html>