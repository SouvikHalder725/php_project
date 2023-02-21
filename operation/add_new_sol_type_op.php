<?php

include "../config/conn.php";

$type_solution=0;


if(isset($_POST['submit'])){
	

	$date=$_POST['date'];
	$type_solution=$_POST['type_of_sol'];
	
	
	
	

	
	    $sql="select * from `solution_type` order by `id` desc";
		$query1=mysqli_query($sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";

	    $query2="INSERT INTO `solution_type`(`solution_type1`,`created`) 
	                                  VALUES('$type_solution','$date')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="New Solution Type added Successfully";
					  header('location:../all-page/solution_type_list.php');
			}
			else
			{
				 $_SESSION['msg']="New Solution Type Not added";
			}	
	}





 ?>