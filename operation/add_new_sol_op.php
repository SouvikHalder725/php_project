<?php

include "../config/conn.php";

$type_solution=0;


if(isset($_POST['submit'])){
	

	$date=$_POST['date'];
	$type_solution=$_POST['sol_type'];
	$solution=$_POST['solution'];
	
	
	
	

	
	    $sql="select * from `solution` order by `id` desc";
		$query1=mysqli_query($sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	    $query2="INSERT INTO `solution`(`solution`, `created`, `solution_type`) VALUES ('$solution','$date','$type_solution')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="New Solution added Successfully";
					  header('location:../all-page/solution_list.php');
			}
			else
			{
				 $_SESSION['msg']="New Solution Not added";
			}	
	}





 ?>