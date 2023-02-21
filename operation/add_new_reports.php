<?php
session_start();

include "../config/conn.php";




if(isset($_POST['submit'])){
	

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

	
	$user_id=$_SESSION['employee_id'];
	
	$sql="select * from `it_report_add` order by `id` desc ";
		$query1=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	if($call_status=="Closed"){	

			$query2="INSERT INTO `it_report_add`
			                (
			                	  
			                     `user_id`,
								 `udept_id`,
								 `insert_date`,
								 `issue_id`,
								 `solution_type_id`,
								 `solution_id`,
								 `call_close_date`,
								 `call_remarks`,
								 `call_status`,
								 `eng_id`,
								 `edept_id`,
								 `shift_id`,
								 `call_close_time`,
								 `call_time`,
								 `quantity`,
								 `auth_id`,
								 `call_number`,
								 `created`
							)
					values
					        (
					        	
					             '$user',
								 '$dept',
								 '$date',
								 '$issue',
								 '$sol_type',
								 '$solution',
								 '$call_close_date',
								 '$call_status_remarks',
								 '$call_status',
								 '$eng_name',
								 '$eng_dep',
								 '$eng_shift',
								 '$call_close_time',
								 '$call_time',
								 '$quantity',
								 '$user_id',
								 '$call_number',
								  CURDATE()
							)";
							if(mysqli_query($conn,$query2))
					{
						 $_SESSION['msg']="New Reports added Successfully";
							  header('location:../all-page/main.php');
					}
					else
					{
						 $_SESSION['msg']="New Report Not added";
					}	
			}
				else{
					$query2="INSERT INTO `it_report_add`
			                (
			                	  
			                     `user_id`,
								 `udept_id`,
								 `insert_date`,
								 `issue_id`,
								 `solution_type_id`,
								 `solution_id`,
								 
								 `call_remarks`,
								 `call_status`,
								 `eng_id`,
								 `edept_id`,
								 `shift_id`,
								 
								 `call_time`,
								 `quantity`,
								 `auth_id`,
								 `call_number`,
								 `created`
							)
					values
					        (
					        	
					             '$user',
								 '$dept',
								 '$date',
								 '$issue',
								 '$sol_type',
								 '$solution',
								 
								 '$call_status_remarks',
								 '$call_status',
								 '$eng_name',
								 '$eng_dep',
								 '$eng_shift',
								 
								 '$call_time',
								 '$quantity',
								 '$user_id',
								 '$call_number',
								  CURDATE()
							)";
							if(mysqli_query($conn,$query2))
					{
						echo "<script language='javascript' type='text/javascript'>
							  alert('IT Report Add Inserted Successfully');


							  </script>";
							  header('location:../all-page/main.php');
					}
					else
					{
						echo "<script language='javascript' type='text/javascript'>
							  alert('IT Report  Not Inserted');


							  </script>";
					}	
					
				  }
									 
					

	}


 ?>


