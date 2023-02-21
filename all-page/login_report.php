<?php

include "../config/conn.php";

include "../template/header.php";
include "../template/sidebar.php";


$num_rows=0;



if(isset($_POST['search_submit'])){

  $eng_id=$_POST['eng_name'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];


  // SELECT * FROM `dt_tb` WHERE month(dt) BETWEEN '02' and '08'
          $sql2="SELECT * FROM `t_17_login_details` WHERE `employee_id`='$eng_id' and `login_date` BETWEEN '$start_date' and '$end_date'";
          $query2=mysqli_query($conn,$sql2);
          // $result=mysqli_fetch_assoc($query2);

           $num_rows=mysqli_num_rows($query2);
           $res=array();
           while($resultarray=mysqli_fetch_array($query2)){
                  $res[]=$resultarray;
           }
         //  while($result=mysqli_fetch_assoc($query2)){
         //    print_r($result);
          
         // }


}


?>
 <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-10">
                    <h3 class="text-center text-light my-2">Login Report List</h3>
                  </div>

                   <div class="col-md-2">
                    <a href="login_report.php" class="btn btn-info my-2" style="font-size: 15px;"><i class="fa fa-refresh mx-1"></i>Refresh List</a>
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
                        <td colspan="2">
                          <div class="form-control">
                            <select class="form-select" name="eng_name" aria-label="Default select example">
                                <option value="" selected>Select The Engineer Name</option>
                                <?php
                               
                                  $sql="SELECT * FROM `t_05_employee`";
                                  $query=mysqli_query($conn,$sql);
                                  $res1=mysqli_fetch_array($query);
                                  while($res1=mysqli_fetch_array($query)){
                                   echo '<option  value="'.$res1['employee_id'].'">'.$res1['name'].'</option>';
                                   }
                                  $sql1="SELECT * FROM `user`";
                                  $query1=mysqli_query($conn,$sql1);
                                  $res2=mysqli_fetch_array($query1);
                                  while($res2=mysqli_fetch_array($query1)){
                                   echo '<option  value="'.$res2['id'].'">'.$res2['user'].'</option>';
                                   }

                                  ?>
                             
                            </select>
                          </div>
                        </td>
                        <td colspan="2">
                         <div class="d-flex form-control"><span><p class="my-2">start Date: </p></span><span><input type="date" class="form-control mx-3" name="start_date"></span></div>
                        </td>
                         <td colspan="2">
                           <div class="d-flex form-control"><span><p class="my-2">start Date: </p></span><span><input type="date" class="form-control mx-3" name="end_date"></span></div>
                        </td>
                        <td colspan="1">
                         <input type="submit" name="search_submit" class="btn btn-light" value="Search">
                        </td>
                      </tr>

                    </form>

                       


                          <tr>
                            <td scope="col"><b>#</b></td>
                            <td scope="col"><b>User Name</b></td>
                            <td scope="col"><b>Ip Address</b></td>
                            <td scope="col"><b>Login Date</b></td>
                            <td scope="col"><b>Login Time</b></td>
                            <td scope="col"><b>Logout Date & Time</b></td>
                            <td scope="col"><b>Browser</b></td>
                            
                           
                            
                            

                          </tr>

                           <tbody>


                          <?php 
                           

                            if($num_rows>0){
                                  $r=1;

                                  foreach ($res as $result) {
                                    
                                
                                  ?>
                                  <tr>
                                    <td><b>
                                      <?php echo $r; ?>
                                    </b></td>
                                    <td><b>
                                      <?php 
                                         $user_id=$result['employee_id'];


                                       $sqluser="SELECT * FROM `t_05_employee` WHERE `employee_id`='$user_id'";

                                       $queryuser=mysqli_query($conn,$sqluser);
                                       $resuser=mysqli_fetch_assoc($queryuser);

                                       
                                       if($resuser!=""){
                                        echo $resuser['name'];
                                       }
                                       else{
                                        echo "No Data Found!!";
                                       }



                                       ?>
                                    </b></td>
                                      <td><b>
                                      
                                       <?php echo $result['ip']; ?>

                                      </b></td>
                                      <td><b>
                                        <?php echo $result['login_date']; ?>

                                       </b></td>  
                                       <td><b>
                                         <?php echo $result['login_time']; ?>
                                       </b></td>                        
                                    
                                     <td><b>
                                      
                                          <?php echo $result['logout_time']; ?>
                                      </b></td>
                                       <td><b>
                                      
                                          <?php echo $result['browser']; ?>
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
                  <a href="../pdf_generate/pdf_login_print.php?eng_id=<?php echo $eng_id; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Print<?php //echo $page; ?></a>
                  <a href="export_login_excel.php?eng_id=<?php echo $eng_id; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" class="btn btn-light border-2 border-dark rounded-3 text-center text-dark my-2 mx-2">Export to Excel<?php //echo $page; ?></a>
                   
                </div>
                
               


                 
                

           </div>

           <?php


           include "../template/footer.php";
            ?>