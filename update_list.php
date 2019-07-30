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
     <?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
         $date= $_POST['date'];?>
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Student Attendance Update</h4>
                </div> <form action="addlist.php">
                <input type="submit" class="btn " value="Back" style="background-color:red;color:white;margin:1% 0% 0% 1%;"></form>
                <form action="update_attendance.php" method="POST">
                           <div  style="width:50%; height:30px; margin-left:25%; margin-top:0%;margin-bottom:4%;" >
                            <div class="form-group">
                                <label for="Attendance Date">Attendance Date:</label>
                                <input type="text" name="date" value="<?php echo $date ?>" class="form-control" disabled> 
                            </div></div>
                        
                <div class="panel-body">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4>Student List</h4>
                        </div>
                        <div class="panel-body" id="display_student_info">
                            <table class="table table-striped table-bordered">
        <tr>
            <th width="5%"></th>
            <th width="25%">Student Id</th>
            <th width="35%">Student Name</th>
            
        </tr>
                          <?php
         $section= $_POST['section'];
         $semester=$_POST['semester'];
         $course= $_POST['course'];
         $con = mysqli_connect("localhost", "root", "", "diu") or die ('Connection Error !!');
         $query="select * from attendance where date='".$date."'and section='".$section."' and semester ='".$semester."' and course_id ='".$course."'";
         $result1=mysqli_query($con,$query) or die (' Query is not execute !!');
       if(mysqli_num_rows($result1) > 0)
       {
           while($row = mysqli_fetch_array($result1))
           {?><tr><td> <?php if($row['present']=='1'){
               ?><input type="checkbox" value="present" name="attendance[<?php echo $row['id']; ?>]" checked> <?php
           }else{
               ?><input type="checkbox" name="attendance[<?php echo $row['id']; ?>]" value="present" > <?php
           }
                                
          ?>
              </td>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
             </tr>  
         <?php  }
       }
     }
    else{
         header('Location: addlist.php');
    }
    ?>
                                
                            </table>
                            <input type="text" name="date" value="<?php echo $date; ?>" hidden>
                           <input type="text" name="section" value="<?php echo $section; ?>" hidden>
                           <input type="text" name="semester" value="<?php echo $semester; ?>" hidden>
                           <input type="text" name="course" value="<?php echo $course; ?>" hidden>
                            <input style="margin-left:45%;" type="submit" name="update_attendance" value="Update" class="btn btn-info">
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>