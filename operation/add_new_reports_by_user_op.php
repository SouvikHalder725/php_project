<?php

include "../config/conn.php";




if(isset($_POST['submit'])){
	

	echo $user=$_POST['user'];
	echo $date=$_POST['date'];
	echo $call_time=$_POST['call_time'];	
	echo $dept=$_POST['dept'];	
	echo $issue=$_POST['issue'];	
	echo $call_status="Open";	
	echo $call_status_remarks=$_POST['call_status_remarks'];	
	echo $quantity=$_POST['quantity'];
	








	    $sql="select * from `it_report_add` order by `id` desc ";
		$query1=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	

		 $query2="INSERT INTO `it_report_add`
			                (
			                	  
			                     `user_id`,
								 `udept_id`,
								 `insert_date`,
								 `issue_id`,								 				 
								 `call_remarks`,
								 `call_status`,								 								 
								 `call_time`,
								 `quantity`,
								 
								 `call_number`,
								 `created`
							)
					values
					        (
					        	
					             '$user',
								 '$dept',
								 '$date',
								 '$issue',
								 
								
								 '$call_status_remarks',
								 '$call_status',
								 
								 
								 '$call_time',
								 '$quantity',
								 
								 '$call_number',
								  CURDATE()
							)";

					if(mysqli_query($conn,$query2))
					{
						 $_SESSION['msg']="New Reports added Successfully";
							  header('location:../all-page/user_main.php');
					}
					else
					{
						 $_SESSION['msg']="New Reports Not added";
					}	
			
									 
					

	}


 ?>


