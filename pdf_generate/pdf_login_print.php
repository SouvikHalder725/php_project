<?php
session_start();
include "../config/conn.php";
require "vendor/autoload.php";


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


?>





<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Itreport-sanmarg.in</title>
     <!-- add icon link -->
        <link rel = "icon" href ="../asset/image/sanmarglogo.jpg" type = "image/x-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">

    

	    <!-- Bootstrap core CSS -->
	<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	    <!-- Favicons -->
	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
	<meta name="theme-color" content="#7952b3">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.69oUKoK-5A.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.min.css">





		
<style>
  
 
   


</style>
</head>

	<body>


       <div class="container">

       	
         <div class="row col-md-12">
                   <table class="table table-striped text-center" style="font-size:12px;" border="1">
                  
                        <thead>
                          
                          <tr>
                            <td scope="col"><b>#</b></td>
                             <td scope="col"><b>User Name</b></td>
                              <td scope="col"><b>Ip Address</b></td>
                               <td scope="col"><b>Browser</b></td>
                              <td scope="col"><b>Login Date</b></td>
                              <td scope="col"><b>Login Time</b></td>
                              <td scope="col"><b>Logout Date & Time</b></td>
                            

                          </tr>
                        </thead>
                        <tbody>


                          <?php 
                          $r=1;

                        foreach ($res as $result) {
                    
                        
                          ?>
                          <tr>
                            <td scope="row"><b><?php echo $r ;?></b></td>
                        
                           


                              <td><b>
                              <?php
                              $eng_id=$result['employee_id'];


                               $sql_eng="SELECT * FROM `t_05_employee` WHERE `employee_id`='$eng_id'";

                               $query_eng=mysqli_query($conn,$sql_eng);
                               $res_eng=mysqli_fetch_array($query_eng);

                               if($res_eng!=""){
                                echo $res_eng['name'];
                               }
                               else{
                                echo "No Data Found!!";
                               }

                               

                                ?>
                              </b></td>
                              <td><b><?php echo $result['ip']; ?></b></td>
                              
                              <td><b><?php echo $result['browser']; ?></b></td>
                              <td><b><?php echo $result['login_date']; ?></b></td>
                               <td><b><?php echo $result['login_time']; ?></b></td>
                                <td><b><?php echo $result['logout_time']; ?></b></td>




                          </tr>

                         
                             
                        <?php 
                        $r++;

                         }
                      
                        ?>
                         
                         
                         </tbody>
                    
                   </table>
                 </div>




       </div>


		<script type="text/javascript">	
 		
	 	window.print();
	  setTimeout(function(){
	    window.close()
	  },750)
       </script>

    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="sidebars.js"></script>

    <script src="../asset/js/jquery-3.6.0.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

	       
	</body>
</html>
