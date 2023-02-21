<?php
session_start();



include "../config/conn.php";



	if(isset($_GET['eng_id'])){

		 $eng_id=$_GET['eng_id'];
		 $start_date=$_GET['start_date'];
		 $end_date=$_GET['end_date'];
			

	
         $sql="SELECT * FROM `t_17_login_details` WHERE `employee_id`='$eng_id' and `login_date` BETWEEN '$start_date' and '$end_date'";
         $query=mysqli_query($conn,$sql);
         $num=mysqli_num_rows($query);

         $res=array();
	     while($resultarray=mysqli_fetch_array($query)){
              $res[]=$resultarray;
	     }


	  
	 } 


       
 

       // This is for get all result in table field for export
      
	   $html='<table style="text-align:center;">
	   <tr>
	          
                <td scope="col"><b>User Name</b></td>
                <td scope="col"><b>Ip Address</b></td>
                 <td scope="col"><b>Browser</b></td>
                <td scope="col"><b>Login Date</b></td>
                <td scope="col"><b>Login Time</b></td>
                <td scope="col"><b>Logout Date & Time</b></td>
               







	   </tr>';
	           



	            foreach($res as $result) {
	            	

	            	$eng_id=$result['employee_id'];
	            	$sql_eng="SELECT * FROM `t_05_employee` WHERE `employee_id`='$eng_id'";
	            	$query_eng=mysqli_query($conn,$sql_eng);
	            	$res_eng=mysqli_fetch_array($query_eng);
	            	if($res_eng==""){
	            		$res_eng['name']="No Data";
	            	}

	            	
	            	



	            	
	            	




	            	$html.='<tr>
	            	            
	            	            <td>'.$res_eng['name'].'</td>
	            	            <td>'.$result['ip'].'</td>
	            	            <td>'.$result['browser'].'</td>
	            	            <td>'.$result['login_date'].'</td>
	            	            <td>'.$result['login_time'].'</td>
	            	            <td>'.$result['logout_time'].'</td>
	            	           
	            	           
	            	       </tr>';
	            	           
	            	            
	            	            
	            	           
	                    }


	            $html.='</table>';

	




	            header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
				header("Content-type:   application/x-msexcel; charset=utf-8");
				header("Content-Disposition: attachment; filename=ReportofEmployeenew.xls"); 
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: private",false);
			
	            echo $html;



exit();

 ?>