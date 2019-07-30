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

    <div class="form-group"><input type="report" class="btn btn-success pull-right" name="report" value="Print Report"></div><br><br>
    
        <h4 class="text-center">Student Attendance</h4>
        <table class="table table-striped table-bordered">
            <tr>
                <th width="3%">SI</th>
                <th width="3%">Total</th>
                     
                <th width="10%">Student ID</th>
                <th width="20%">Student Name</th>
                <?php 
    $sl=1;
    $datearray;
    $count_distinc_date=0;
if(isset($_POST['course_id']) && isset($_POST['section'])){
    $course_id=$_POST['course_id'];
    $section=$_POST['section'];
    $semester=$_POST['semester'];
    $con = mysqli_connect("localhost", "root", "", "diu") or die ('Connection Error !!');
    $query1="SELECT DISTINCT date FROM attendance where course_id ='".$course_id."' and section ='".$section."'and semester='".$semester."'"; 
    $result1=mysqli_query($con,$query1) or die (' Query1 is not execute !!');
   // $result2=mysqli_query($con,$query1) or die (' result2 is not execute !!');
    $query2="SELECT DISTINCT id,name FROM attendance where course_id ='".$course_id."' and section ='".$section."' and semester ='".$semester."'"; 
    $result2=mysqli_query($con,$query2) or die (' result2 is not execute !!');
    
    if(mysqli_num_rows($result1) > 0)
       {
           while($row = mysqli_fetch_array($result1))
            { ?>
                <th width="6%">
                    <?php echo $row['date']; 
             
             $datearray[$count_distinc_date]=$row['date'];$count_distinc_date=$count_distinc_date+1; ?>
                </th>

                <?php       
           } ?>
            </tr>
            <?php
            $date_count=0;
        
        
             while($row2 = mysqli_fetch_array($result2)){
                  $student_id=$row2['id'];
                 $query5="SELECT count(present) as count_present FROM attendance where course_id ='".$course_id."' and section ='".$section."' and present='1' and semester='".$semester."'and id='".$student_id."'"; 
                  $result5=mysqli_query($con,$query5) or die (' Query5 is not execute !!');
                 while($row5 = mysqli_fetch_array($result5)){ 
                 ?>
               <tr>
                    <td> <?php echo $sl; $sl++; ?> </td>
                  <td> <?php echo $row5['count_present']; ?> </td>
                    <td> <?php echo $row2['id']; ?> </td>
                    <td> <?php echo $row2['name'] ?> </td>
                <?php  
                     for($i=0;$i<$count_distinc_date;$i++){
                             $query4="select present,date from attendance where id='".$row2['id']."'and date='".$datearray[$i]."'";
                            $result4=mysqli_query($con,$query4); ?>
                            <td> <?php 
                                while($row4 = mysqli_fetch_array($result4)){
                                    echo $row4['present'];
                                }
                                ?>
                   
                   </td>
                   <?php
                 } ?>
                </tr>

                <?php
                 
             }
    }    ?>

                    <?php }
}
?>

        </table>
</body>

</html>