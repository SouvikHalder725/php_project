<?php

include "../config/conn.php";




if(isset($_POST['submit'])){
	$id=$_POST['id_edit'];

	$user=$_POST['user'];
	$date=$_POST['date'];
	$eng_name=$_POST['eng_name'];
	$eng_dep=$_POST['eng_dept'];
	$call_time=$_POST['call_time'];
	$eng_shift=$_POST['eng_shift'];
	$dept=$_POST['dept'];
	$sol_type=$_POST['sol_type'];
	$issue=$_POST['issue'];
	$solution=$_POST['solution'];
	$call_status=$_POST['call_status'];
	$call_close_date=$_POST['call_close_date'];
	$call_status_remarks=$_POST['call_status_remarks'];
	$call_close_time=$_POST['call_close_time'];
	$quantity=$_POST['quantity'];

	
	$user_id="155";
	
    $query2="UPDATE `it_report_add` 
    SET
     `id`='$id',
    `user_id`='$user',
    `udept_id`='$dept',
    `insert_date`='$date',
    `issue_id`='$issue',
    `created`= CURDATE(),
    `solution_type_id`='$sol_type',
    `solution_id`='$solution',
    `call_close_date`='$call_close_date',
    `call_remarks`='$call_status_remarks',
    `call_status`='$call_status',
    `eng_id`='$eng_name',
    `edept_id`='$eng_dep',
    `shift_id`='$eng_shift',
    `call_close_time`='$call_close_time',
    `call_time`='$call_time',
    `quantity`='$quantity'
     WHERE `id`='$id'";
	

			
					if(mysqli_query($conn,$query2))
					{
						 $_SESSION['msg']="Report edited Successfully";
							  header('location:../all-page/dashboard.php');
					}
					else
					{
						 $_SESSION['msg']="Report Not Edited";
					}	
			
									 
					

	}


 ?>


