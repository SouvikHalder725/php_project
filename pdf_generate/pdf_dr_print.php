<?php
session_start();
include "../config/conn.php";
require "vendor/autoload.php";


if(isset($_GET['eng_id'])){

 $eng_id=$_GET['eng_id'];
 $start_date=$_GET['start_date'];
 $end_date=$_GET['end_date'];


  // SELECT * FROM `dt_tb` WHERE month(dt) BETWEEN '02' and '08'
          $sql2="SELECT * FROM `it_report_add` WHERE `eng_id`='$eng_id' and `insert_date` BETWEEN '$start_date' and '$end_date'";
          $query2=mysqli_query($conn,$sql2);
          // $result=mysqli_fetch_array($query2);

           $num_rows=mysqli_num_rows($query2);
           $res=array();
       while($resultarray=mysqli_fetch_array($query2)){
              $res[]=$resultarray;
       }
         //  while($result=mysqli_fetch_array($query2)){
         //    print_r($result);
          
         // }
         // die();


}
if(isset($_GET['user_id'])){

 $eng_id=$_GET['eng_id'];
 $start_date=$_GET['start_date'];
 $end_date=$_GET['end_date'];
 $user_id=$_GET['user_id'];
 $dept_id=$_GET['dept_id'];
 


          // SELECT * FROM `dt_tb` WHERE month(dt) BETWEEN '02' and '08'
           $sql2="SELECT * FROM `it_report_add` WHERE `eng_id`='$eng_id' and `user_id`='$user_id' and `udept_id`='$dept_id' and `insert_date` BETWEEN '$start_date' and '$end_date'";
          $query2=mysqli_query($conn,$sql2);
          // $result=mysqli_fetch_array($query2);

           $num_rows=mysqli_num_rows($query2);
           $res=array();
       while($resultarray=mysqli_fetch_array($query2)){
              $res[]=$resultarray;
       }
         //  while($result=mysqli_fetch_array($query2)){
         //    print_r($result);
          
         // }
         // die();


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
                           
                            <td scope="col"><b>Department</b></td>
                            <td scope="col"><b>Call Log date</b></td>
                            
                            <td scope="col"><b>Call Log Time</b></td>
                            <td scope="col"><b>Issue</b></td>
                            <td scope="col"><b>solution</b></td>
                            <td scope="col"><b>Engineer</b></td>
                            <td scope="col"><b>Call Close Date</b></td>
                            <td scope="col"><b>Call Close Time</b></td>
                            <td scope="col"><b>Status</b></td>
                            

                          </tr>
                        </thead>
                        <tbody>


                          <?php 
                          $r=1;

                        foreach ($res as $result) {
                    
                        
                          ?>
                          <tr>
                            <th scope="row"><b><?php echo $r ;?></b></th>
                            <td><b>
                              <?php
                              $user_id=$result['user_id'];


                               $sqluser="SELECT * FROM `user` WHERE `id`='$user_id'";

                               $queryuser=mysqli_query($conn,$sqluser);
                               $resuser=mysqli_fetch_array($queryuser);

                               
                               if($resuser!=""){
                                echo $resuser['user'];
                               }
                               else{
                                echo "No Data Found!!";
                               }

                                ?>
                                



                              </b></td>
                           
                            <td><b>

                              <?php
                              $udept_id=$result['udept_id'];


                               $sqldept="SELECT * FROM `udepartment` WHERE `id`='$udept_id'";

                               $querydept=mysqli_query($conn,$sqldept);
                               $resdept=mysqli_fetch_array($querydept);

                               
                               if($resdept!=""){
                                echo $resdept['udepartment'];
                               }
                               else{
                                echo "No Data Found!!";
                               }

                                ?>
                               </b></td>
                            <td><b>




                              <?php echo $result['insert_date'];?></b></td>
                            
                            <td><b><?php echo $result['call_time'];?></b></td>
                            <td><b>
                              <?php
                              $issue_id=$result['issue_id'];


                               $sqlissue="SELECT * FROM `issue` WHERE `id`='$issue_id'";

                               $query_issue=mysqli_query($conn,$sqlissue);
                               $res_issue=mysqli_fetch_array($query_issue);

                               
                               if($res_issue!=""){
                                echo $res_issue['issue'];
                               }
                               else{
                                echo "No Data Found!!";
                               }

                                ?>



                              </b></td>

                             <td><b>
                              <?php
                              $solution_id=$result['solution_id'];


                               $sqlsolution="SELECT * FROM `solution` WHERE `id`='$solution_id'";

                               $query_solution=mysqli_query($conn,$sqlsolution);
                               $res_solution=mysqli_fetch_array($query_solution);


                               if($res_solution!=""){
                                echo $res_solution['solution'];
                               }
                               else{
                                echo "No Data Found!!";
                               }


                              

                                ?>
                              </b></td>

                              <td><b>
                              <?php
                              $eng_id=$result['eng_id'];


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
                              <td><b><?php echo $result['call_close_date']; ?></b></td>
                              
                              <td><b><?php echo $result['call_close_time']; ?></b></td>
                              <td><b><?php echo $result['call_status']; ?></b></td>




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
