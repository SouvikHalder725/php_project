<?php



include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";


?>




        <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">Add New Solution</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="solution_list.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-table mx-1"></i>All Solution List</a>
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

                 
                    
                   <form action="../operation/add_new_sol_op.php" method="post">
                    

                
                   
                       <div class="d-flex col-md-6 my-2">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Date:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="date" name="date" value="<?php echo date('d-m-y'); ?>" readonly>
                          
                          </div>
                        </div>
                         <div class="d-flex col-md-6">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Solution Type:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <!-- <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"> -->
                            <select class="form-select" aria-label="Default select example" id="sol_type" name="sol_type" required>
                                <option selected>Select Solution Type</option>

                                <?php
                                  $sql="SELECT * FROM `solution`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){
                                   echo '<option value="'.$res['id'].'">'.$res['solution'].'</option>';


                                  }

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>


                        <div class="d-flex col-md-6 my-2">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>Solution:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="solution" name="solution" required>

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


           