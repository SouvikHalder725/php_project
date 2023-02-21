<?php



include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";


?>




        <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">Add New Issue</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="issue_list.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-table mx-1"></i>All Issue List</a>
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

                 
                    
                   <form action="../operation/add_new_issue_op.php" method="post">
                    

                
                   
                       <div class="d-flex col-md-6 my-2">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Date:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" value="<?php echo date('d-m-y'); ?>" id="date" name="date" readonly="readonly">
                          
                          </div>
                        </div>

                         <div class="d-flex col-md-6 my-2">
                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Select Issue:</b></label>
                          </div>
                          <div class="col-md-8">
                            <!-- <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"> -->
                            <select class="form-select" aria-label="Default select example" id="solution_type" name="solution_type" required>
                                <option selected>Select Issue</option>

                                <?php
                                  $sql="SELECT * FROM `solution_type`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){
                                   echo '<option value="'.$res['solution_type'].'">'.$res['solution_type'].'</option>';


                                  }

                                  ?>
                                
                              </select>
                            </div>
                          </div>



                        <div class="d-flex col-md-6 my-2">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Issue:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="issue" name="issue" required>

                          </div>
                          
                        </div>
                
                   <hr>
                  
                  
                   
                   <div class="col-md-12 my-2 d-flex">
                      <button type="submit" class="btn btn-primary mx-2" name="submit">Save</button>
                      <button type="Reset" class="btn btn-warning mx-2" name="Reset">Reset</button>
                   </div>
                        
                    
                      
                     
                     
                     
                  </form>
                
                  
                </div>


                 


                

       </div>

     <?php


     include "../template/footer.php";
    ?>


           