<?php
session_start();

include "../config/conn.php";

$type_solution=0;


if(isset($_POST['submit'])){
	if($_POST['user_name']!=""){
	

	$date=$_POST['date'];
	
	$user=$_POST['user_name'];
	$dept=$_POST['dept'];
	$password="1234";
	
	
	
	

	
	    $sql="select * from `user` order by `id` desc";
		$query1=mysqli_query($conn,$sql);
		$row=mysqli_num_rows($query1);
		$pass=$row + '1';
		$yr=date("Y");
		$call_number="".$pass."-".$yr."";




		


	    $new_user_id=''.$user.''.$pass.'';

	    $new_user_id_new=strtolower($new_user_id);

	    $user_id=str_replace(" ","",$new_user_id_new);
	

	    $query2="INSERT INTO `user`( `user_id`, `password`,`user`, `dept_id`, `created`)VALUES ('$user_id','$password','$user','$dept','$date')";
					
							 
			if(mysqli_query($conn,$query2))
			{
				$_SESSION['msg']="New User added Successfully";
					  header('location:../all-page/userlist.php');
			}
			else
			{
				$_SESSION['msg2']="New User Not added ";
				 header('location:../all-page/userlist.php');
			}	
	}
	else{
		$_SESSION['msg2']="New User Not added ";
				 header('location:../all-page/userlist.php');
	}
}





 ?>