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
    <table class="table table-striped table-bordered">
        <tr>
            <th width="5%">SI</th>
            <th width="25%">Attendance Date</th>
            <th width="35%">Number Of Present Date</th>
            <th width="35%">Action</th>
        </tr>
        <?php //include("update_list.php");
         $sl=1;
         $count_distinc_date=0;
         $datearray;
     if(isset($_POST['course_id']) && isset($_POST['semester']) && isset($_POST['section'])){
         $course_id=$_POST['course_id'];
         $semester=$_POST['semester'];
         $section=$_POST['section'];
         $con = mysqli_connect("localhost", "root", "", "diu") or die ('Connection Error !!');
        $query1="SELECT DISTINCT date FROM attendance where course_id ='".$course_id."' and section ='".$section."' and semester ='".$semester."'"; 
       $result1=mysqli_query($con,$query1) or die ('date Query is not execute !!');
       if(mysqli_num_rows($result1) > 0)
       {
           while($row = mysqli_fetch_array($result1))
            {  $datearray[$count_distinc_date]=$row['date'];
                $count_distinc_date++;
           }
       }
         for($i=0;$i<$count_distinc_date;$i++){
             $query2="select count(present) as countpresent from attendance where date ='".$datearray[$i]."' and course_id='".$course_id."' and section ='".$section."' and semester ='".$semester."' and present ='1'";
              $result2=mysqli_query($con,$query2) or die ('select Query is not execute !!');
              
              while($row2 = mysqli_fetch_array($result2))
              {
             ?>
        <tr>
            <td>
                <?php echo $sl; $sl++; ?> </td>
            <td>
                <?php echo $datearray[$i] ?> </td>
            <td>
                <?php echo $row2['countpresent'] ?> </td>
            <td width="35%">
                   <form action="update_list.php" method="POST">
                       <input type="submit" value="OK" class="btn btn-info" >
                    <input type="text" name="section" value="<?php echo $section; ?>" hidden>
                    <input type="text" name="semester" value="<?php echo $semester; ?>" hidden>
                    <input type="text" name="course" value="<?php echo $course_id; ?>" hidden>
                    <input type="text" name="date" value="<?php echo $datearray[$i] ?>" hidden>
                    <!-- <input type="submit" class="btn btn-info" value="View">-->
                    
                    <a class="btn btn-danger" href="#"><input type="checkbox"  value="Delete">Delete</a>
               </form>

            </td>
        </tr>
        <?php
              }
              
         }
         
     }
        else{
             header('Location: addlist.php');
        }
    
    ?> 


    </table>
</body>

</html>