<?php
session_start();



include "../config/conn.php";

      
if(isset($_GET['eng_id'])){

 $eng_id=$_GET['eng_id'];
 $start_date=$_GET['start_date'];
 $end_date=$_GET['end_date'];


  // SELECT * FROM `dt_tb` WHERE month(dt) BETWEEN '02' and '08'
          $sql2="SELECT * FROM `it_report_add` WHERE `eng_id`='$eng_id' and `insert_date` BETWEEN '$start_date' and '$end_date'";
          $query2=mysqli_query($conn,$sql2);
          // $result=mysqli_fetch_array($query2);

           $num_rows=mysqli_num_rows($query2);
           $result=array();
	     while($resultarray=mysqli_fetch_array($query2)){
              $result[]=$resultarray;
	     }
         //  while($result=mysqli_fetch_array($query2)){
         //    print_r($result);
          
         // }
         // die();


}
if(isset($_GET['user_id'])){

 $eng_id=$_GET['eng_id'];
 $start_date=$_GET['start_date'];
 $end_date=$_GET['end_date'];
 $user_id=$_GET['user_id'];
 $dept_id=$_GET['dept_id'];
 


          // SELECT * FROM `dt_tb` WHERE month(dt) BETWEEN '02' and '08'
           $sql2="SELECT * FROM `it_report_add` WHERE `eng_id`='$eng_id' and `user_id`='$user_id' and `udept_id`='$dept_id' and `insert_date` BETWEEN '$start_date' and '$end_date'";
          $query2=mysqli_query($conn,$sql2);
          // $result=mysqli_fetch_array($query2);

           $num_rows=mysqli_num_rows($query2);
           $result=array();
	     while($resultarray=mysqli_fetch_array($query2)){
              $result[]=$resultarray;
	     }
         //  while($result=mysqli_fetch_array($query2)){
         //    print_r($result);
          
         // }
         // die();


}

	  
	  


       
 

       // This is for get all result in table field for export
      
	   $html='<table style="text-align:center;">
	   <tr>
	            <td>id</td>
	            <td>User</td>
	            <td>Department</td>
	            <td>Date</td>
	            <td>Issue</td>
	            <td>Created</td>
	            <td>Solution Type</td>
	            <td>Solution</td>
	            <td>Close Date</td>
	            <td>Remarks</td>
	            <td>status</td>
	            <td>Engineer</td>	            
	            <td>Engineer department</td>
	            <td>Shift</td>
	            <td>Close Time</td>
	            <td>Sign Id</td>
	            <td>Hod</td>
	            <td>Call Time</td>
	            <td>Authentication</td>
	            <td>Quantity</td>
	            <td>Call Number</td>
	            







	   </tr>';
	           



	            foreach($result as $res) {
	            	



	            	$user_id=$res['user_id'];
	            	$sql_id="SELECT * FROM `user` WHERE `id`='$user_id'";
	            	$query_id=mysqli_query($conn,$sql_id);
	            	$res_id=mysqli_fetch_array($query_id);
	            	if($res_id==""){
	            		$res_id['user']="No Data";
	            	}
	            	



	            	$dept_id=$res['udept_id'];
	            	$sql_dept="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
	            	$query_dept=mysqli_query($conn,$sql_dept);
	            	$res_dept=mysqli_fetch_array($query_dept);
	            	if($res_dept==""){
	            		$res_dept['udepartment']="No Data";
	            	}
	            	




	            	$issue_id=$res['issue_id'];
	            	$sql_issue="SELECT * FROM `issue` WHERE `id`='$issue_id'";
	            	$query_issue=mysqli_query($conn,$sql_issue);
	            	$res_issue=mysqli_fetch_array($query_issue);
	            	if($res_issue==""){
	            		$res_issue['issue']="No Data";
	            	}
	            	




	            	$user_sol_type=$res['solution_type_id'];
	            	$sql_sol_type="SELECT * FROM `solution_type` WHERE `id`='$user_sol_type'";
	            	$query_sol_type=mysqli_query($conn,$sql_sol_type);
	            	$res_sol_type=mysqli_fetch_array($query_sol_type);
	            	if($res_sol_type==""){
	            		$res_sol_type['solution_type']="No Data";
	            	}

	            	





	            	$user_sol=$res['user_id'];
	            	$sql_sol="SELECT * FROM `solution` WHERE `id`='$user_sol'";
	            	$query_sol=mysqli_query($conn,$sql_sol);
	            	$res_sol=mysqli_fetch_array($query_sol);
	            	if($res_sol==""){
	            		$res_sol['solution']="No Data";
	            	}

	            	



	            	$eng_id=$res['eng_id'];
	            	$sql_eng="SELECT * FROM `t_05_employee` WHERE `employee_id`='$eng_id'";
	            	$query_eng=mysqli_query($conn,$sql_eng);
	            	$res_eng=mysqli_fetch_array($query_eng);
	            	if($res_eng==""){
	            		$res_eng['name']="No Data";
	            	}

	            	
	            	



	            	$edept_id=$res['edept_id'];
	            	$sql_edept="SELECT * FROM `t_05_department` WHERE `department_id`='$edept_id'";
	            	$query_edept=mysqli_query($conn,$sql_edept);
	            	$res_edept=mysqli_fetch_array($query_edept);
	            	if($res_edept==""){
	            		$res_edept['department']="No Data";
	            	}

	            	




	            	$html.='<tr>
	            	            
	            	            <td>'.$res['id'].'</td>
	            	            <td>'.$res_id['user'].'</td>
	            	            <td>'.$res_dept['udepartment'].'</td>
	            	            <td>'.$res['insert_date'].'</td>
	            	            <td>'.$res_issue['issue'].'</td>
	            	            <td>'.$res['created'].'</td>
	            	            <td>'.$res_sol_type['solution_type'].'</td>
	            	            <td>'.$res_sol['solution'].'</td>
	            	            <td>'.$res['call_close_date'].'</td>
	            	            <td>'.$res['call_remarks'].'</td>
	            	            <td>'.$res['call_status'].'</td>
	            	            <td>'.$res_eng['name'].'</td>	            	            
	            	            <td>'.$res_edept['department'].'</td>
	            	            <td>'.$res['shift_id'].'</td>
	            	            <td>'.$res['call_close_time'].'</td>
	            	            <td>'.$res['sign_id'].'</td>
	            	            <td>'.$res['hod_sign_id'].'</td>
	            	            <td>'.$res['call_time'].'</td>
	            	            <td>'.$res['auth_id'].'</td>
	            	            <td>'.$res['quantity'].'</td>
	            	            <td>'.$res['call_number'].'</td>
	            	           
	            	       </tr>';
	            	           
	            	            
	            	            
	            	           
	            }


	            $html.='</table>';

	




	            header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
				header("Content-type:   application/x-msexcel; charset=utf-8");
				header("Content-Disposition: attachment; filename=ReportofEmployeenew.xls"); 
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private",false);
			
	            echo $html;



exit();

 ?>