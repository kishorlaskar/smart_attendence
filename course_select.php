<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Attendane</title>
    <link rel="stylesheet" href="inc/bootstrap.css">
    <link rel="stylesheet" href="inc/style.css">
    
</head>
<body>
      <div class="form-group">
                            <label for="select_course-saction">Select course section</label>
                            <select name="course" id="course"  class="form-control" onchange="submit_course()"  placeholder="Select course section">
                 <option value="empty">------</option> 
                 
               
<?php 
  if(isset($_POST['semester']) && isset($_POST['teacher_id'])){
      $semester=$_POST['semester'];
      $teacher_id=$_POST['teacher_id'];
      $con = mysqli_connect("localhost", "root", "", "diu") or die ('Connection Error !!');
       $query1="SELECT course_id,course_name,section FROM course where semester ='".$semester."' and teacher_id ='".$teacher_id."'"; 
       $result1=mysqli_query($con,$query1) or die (' Query is not execute !!');
       if(mysqli_num_rows($result1) > 0)
       {
           while($row = mysqli_fetch_array($result1))
            { ?>
               <option value="<?php echo $row['course_id'].",".$row['section'] ; ?>"><?php echo $row['course_name']." ".$row['section'] ; ?> </option>

        <?php   }
       }
  }
  else{ header('Location: index.php');}

?>
                                 </select>
                        </div>
    </body>
</html>