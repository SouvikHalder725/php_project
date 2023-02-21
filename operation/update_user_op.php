<?php

include "../config/conn.php";

$type_solution=0;


if(isset($_POST['update_submit'])){
	

	$date=$_POST['date'];
	$id=$_POST['id'];
	$user=$_POST['user_name'];
	$dept=$_POST['dept'];
	$user_id=$_POST['user_id'];
	$password=$_POST['password'];
	
	
	
	

	
	

	    $query2="UPDATE `user` SET `id`='$id',`user_id`='$user_id',`password`='$password',`user`='$user',`dept_id`='$dept',`created`='$date' WHERE `id`='$id'";
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="Employee Data Updated Successfully";
					  header('location:../all-page/userlist.php');
			}
			else
			{
				 $_SESSION['msg']="Employee Data Not Edited";
					  header('location:../all-page/userlist.php');
			}	
	}





 ?>