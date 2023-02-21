<?php


include "../config/conn.php";



if(isset($_FILES['formData'])){
    //$yourImage = file_get_contents($_FILES['image']['tmp_name']);

	
   var_dump($_FILES['formData']);
	
	$path=$_FILES['formData'];

	//$emp_img=$_FILES['img'];


   // $img_name=$emp_img['name'];
   // $img_path=$emp_img['tmp_name'];



    $d=dirname(__FILE__)."/image/";

    $new_path=$d.'new.jpg';
    $result=move_uploaded_file($path,$new_path);


    $img_name=$emp_img['name'];
    $img_path=$emp_img['tmp_name'];
      

     $return_arr2['result'] = array("img_name" => $img_name,
                       "img_path" => $img_path,
                       "new_path"=>$new_path
                     );
   
    

   // Encoding array in JSON format
   echo json_encode($return_arr2);
	
	
	

	
	  
	}





 ?>