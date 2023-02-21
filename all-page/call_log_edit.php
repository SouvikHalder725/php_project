<?php



include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";
if($_GET['id']){
  $id=$_GET['id'];


$sqlresult="select * from `it_report_add` WHERE `id`='$id'";
$queryresult=mysqli_query($conn,$sqlresult);
$result=mysqli_num_rows($queryresult);
$row=mysqli_fetch_array($queryresult);
}


?>




        <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">Add New Reports</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="main.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-table mx-1"></i>All Reports</a>
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

                 
                    
                   <form action="../operation/edit_new_reports.php" method="post">
                    <input type="text" name="id_edit" value="<?php echo $row['id']; ?>">
                    <div class="d-flex col-md-12 my-2">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>User:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"> -->
                            <select class="form-select" aria-label="Default select example" id="user" name="user" required>
                                <option selected >Select User</option>

                                <?php
                                  $sql="SELECT * FROM `user`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                   <option <?php print ($row['user_id']==$res['id']) ? "selected" : ""; ?> value="<?php  echo $res['id']; ?>"><?php echo $res['user']; ?></option>


                                 <?php }

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Quantity :</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="number" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" min="1" max="100" value="<?php echo $row['quantity']; ?>" required>
                          
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
                                <option selected>Select Department</option>


                                <?php
                                  $sql="SELECT * FROM `udepartment`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                   <option <?php print ($row['udept_id']==$res['id']) ? "selected" : ""; ?> value="<?php echo $res['id']; ?>"><?php echo $res['udepartment']; ?></option>


                                  <?php }

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Date:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" value="<?php echo $row['insert_date']; ?>" required>
                          
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
                                  while($res=mysqli_fetch_array($query)){ ?>
                                   <option <?php print ($row['issue_id']==$res['id']) ? "selected" : ""; ?> value="<?php echo $res['id']; ?>"><?php echo $res['issue']; ?></option>


                                  <?php }

                                  ?>
                                
                              </select>

                          </div>
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Call Time:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="time" class="form-control" id="call_time" name="call_time" aria-describedby="emailHelp" value="<?php echo $row['call_time']; ?>" required>
                          
                          </div>
                        </div>
                        
                        

                       
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-2">
                     <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Solution Type:</b></label>

                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="sol_type" name="sol_type"> -->
                            <select class="form-select" aria-label="Default select example" id="sol_type" name="sol_type" required>
                                <option selected>Select Solution Type</option>

                                <?php
                                  $sql="SELECT * FROM `solution_type`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                  <option <?php print ($row['solution_type_id']==$res['id']) ? "selected" : ""; ?> value="<?php echo $res['id']; ?>"><?php echo $res['solution_type']; ?></option>


                                 <?php  }

                                  ?> 
                                
                              </select>

                          </div>
                          
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Call status:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="call_status" name="call_status" aria-describedby="emailHelp"> -->
                             <select class="form-select" aria-label="Default select example" id="call_status" name="call_status" required>
                                 <option selected value="<?php echo $row['call_status']; ?>"><?php echo $row['call_status']; ?></option>
                                 <option value="Closed">Closed</option>
                                 <option  value="Open">Open</option>
                                  <option value="Pending">Pending</option>
                                  

                                
                                
                              </select>
                          
                          </div>
                        </div>
                         
                       
                         
                      </div>
                      

                      

                   <hr>
                   <div class="d-flex col-md-12 my-2">
                     <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Solution:</b></label>

                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="solution" name="solution"> -->

                            <select class="form-select" aria-label="Default select example" id="solution" name="solution" required>
                                <option selected>Select Solution</option>

                                <?php
                                  $sql="SELECT * FROM `solution`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                    <option <?php print ($row['solution_id']==$res['id']) ? "selected" : ""; ?> value="<?php echo $res['id']; ?>"><?php echo $res['solution']; ?></option>
                                  

                                 <?php }

                                  ?>
                                
                              </select>

                          </div>
                          
                        </div>
                        <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Call status Remarks :</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="call_status_remarks" name="call_status_remarks" aria-describedby="emailHelp" value="<?php echo $row['call_remarks']; ?>" required>
                          
                          </div>
                        </div>
                       
                        
                     
                         

                       

                       
                   </div>
                   <hr>
                   
                   
                   <div class="d-flex col-md-12 my-2">
                     <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Engineer Name:</b></label>

                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="eng_name" name="eng_name"> -->
                            <select class="form-select" aria-label="Default select example" id="eng_name" name="eng_name" required>
                                <option selected>Select Engineer Name</option>

                                <?php
                                  $sql="SELECT * FROM `t_05_employee`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                     <option <?php print ($row['eng_id']==$res['employee_id']) ? "selected" : ""; ?> value="<?php echo $res['employee_id']; ?>"><?php echo $res['name']; ?></option>
                                  


                              <?php     }

                                  ?>
                                
                              </select>

                          </div>
                          
                        </div>
                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Call close Date:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="date" class="form-control" id="call_close_date" name="call_close_date" value="<?php echo $row['call_close_date']; ?>" required>

                          </div>
                          
                        </div>
                         
                       
                       
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-2">
                    <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Engineer Department:</b></label>

                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="eng_dep" name="eng_dep"> -->
                            <select class="form-select" aria-label="Default select example" id="call_log_eng_dept" name="eng_dept" required>
                                <option selected>Select Eng. Department</option>

                                <?php
                                  $sql="SELECT * FROM `t_05_department`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                     <option <?php print ($row['edept_id']==$res['department_id']) ? "selected" : ""; ?> value="<?php echo $res['department_id']; ?>"><?php echo $res['department']; ?></option>
                                   


                              <?php     }

                                  ?>
                                
                              </select>

                          </div>
                          
                        </div>
                         <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Call Close Time :</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="time" class="form-control" id="call_close_time" name="call_close_time" value="<?php echo $row['call_close_time']; ?>" required>

                          </div>
                          
                        </div>
                        
                      

                        
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-2">
                      <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Engineer Shift:</b></label>

                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="eng_shift" name="eng_shift"> -->
                            <select class="form-select" aria-label="Default select example" id="eng_shift" name="eng_shift" required>
                                <option selected>Select Eng. Shift</option>

                                <?php
                                  $sql="SELECT * FROM `shift`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){ ?>
                                     <option <?php print ($row['shift_id']==$res['id']) ? "selected" : ""; ?> value="<?php echo $res['id']; ?>"><?php echo $res['shift']; ?></option>
                                   


                               <?php   }

                                  ?>
                                
                              </select>

                          </div>
                          
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


           