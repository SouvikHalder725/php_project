<?php

include "../config/conn.php";

include "../template/header.php";
include "../template/sidebar.php";


$num_rows=0;



if(isset($_POST['search_submit'])){

  $eng_id=$_POST['eng_name'];
  $user_id=$_POST['user_name'];
  $dept_id=$_POST['dept_name'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];

  // SELECT * FROM `dt_tb` WHERE month(dt) BETWEEN '02' and '08'
          $sql4="SELECT * FROM `it_report_add` WHERE `eng_id`='$eng_id' and `user_id`='$user_id' and `udept_id`='$dept_id' and `insert_date` BETWEEN '$start_date' and '$end_date'";
          $query4=mysqli_query($conn,$sql4);
          // $result=mysqli_fetch_array($query4);

           $num_rows=mysqli_num_rows($query4);
           $res=array();
           while($resultarray=mysqli_fetch_array($query4)){
                  $res[]=$resultarray;
           }
         //  while($result=mysqli_fetch_array($query4)){
         //    print_r($result);
          
         // }



}


?>
 <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-10">
                    <h3 class="text-center text-light my-2">Search Report List</h3>
                  </div>

                   <div class="col-md-2">
                    <a href="search_report.php" class="btn btn-info my-2" style="font-size: 15px;"><i class="fa fa-refresh mx-1"></i>Refresh List</a>
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


             


                 <div class="row col-md-12">
                   <table class="table table-striped text-center" style="font-size:12px;" border="1">
                    <form method="post">
                      <tr>
                        <td colspan="1">
                           <div class="form-control">
                            <select class="form-select" name="user_name" aria-label="Default select example">
                                <option value="" selected>Select User</option>
                                <?php
                               
                                  $sql="SELECT * FROM `user`";
                                  $query=mysqli_query($conn,$sql);
                                  $res1=mysqli_fetch_array($query);
                                  while($res1=mysqli_fetch_array($query)){
                                   echo '<option  value="'.$res1['id'].'">'.$res1['user'].'</option>';
                                   }

                                  ?>
                             
                            </select>
                          </div>
                        </td>
                        <td colspan="1">
                           <div class="form-control">
                            <select class="form-select" name="eng_name" aria-label="Default select example">
                                <option value="" selected>Select Engineer</option>
                                <?php
                               
                                  $sql2="SELECT * FROM `t_05_employee`";
                                  $query2=mysqli_query($conn,$sql2);
                                  $res2=mysqli_fetch_array($query2);
                                  while($res2=mysqli_fetch_array($query2)){
                                   echo '<option  value="'.$res2['employee_id'].'">'.$res2['name'].'</option>';
                                   }

                                  ?>
                             
                            </select>
                          </div>
                        </td>
                        <td colspan="1">
                          <div class="form-control">
                            <select class="form-select" name="dept_name" aria-label="Default select example">
                                <option value="" selected>Select Department</option>
                                <?php
                               
                                  $sql3="SELECT * FROM `udepartment`";
                                  $query3=mysqli_query($conn,$sql3);
                                  $res3=mysqli_fetch_array($query3);
                                  while($res3=mysqli_fetch_array($query3)){
                                   echo '<option  value="'.$res3['id'].'">'.$res3['udepartment'].'</option>';
                                   }

                                  ?>
                             
                            </select>
                          </div>
                        </td>
                        <td colspan="2">
                          <div class="d-flex form-control"><span><p class="my-2">start Date:</p></span><span><input type="date" class="form-control" name="start_date"></span></div>
                        </td>
                         <td colspan="2">
                            <div class="d-flex form-control"><span><p class="my-2">End Date:</p></span><span><input type="date" class="form-control" name="end_date"></span></div>
                        </td>
                        <td colspan="1">
                         <input type="submit" name="search_submit" class="btn btn-light" value="Search">
                        </td>
                      </tr>

                    </form>

                       


                          <tr>
                            <td scope="col"><b>#</b></td>
                            <td scope="col"><b>User Name</b></td>
                            <td scope="col"><b>Department</b></td>
                            <td><b>Created At</b></td>
                            <td scope="col"><b>Issue</b></td>
                            <td scope="col"><b>Solution Type</b></td>
                            <td scope="col"><b>Solution</b></td>
                           <td scope="col"><b>Status</b></td>
                            
                            

                          </tr>

                           <tbody>


                          <?php 
                           

                            if($num_rows>0){
                                  $r=1;

                                  foreach ($res as $result){
          
                                
                                  ?>
                                  <tr>
                                    <td><b><?php echo $r ;?></b></td>
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
                                      <td><b><?php  
                                           $dept_id=$result['udept_id'];
                                          $sql3="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
                                          $query3=mysqli_query($conn,$sql3);
                                          $res3=mysqli_fetch_array($query3);
                                          if($res3['udepartment']==""){
                                            echo "No Department";
                                          }
                                          else{
                                             echo $res3['udepartment'];
                                           }


                                          ?>
                                     
                                       </b></td>  
                                       <td><b><?php echo $result['created']; ?></b></td>                        
                                    
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

                                    <td><b><?php $solution_type=$result['solution_type_id'];


                                      


                                       $sqlsolution_type="SELECT * FROM `solution_type` WHERE `id`='$solution_type'";

                                       $query_solution_type=mysqli_query($conn,$sqlsolution_type);
                                       $res_solution_type=mysqli_fetch_array($query_solution_type);


                                       if($res_solution_type!=""){
                                        echo $res_solution_type['solution_type'];
                                       }
                                       else{
                                        echo "No Data Found!!";
                                       }


                                     ?></b></td>
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
                                     
                                    




                                  </tr>

                                 
                                     
                                <?php 
                                $r++;

                                 }
                               }
                               else{

                                echo "<tr><td colspan='8'><b>No Data Found</b></td></tr>";
                               }
                              
                        ?>
                         
                         
                         </tbody>
                    
                   </table>
                 </div>

               <div class="col-md-12 bg-primary" style="align-content: center; align-items: center; text-align: center;">

                  <!-- <button class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Print</button>  -->
                  <!-- <button class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Export to Excel<?php echo $page; ?></button> -->
                  <a href="../pdf_generate/pdf_dr_print.php?eng_id=<?php echo $eng_id; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&user_id=<?php echo $user_id; ?>&dept_id=<?php echo $dept_id; ?>" class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Print<?php //echo $page; ?></a>
                  <a href="export_dr_excel.php?eng_id=<?php echo $eng_id; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&user_id=<?php echo $user_id; ?>&dept_id=<?php echo $dept_id; ?>" class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Export to Excel<?php //echo $page; ?></a>
                   
                </div>
                
               


                 
                

           </div>

           <?php


           include "../template/footer.php";
            ?>