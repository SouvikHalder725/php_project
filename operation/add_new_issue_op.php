<?php

include "../config/conn.php";




if(isset($_POST['submit'])){
	

	$date=$_POST['date'];
	$solution_type=$_POST['solution_type'];
	$issue=$_POST['issue'];
	
	
	

	
	    $sql="select * from `issue` order by `id` desc ";
		$query1=mysqli_query($sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	    $query2="INSERT INTO `issue`(`issue`, `category`, `created`) VALUES ('$issue','$solution_type','$date')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="New Issue added Successfully";
					  header('location:../all-page/issue_list.php');
			}
			else
			{
				 $_SESSION['msg']="New Issue Not added";


					
			}	
	}





 ?>