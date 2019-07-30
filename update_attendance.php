<?php 
   if(isset($_POST['update_attendance'])){
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
                 $query2="UPDATE attendance SET present='1' where id='".$catch_id."' and date='".$date."'";
                $result2=mysqli_query($con,$query2) or die ('present Query is not execute !!');
             }
             else{
                 $query2="UPDATE attendance SET present='0' where id='".$catch_id."' and date='".$date."'";
               $result2=mysqli_query($con,$query2) or die ('present Query is not execute !!');
             }
           }
       }
       else{ ?>
<h3 style="color:red;">Student Are Not Register In This Course !!</h3>
<?php  }
        header('Location: addlist.php');
    }
else{
    header('Location: addlist.php');
}
     
    ?>