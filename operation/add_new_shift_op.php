<?php

include "../config/conn.php";




if(isset($_POST['submit'])){
	

	$date=$_POST['date'];
	$shift=$_POST['shift'];
	
	
	
	

	
	    $sql="select * from `shift` order by `id` desc ";
		$query1=mysqli_query($sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	    $query2="INSERT INTO `shift`(`shift`, `created`) VALUES ('$shift','$date')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="New Shift Time added Successfully";
					  header('location:../all-page/shift_list.php');
			}
			else
			{
				 $_SESSION['msg']="New Shift Time Not added";
			}	
	}





 ?>