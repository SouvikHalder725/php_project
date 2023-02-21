<?php
session_start();
$timezone=date_default_timezone_set("Asia/Calcutta");


include "../config/conn.php";

if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$department=$_POST['department'];
	$designation=$_POST['designation'];
	$present_add_line_1=$_POST['present_add_line_1'];
	$present_add_line_2=$_POST['present_add_line_2'];
	$present_address_line_3=$_POST['present_address_line_3'];
	$present_city=$_POST['present_city'];
	$present_pincode=$_POST['present_pincode'];
	$present_state=$_POST['present_state'];
	$present_landmark=$_POST['present_landmark'];
	$parmanent_address_line_1=$_POST['parmanent_address_line_1'];
	$parmanent_address_line_2=$_POST['parmanent_address_line_2'];
	$parmanent_address_line_3=$_POST['parmanent_address_line_3'];
	$parmanent_city=$_POST['parmanent_city'];
	$parmanent_pincode=$_POST['present_pincode'];
	$parmanent_state=$_POST['parmanent_state'];
	$parmanent_landmark=$_POST['parmanent_landmark'];
	$contact_phone_no=$_POST['contact_phone_no'];
	$contact_mobile_no=$_POST['contact_mobile_no'];
	$contact_email=$_POST['contact_email'];
	$contact_usertype=$_POST['contact_usertype'];
	$employee_id=$_POST['employee_id'];	
	$employee_password=$_POST['employee_password'];
	$employee_type=$_POST['employee_type'];
	$identity_card="yes";
	$active_status="0";
	$inserted_by_id=$_SESSION['employee_id'];
	$inserted_date=date('d-m-y');
    

    

	$emp_img=$_FILES['emp_img'];
    $img_name=$emp_img['name'];
    $img_path=$emp_img['tmp_name'];
    $d=dirname(__FILE__)."/uploads/image/";        
    $new_path=$d.$img_name.'';
    $result=move_uploaded_file($img_path,$new_path);


	 //    $sql="select * from `t_05_employee` order by `employee_id` desc ";
		// $query1=mysqli_query($sql);
		// $row=mysqli_num_rows($query1);
		// $pass=$row + '1';
		// $yr=date("Y");
		// $call_number="".$pass."-".$yr."";

	     $query2="INSERT INTO `t_05_employee`(
	    	                                 `name`,
	                                         `gender`,
	                                          `dob`,
	                                           `employee_image`,
	                                            `department_id`,
	                                             `designation_id`,
	                                              `address_1`,
	                                               `address_2`,
	                                                `address_3`,
	                                                 `city`,
	                                                  `pincode`,
	                                                  `state`,
	                                                   `nearest_landmark`,
	                                                    `landline_no`,
	                                                     `mobile_no`,
	                                                      `email`,
	                                                       `employee_type`,
	                                                        `user_type`,
	                                                         `p_address1`,
	                                                          `p_address2`,
	                                                           `p_address3`,
	                                                            `p_city`,
	                                                             `p_pincode`,
	                                                              `p_state`,
	                                                               `p_nearest_landmark`,
	                                                                `id`,
	                                                                 `password`,
	                                                                  `identity_card`,	                                                                   	                                                                    
	                                                                     `active_status`,
	                                                                      `inserted_by_id`,
	                                                                       `inserted_by_date`
	                                                                       ) 

	                                                                  VALUES (
	                                                                  	'$name',
	                                                                  	'$gender',
	                                                                  	'$dob',
	                                                                  	'$img_name',
	                                                                  	'$department',
	                                                                  	'$designation',
	                                                                  	'$present_add_line_1',
	                                                                  	'$present_add_line_2',
	                                                                  	'$present_address_line_3',
	                                                                  	'$present_city',
	                                                                  	'$present_pincode',
	                                                                  	'$present_state',
	                                                                  	'$present_landmark',
	                                                                  	'$contact_phone_no',
	                                                                  	'$contact_mobile_no',
	                                                                  	'$contact_email',
	                                                                  	'$employee_type',
	                                                                  	'$contact_usertype',
	                                                                  	'$parmanent_address_line_1',
	                                                                  	'$parmanent_address_line_2',
	                                                                  	'$parmanent_address_line_3',
	                                                                  	'$parmanent_city',
	                                                                  	'$parmanent_pincode',
	                                                                  	'$parmanent_state',
	                                                                  	'$parmanent_landmark',
	                                                                  	'$employee_id',
	                                                                  	'$employee_password',
	                                                                  	'$identity_card',
	                                                                  	'$active_status',
	                                                                  	'$inserted_by_id',
	                                                                  	'$inserted_date'
	                                                                  	
	                                                                  )";
	                                                                
					
							 
			if(mysqli_query($conn,$query2))
			{
				 $_SESSION['msg']="New Employee added Successfully";
				
					  header('location:../all-page/employee_list.php');
			}
			else
			{
				 $_SESSION['msg2']="Employee Not added";
			}	
	}





 ?>