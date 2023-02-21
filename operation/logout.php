<?php 
session_start();





if(isset($_GET['id'])){
       echo $id=$_GET['id'];


        include "../config/conn.php";
        $timezone=date_default_timezone_set("Asia/Calcutta");
        echo $dt=date("y-m-d G:i:s"); 

        echo $sql="UPDATE 
              `t_17_login_details`
            SET 
              `logout_time`='$dt'
            WHERE 
              `login_details_id`='$id'";

        $query=mysqli_query($conn,$sql);
        

    if($query){

        $_SESSION['employee_id']="";
        $_SESSION['name']="";
        $_SESSION['department_id']="";
        $_SESSION['access']= "";  
        $_SESSION['designation_id']="";
        $_SESSION['mobile_no']="";
        $_SESSION['email']="";
        $_SESSION['employee_type']="";
        $_SESSION['id']="";
        $_SESSION['user_type']="";

         $_SESSION['msg2']="Log Out Succesfully";
          header('Location:../index.php');

        }else{

              $_SESSION['msg2']="Log Out Succesfully";
              header('Location:../index.php');


        }
    }
  ?>