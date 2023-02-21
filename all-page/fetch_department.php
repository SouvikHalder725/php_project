<?php

$return_arr = array();
$return_arr2 = array();

include "../config/conn.php";

if(isset($_GET['user_id'])){

  $user_id=$_GET['user_id'];


  $sql="SELECT * FROM `user` WHERE `id`='$user_id'";
   $query=mysqli_query($conn,$sql);
   $res=mysqli_fetch_array($query);
    //print_r($res);
    //return $user_id;
    
   $dept_id=$res['dept_id'];
   


  $sql2="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
   $query2=mysqli_query($conn,$sql2);
   $res2=mysqli_fetch_array($query2);


   
        $id = $res2['id'];
        $udept = $res2['udepartment'];
      

       $return_arr['result'] = array("id" => $id,
                       "udept" => $udept
                     );
   
    

   // Encoding array in JSON format
  echo json_encode($return_arr);


     

  


}
if(isset($_GET['eng_id'])){

  $eng_id=$_GET['eng_id'];


  $sql="SELECT * FROM `t_05_employee` WHERE `employee_id`='$eng_id'";
   $query=mysqli_query($conn,$sql);
   $res=mysqli_fetch_array($query);
    //print_r($res);
    //return $user_id;
    
   $dept_id=$res['department_id'];
   


  $sql2="SELECT * FROM `t_05_department` WHERE `department_id`='$dept_id'";
   $query2=mysqli_query($conn,$sql2);
   $res2=mysqli_fetch_array($query2);


   
        $eid = $res2['department_id'];
        $edept = $res2['department'];
      

       $return_arr2['result'] = array("edept_id" => $eid,
                       "e_dept" => $edept
                     );
   
    

   // Encoding array in JSON format
  echo json_encode($return_arr2);


     

  


}





?>