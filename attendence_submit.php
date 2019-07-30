<?php 
   if(isset($_POST['submit_attendan'])){
       // if($_SERVER['REQUEST_METHOD']=='POST'){
       $check=0;
        $att = $_POST['attendance'];
        $date=$_POST['date'];
       $semester=$_POST['semester'];
       $section=$_POST['section'];
       $course=$_POST['course'];
        $con = mysqli_connect("localhost", "root", "", "diu") or die ('Connection Error !!');
       $query1="SELECT id,name FROM student where semester ='".$semester."' and course_id ='".$course."' and section ='".$section."'"; 
       $result1=mysqli_query($con,$query1) or die (' Query is not execute !!');
       if(mysqli_num_rows($result1) > 0)
       {
           while($row = mysqli_fetch_array($result1))
            {   $catch_id=$row['id'];
                $catch_name=$row['name'];
               foreach($att as $key => $value){
                   if($key==$catch_id){
                       $check=1;
                      break;
                   }
                   else{
                       $check=0;
                   }
               }
             if($check==1){
                 $query2="insert into attendance (id,name,semester,section,course_id,date,present) values ('".$catch_id."','".$catch_name."','".$semester."','".$section."','".$course."','".$date."','1')";
                $result2=mysqli_query($con,$query2) or die ('present Query is not execute !!');
             }
             else{
                $query2="insert into attendance (id,name,semester,section,course_id,date,present) values ('".$catch_id."','".$catch_name."','".$semester."','".$section."','".$course."','".$date."','0')";
               $result2=mysqli_query($con,$query2) or die ('present Query is not execute !!');
             }
           }
       }
       else{ ?>
           <h3 style="color:red;">Student Are Not Register In This Course !!</h3>
     <?php  }
        header('Location: index.php');
    }
else{
    header('Location: index.php');
}
     
    ?>