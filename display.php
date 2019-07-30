<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="inc/bootstrap.css">
    <link rel="stylesheet" href="inc/style.css">
    <script src="inc/jquery-3.2.0.min.js"></script>
    <script src="inc/bootstrap.js"></script>
</head>

<body>
    <?php              
    if (isset($_POST['date']) && isset($_POST['semester']) && isset($_POST['course']) && isset($_POST['section'])) {
                       $date = strtotime($_POST['date']);
                       $date = date('Y-m-d', $date);
                       $semester=$_POST['semester'];
                       $course=$_POST['course'];
                       $section=$_POST['section'];
                       $con = mysqli_connect("localhost", "root", "", "diu") or die ('Connection Error !!');
                       $query_for_date_check="select id from attendance where semester ='".$semester."' and course_id ='".$course."' and date ='".$date."' and section ='".$section."'";
                       $result_for_date_check=mysqli_query($con,$query_for_date_check) or die ('date check Query is not execute !!');
                      if(mysqli_num_rows($result_for_date_check)== 0){
                          
                      
                     $sqlquery="SELECT * FROM student where semester ='".$semester."' and course_id ='".$course."' and section ='".$section."'";  
                     $result=mysqli_query($con,$sqlquery) or die ('Register check Query is not execute !!');
            
                    if(mysqli_num_rows($result) > 0)
                            { 
    ?>
    <form method="post" id="attendance_form" action="attendence_submit.php">

        <table class="table table-striped table-bordered">
            <tr>
                <th width="15%">
                   <!-- <input type="checkbox" name="attend" value="present"> -->
                </th>
                <th width="30%">Student ID</th>
                <th width="55%">Name</th>
            </tr>
            <?php 
                    while($row = mysqli_fetch_array($result))
                           { 
            ?>
            <tr>
                <td width="15%"><input type="checkbox" class="aaaa" name="attendance[<?php echo $row['id']; ?>]" value="present" checked></td>
                <td width="30%">
                    <?php echo $row['id']; ?> </td>
                <td width="55%">
                    <?php echo $row['name']; ?>
                </td>
            </tr>

            <?php                
                      } 
           ?>
        </table>
        <input type="text" name="date" value="<?php echo $date; ?>" hidden>
        <input type="text" name="section" value="<?php echo $section; ?>" hidden>
        <input type="text" name="semester" value="<?php echo $semester; ?>" hidden>
        <input type="text" name="course" value="<?php echo $course; ?>" hidden>

        <input type="submit" id="submit_att" name="submit_attendan" style="margin-left:90%;" class="btn btn-primary btn-lg" value="SAVE">

    </form>

    <?php 
                      }
         else
         {  ?>
    <h3 style="color:red;">Student Are Not Register In This Course !!</h3>
    <?php  }             
   } 
        else{ ?>  <h3 style="color:red;">This date attendance already Taken !!</h3> <?php }
        }
    else{
         header('Location: index.php');
    }

  ?>

</body>

</html>