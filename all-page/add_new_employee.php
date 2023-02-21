<?php



include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";


?>




        <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">Add New Employee</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="employee_list.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-table mx-1"></i>All Employee List</a>
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

                 
                    
                   <form action="../operation/add_new_employee_op.php" method="post" enctype="multipart/form-data">
                    <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Name:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
                            
                          
                          </div>
                        </div>
                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Employee Image:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="file" class="form-control" id="emp_img" name="emp_img" required>

                          </div>
                          
                        </div>

                        
                   </div>
                   <div class="d-flex col-md-12 my-1">
                       <div class="col-md-6">
                            <div class="d-flex col-md-12 my-1">
                                <div class="col-md-4 text-center">
                                  <label for="" class="text-center"><b>Gender:</b></label>

                                </div>
                                <div class="col-md-8">
                                  <select class="form-select" aria-label="Default select example" id="gender" name="gender" required>
                                     <option selected value="Male">Male</option>
                                     <option  value="Female">Female</option> 
                                  </select>
                                      
                                </div>
                                
                             </div>
                          
                             <div class="d-flex col-md-12 my-1">

                                <div class="col-md-4 text-center">
                                  
                                  <label for="" class="text-center"><b>DOB:</b></label>
                                </div>
                                <div class="col-md-8">
                                  
                                  <input type="date" class="form-control" id="dob" name="dob" aria-describedby="emailHelp" required>
                                
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6" style="margin-left:220px;">
                          <img src="../asset/image/user.png" width="80" height="80" id="preview_pics" name="preview_pics">
                        </div>

                        
                   </div>
                  
                   <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Department:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="department" name="department" aria-describedby="emailHelp"> -->
                            <select class="form-select" aria-label="Default select example" id="department" name="department" required>
                                <option selected>Select Department</option>

                                <?php
                                  $sql="SELECT * FROM `t_05_department`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){
                                   echo '<option value="'.$res['department_id'].'">'.$res['department'].'</option>';


                                  }

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Designation:</b></label>

                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="designation" name="designation"> -->
                            <select class="form-select" aria-label="Default select example" id="designation" name="designation" required>
                                <option selected>Select Designation</option>

                                <?php
                                  $sql="SELECT * FROM `t_05_designation`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){
                                   echo '<option value="'.$res['designation_id'].'">'.$res['designation'].'</option>';


                                  }

                                  ?>
                                
                              </select>

                          </div>
                          
                        </div>
                   </div>
                   <hr>
                   <div>
                     <h5><b>Present address</b></h5>
                   </div>
                    <hr>
                   <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Line 1:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="present_add_line_1" name="present_add_line_1" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>City:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="present_city" name="present_city" required>

                          </div>
                          
                        </div>
                   </div>
                    <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Line 2:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="present_add_line_2" name="present_add_line_2" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>State:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="present_state" name="present_state" required>

                          </div>
                          
                        </div>
                   </div>
                    <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Line 3:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="present_address_line_3" name="present_address_line_3" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Pincode:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="present_pincode" name="present_pincode" required>

                          </div>
                          
                        </div>
                   </div>
                  
                   <div class="d-flex col-md-12 my-1">
                      
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Nearest Landmark:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="present_landmark" name="present_landmark" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                       
                   </div>
                   <hr>
                   <div>
                     <h5><b>Permanent Address</b></h5>
                   </div>
                    <hr>
                        <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Line 1:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="parmanent_address_line_1" name="parmanent_address_line_1" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>City:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="parmanent_city" name="parmanent_city" required>

                          </div>
                          
                        </div>
                   </div>
                    <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Line 2:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="parmanent_address_line_2" name="parmanent_address_line_2" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>State:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="parmanent_state" name="parmanent_state" required>

                          </div>
                          
                        </div>
                   </div>
                    <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Line 3:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="parmanent_address_line_3" name="parmanent_address_line_3" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Pincode:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="parmanent_pincode" name="parmanent_pincode" required>

                          </div>
                          
                        </div>
                   </div>
                  
                   <div class="d-flex col-md-12 my-1">
                      
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Nearest Landmark:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="parmanent_landmark" name="parmanent_landmark" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                       
                   </div>               
                   <hr>
                   <div>
                    <h5>
                      <b>Contact No
                      </b></h5>
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Phone No:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="contact_phone_no" name="contact_phone_no" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Mobile No:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="contact_mobile_no" name="contact_mobile_no" required>

                          </div>
                          
                        </div>
                   </div>
                   <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Email:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="contact_email" name="contact_email" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>User Type:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="contact_usertype" name="contact_usertype" required>

                          </div>
                          
                        </div>
                   </div>
                   <hr>
                   <div>
                     <h5><b>Other Details</b></h5>
                   </div>
                   <hr>
                   <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Employee Id:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="employee_id" name="employee_id" aria-describedby="emailHelp" required>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-6">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Password:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="employee_password" name="employee_password" required>

                          </div>
                          
                        </div>
                   </div>
                   <div class="d-flex col-md-12 my-1">
                       <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Employee Type:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="employee_type" name="employee_type" aria-describedby="emailHelp"> -->
                             <select class="form-select" aria-label="Default select example" id="employee_type" name="employee_type" required>
                                     <option selected value="engineer">Engineer</option>
                                     <option  value="employee">Employee</option> 
                                  </select>
                            
                          
                          </div>
                        </div>

                        
                   </div>

                   <hr>













                   <div class="col-md-12 my-2">
                      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                      
                      <button type="Reset" class="btn btn-warning mx-2" name="Reset">Reset</button>
                   </div>
                   <hr>
                        
                    
                      
                     
                     
                     
                  </form>
                
                  
                </div>


                 


                

       </div>

     <?php


     include "../template/footer.php";
    ?>


           