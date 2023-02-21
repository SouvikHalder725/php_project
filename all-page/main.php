
<?php



include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";





 if(isset($_GET['page'])){
  $page=$_GET['page'];

 }
 else{
  $page=1;
}

   
  


// to set limit per page 
$limit=10;
  
$sqlresult="select * from `it_report_add`";
$queryresult=mysqli_query($conn,$sqlresult);
$result=mysqli_num_rows($queryresult);

// to get perpage or page no  value 
$per_page=ceil($result/$limit);

$offset=($page-1)*$limit;

 $sql="SELECT * FROM `it_report_add` ORDER BY  `id` DESC LIMIT $offset,$limit";
 $query=mysqli_query($conn,$sql);
 $num=mysqli_num_rows($query);
      if($num<=0){
        $_SESSION['msg2']="Data Not Found";
      }

 $m=1;


// if user search by name ,id,company name ,or department name  

if(isset($_POST['search_submit'])){

     $input=$_POST['search'];

     if($input!=""){


        $sql_id="SELECT * FROM `user` WHERE `user` like '%$input%'";
        $query_id=mysqli_query($conn,$sql_id);
        while($res_id=mysqli_fetch_array($query_id)){
          $res_name=$res_id['id'];
        
          $sql="SELECT * FROM `it_report_add` WHERE `user_id`='$res_name'";
          $query=mysqli_query($conn,$sql);
          $num=mysqli_num_rows($query);
            if($num<=0){
            $_SESSION['msg2']="Data Not Found";
          }
         
         
        }
        

        
      }
      
}
 
// if user filter the table 

  if(isset($_POST['filter_submit'])){
   $select_department=$_POST['department_select'];
    $company_select=$_POST['company_select'];

       if(isset($_GET['submit_pagination'])){

         $page=$_GET['page'];
       }
       else{
        $page=1;
       }

       $limit=10;
        
      $sqlresult="select * from `it_report_add`";
      $queryresult=mysqli_query($conn,$sqlresult);
      $result=mysqli_num_rows($queryresult);


      $per_page=ceil($result/$limit);

      $offset=($page-1)*$limit;

       // $sql="SELECT * FROM `employee_table` ORDER BY  `emp_name` DESC LIMIT $offset,$limit";
       // $query=mysqli_query($conn,$sql);

       // if only department input is submitted and company input is blank

        if ($select_department!=""  && $company_select=="") {

            $sql="SELECT * FROM `it_report_add` WHERE `department`='$select_department'";
            $query=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($query);
            if($num<=0){
              $_SESSION['msg2']="Data Not Found";
            }
           
        }
        // if company is submitted and department is blank 

        elseif ($select_department==""  && $company_select!="") {
            $sql="SELECT * FROM `it_report_add` WHERE `company_id`='$company_select'";
            $query=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($query);
            if($num<=0){
              $_SESSION['msg2']="Data Not Found";
            }
            
        }

        // if department and company anme both are submittted in filter form

        elseif($select_department!=""  && $company_select!=""){

            $sql="SELECT * FROM `it_report_add` WHERE  `department`='$select_department' and `company_id`='$company_select'";
            $query=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($query);
            if($num<=0){
              $_SESSION['msg2']="Data Not Found";
            }
          
        }


        // if user not filter and search then show only default view


        else{

           $sql="SELECT * FROM `it_report_add` ORDER BY  `id` DESC LIMIT $offset,$limit";
           $query=mysqli_query($conn,$sql);
           $num=mysqli_num_rows($query);
          if($num<=0){
            $_SESSION['msg2']="Data Not Found";
          }

        }

      $m=0;
      

  }
 
      
      



?>
            <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">All Reports List</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="add_new_report.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-user-plus mx-1"></i>Add New Reports</a>
                  </div>

                  
                   <div class="col-md-2">
                    <a href="main.php" class="btn btn-info my-2" style="font-size: 15px;"><i class="fa fa-refresh mx-1"></i>Refresh List</a>
                  </div>
                  
              </div>




               <?php if(isset($_SESSION['msg'])){ ?>

                                    <div class="row col-md-12 bg-success my-1 py-1">

                                      <h5 class="text-light text-center"><?php echo $_SESSION['msg']; ?></h5>
                                    </div>


                               <?php  unset($_SESSION['msg']);}?>

                               <!-- to show error massage  -->

                               
                                <?php if(isset($_SESSION['msg2'])){ ?>

                                    <div class="row col-md-12 bg-danger my-1 py-1">

                                      <h5 class="text-light text-center"><?php echo $_SESSION['msg2']; ?></h5>
                                    </div>


                               <?php  unset($_SESSION['msg2']);}?>



                               
              <div class="row col-md-12 my-2">
                <form action="" method="post">
                <div class="col-md-4 d-flex text-right my-2" style="float: right;">
                  
                  <input type="text" name="search" class="form-control text-right">
                  <input type="submit" name="search_submit" value="Search" class="btn btn-light text-dark text text-center mx-2 border-2 border-primary rounded-3">
                 
                  
                </div>
              </form>
                  


              </div>


                 <div class="row  col-md-12  table-responsive">
                   <table class="text-center  table-bordered table table-striped" id="main_table" style="font-size:10px;" border="1">
                  
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
                          $r=$offset+1;

                          while($row=mysqli_fetch_array($query)) {
  
                        
                          ?>
                          <tr>
                            <th scope="row" style="font-size:7px;"><b><?php echo $r ;?></b></th>
                            <td><b>
                              <?php
                              $user_id=$row['user_id'];


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
                              $udept_id=$row['udept_id'];


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




                              <?php echo $row['insert_date'];?></b></td>
                            
                            <td><b><?php echo $row['call_time'];?></b></td>
                            <td><b>
                              <?php
                              $issue_id=$row['issue_id'];


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
                              $solution_id=$row['solution_id'];


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
                              $eng_id=$row['eng_id'];


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
                              <td><b><?php echo $row['call_close_date']; ?></b></td>
                              
                              <td><b><?php echo $row['call_close_time']; ?></b></td>
                              <td><b><?php echo $row['call_status']; ?></b></td>




                          </tr>

                         
                             
                        <?php 
                        $r++;

                         }
                      
                        ?>
                         
                         
                         </tbody>
                    
                   </table>
                 </div>


                 <?php
                 $start=$offset+1;
                 $offset_number=$offset+10;
                 $p=$page;
                 $prev=$p-1;
                 $next=$p+1;

                 if($result>0){


                 ?>
                      <div class="col-md-12 d-flex">
                        <div class="col-md-4 my-2">
                          <p class="text-start"><?php echo 'Showing  '.$start.'  to  '.$offset_number.'  of  '.$result.'  entries'; ?></p>
                          
                        </div>
                        <div class=" col-md-8 my-2">
                          <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item">
                                  <a class="page-link" href="main.php?page=<?php echo 1;?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>First
                                  </a>
                                </li>
                                <?php if($p>1){ ?>
                                <li class="page-item">
                                  <a class="page-link" href="main.php?page=<?php echo $prev; ?>">
                                   Previous
                                  </a>
                                </li><?php } ?>
                                <?php for ($p=$page; $p<=$page+5 ; $p++) { 
                                   if($p<=$per_page and $page>0){
                                    ?>
                                
                                     <li class="page-item"><a class="page-link"  href="main.php?page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
                              <?php 
                                   }

                               }
                              ?> <?php if($p<=$per_page){ ?>
                                <li class="page-item">
                                  <a class="page-link" href="main.php?page=<?php echo $next; ?>">
                                    Next
                                  </a>
                                </li> <?php } ?>
                                <li class="page-item">
                                  <a class="page-link" href="main.php?page=<?php echo $per_page; ?>" aria-label="Next">
                                    Last<span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>

                              </ul>
                            </nav>
                        </div>
                        
                      </div>
                       <?php } ?>

                 
                <div class="col-md-12 bg-primary" style="align-content: center; align-items: center; text-align: center;">

                  <!-- <button class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Print</button>  -->
                  <!-- <button class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Export to Excel<?php echo $page; ?></button> -->
                  <a href="../pdf_generate/pdfprint.php?page=<?php echo $page; ?>" class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Print<?php //echo $page; ?></a>
                  <a href="export_excel.php?page=<?php echo $page; ?>" class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Export to Excel<?php //echo $page; ?></a>
                   
                </div>


           </div>

           <?php


           include "../template/footer.php";
            ?>


           