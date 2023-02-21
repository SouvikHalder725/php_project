<?php
session_start();

include "../config/conn.php";




if(isset($_POST['admin_submit'])){
	
  
	
	$user_name=$_POST['user_name'];
	$password_value=$_POST['password_value'];

	if($_POST['user_name']!=""  and $_POST['password_value']!=""){
      
            $sql="SELECT * FROM `t_05_employee` WHERE `id`='$user_name' and `password`='$password_value'";
      }
      
      else{
         $_SESSION['msg']="Logged in Faild!Select right One";
           header('Location:../index.php');
      }



    $query=mysqli_query($conn,$sql);

    $numres=mysqli_num_rows($query);

    $result=mysqli_fetch_array($query);



     // after getting login information of the user set all dat in session 
    $id=$result['employee_id'];
    $_SESSION['employee_id']=$result['employee_id'];

    $_SESSION['name']=$result['name'];
    $_SESSION['department_id']=$result['department_id'];
    $_SESSION['access']="admin";



    $_SESSION['designation_id']=$result['designation_id'];
    $_SESSION['mobile_no']=$result['mobile_no'];
    $_SESSION['email']=$result['email'];
    $_SESSION['employee_type']=$result['employee_type'];
    $_SESSION['id']=$result['id'];
    $_SESSION['user_type']=$result['user_type'];





       $IP_Address=getenv('REMOTE_ADDR');
         
       $browser="";

         if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("MSIE")))
            {$browser="ie";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("Presto")))
            {$browser="opera";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("CHROME")))
            {$browser="chrome";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("SAFARI")))
            {$browser="safari";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("FIREFOX")))
            {$browser="firefox";}
         
         else {$browser="other";}


         $timezone=date_default_timezone_set("Asia/Calcutta");
         $dt=date("y/m/d G:i:s"); 
         
         $login_date=date("y/m/d");
         
         // $query1="SELECT `login_details_id` FROM `t_17_login_details` WHERE `employee_id`='$id'";
            
         // $result1=mysqli_query($conn,$query1);   
         // $data=mysqli_fetch_assoc($result1);
         
         // $login_details_id=$data['login_details_id'];



         $query2="INSERT INTO `t_17_login_details`(`employee_id`,`ip`,`browser`,`login_date`,`login_time`)                 
               VALUES ('$id','$IP_Address','$browser','$login_date','$dt')";  
               
                                          
          $result2=mysqli_query($conn,$query2);
          $last_id = mysqli_insert_id($conn);


          $_SESSION['last_login_id']=$last_id;





     if($result>0){
       
         $_SESSION['msg']="Successfully Logged in";
          header('Location:../all-page/dashboard.php');

       
    }
    else{ 

       $_SESSION['msg2']="Logged in Faild";
       header('Location:../index.php');

    }
    


	
	   
		
		

}
if(isset($_POST['user_submit'])){

  $user_name=$_POST['user_name'];
   $password_value=$_POST['password_value'];

   if($_POST['user_name']!=""  and $_POST['password_value']!=""){
      
            $sql="SELECT * FROM `user` WHERE `user_id`='$user_name' and `password`='$password_value'";
      }
      
      else{
         $_SESSION['msg']="Logged in Faild!Select right One";
           header('Location:../index.php');
      }



    $query=mysqli_query($conn,$sql);

    $numres=mysqli_num_rows($query);

    $result=mysqli_fetch_array($query);



     // after getting login information of the user set all dat in session 
    $id=$result['id'];
    $_SESSION['employee_id']=$result['id'];
    $_SESSION['name']=$result['user'];
    $_SESSION['department_id']=$result['dept_id'];
    $_SESSION['access']="user";






 $IP_Address=getenv('REMOTE_ADDR');
         
       $browser="";

         if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("MSIE")))
            {$browser="ie";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("Presto")))
            {$browser="opera";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("CHROME")))
            {$browser="chrome";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("SAFARI")))
            {$browser="safari";}
         else if(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]),strtolower("FIREFOX")))
            {$browser="firefox";}
         
         else {$browser="other";}



          $timezone=date_default_timezone_set("Asia/Calcutta");
         $dt=date("y/m/d G:i:s"); 
         
         $login_date=date("y/m/d");
         
         // $query1="SELECT `login_details_id` FROM `t_17_login_details` WHERE `employee_id`='$id'";
            
         // $result1=mysqli_query($conn,$query1);   
         // $data=mysqli_fetch_assoc($result1);
         
         // $login_details_id=$data['login_details_id'];



         $query2="INSERT INTO `t_17_login_details`(`employee_id`,`ip`,`browser`,`login_date`,`login_time`)                 
               VALUES ('$id','$IP_Address','$browser','$login_date','$dt')";  
               
                                          
          $result2=mysqli_query($conn,$query2);
          $last_id = mysqli_insert_id($conn);


          $_SESSION['last_login_id']=$last_id;


     if($result>0){
       
         $_SESSION['msg']="Successfully Logged in";
          header('Location:../all-page/dashboard.php');

       
    }
    else{ 

       $_SESSION['msg2']="Logged in Faild";
       header('Location:../index.php');

    }


}





 ?>