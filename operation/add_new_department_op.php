<?php
session_start();

include "../config/conn.php";




if(isset($_POST['submit'])){
	

	
	$date=$_POST['date'];
	
	
	$comment="";
	$dept=$_POST['dept'];

	
	    $sql="select * from `udepartment` order by `id` desc ";
		$query1=mysqli_query($sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	    $query2="INSERT INTO `udepartment`(`udepartment`, `comment`, `created`) 
	                           VALUES ('$dept','$comment','$date')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				      $_SESSION['msg']="New Department added Successfully";
					  header('location:../all-page/udepartment_list.php');
			}
			else
			{
				$_SESSION['msg2']="Invalid Data";
			}	
	}





 ?>