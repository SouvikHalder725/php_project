<?php



include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";


?>




        <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">Add New Reports</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="user_main.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-table mx-1"></i>All Reports</a>
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

                 
                    
                   <form action="../operation/add_new_reports_by_user_op.php" method="post">
                    <div class="d-flex col-md-12 my-2">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>User:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"> -->
                            <select class="form-select" aria-label="Default select example" id="user" name="user" required>
                                <!-- <option selected>Select User</option> -->

                                <?php
                                $emp_id=$_SESSION['employee_id'];
                                  $sql="SELECT * FROM `user` WHERE `id`='$emp_id'";
                                  $query=mysqli_query($conn,$sql);
                                  $res=mysqli_fetch_array($query);
                                  // while($res=mysqli_fetch_array($query)){
                                   echo '<option selected value="'.$res['id'].'">'.$res['user'].'</option>';


                                  

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Quantity :</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="number" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" min="1" max="100" required>
                          
                          </div>
                        </div>
                        


                       
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-2">
                    <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Department:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="dept" name="dept" aria-describedby="emailHelp"> -->
                           <select class="form-select" aria-label="Default select example" id="call_log_dept" name="dept" required>
                            <!-- <div id="option"></div> -->
                                <!-- <option selected>Select Department</option> -->


                                <?php
                                $dept_id=$_SESSION['department_id'];
                                  $sql="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
                                  $query=mysqli_query($conn,$sql);
                                  $res=mysqli_fetch_array($query);
                                  // while($res=mysqli_fetch_array($query)){
                                   echo '<option selected value="'.$res['id'].'">'.$res['udepartment'].'</option>';


                                  

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Date:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>
                         
                      
                        
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-2">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Issue:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="issue" name="issue" aria-describedby="emailHelp"> -->
                          
                             <select class="form-select" aria-label="Default select example" id="issue" name="issue" required>
                                <option selected>Select Issue</option>

                                <?php
                                  $sql="SELECT * FROM `issue`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){
                                   echo '<option value="'.$res['id'].'">'.$res['issue'].'</option>';


                                  }

                                  ?>
                                
                              </select>

                          </div>
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Call Time:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="time" class="form-control" id="call_time" name="call_time" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>
                        
                        

                       
                   </div>
            
                  
                   <hr>
                    <div class="d-flex col-md-12 my-2">
                     <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Call status Remarks :</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="call_status_remarks" name="call_status_remarks" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>
                        
                       
                         
                      </div>
                      

                      

                   <hr>
                   <div class="col-md-12 my-2">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                   </div>
                        
                    
                      
                     
                     
                     
                  </form>
                
                  
                </div>


                 


                

       </div>

     <?php


     include "../template/footer.php";
    ?>


           