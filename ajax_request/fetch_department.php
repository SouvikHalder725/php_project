<?php



include "../config/conn.php";

if(isset($_post['user_id'])){

   $user_id=$_POST['user_id'];

   $sql="SELECT * FROM `user` WHERE `id`='$user_id'";
   $query=mysqli_query($conn,$sql);
   $res=mysqli_fetch_array($query);
    $dept_id=$res['dept_id'];


    $sql2="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
   $query2=mysqli_query($conn,$sql2);
   $res2=mysqli_fetch_array($query2);
   return $res2;

}





?>