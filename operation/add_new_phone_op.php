<?php

include "../config/conn.php";




if(isset($_POST['submit'])){
	

	$date=$_POST['date'];
	$name=$_POST['name'];
	$phone_no=$_POST['phone_no'];
	
	
	

	
	    $sql="select * from `t_01_phone` order by `phone_id` desc ";
		$query1=mysqli_query($sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	    $query2="INSERT INTO `t_01_phone`(`date`, `name`, `ph_no`, `inserted_by_id`, `inserted_by_date`) 

	                              VALUES ('$date','$name','$phone_no','155','$date')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="New Phone No added Successfully";
					  header('location:../all-page/list_phone.php');
			}
			else
			{
				 $_SESSION['msg']="New Phone No Not added";
			}	
	}





 ?>