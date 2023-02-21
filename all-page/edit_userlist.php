<?php


include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";




if(isset($_GET['id'])){

  $id=$_GET['id'];




  $sql="SELECT * FROM `user` WHERE `id`='$id'";
  $query=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($query);


  $user=$row['user'];
  $id=$row['id'];

  $new_user_id=''.$user.''.$id.'';
  $new_user_id_new=strtolower($new_user_id);
  $final_user_id=str_replace(" ","",$new_user_id_new);
}


?>












        <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-8">
                    <h3 class="text-center text-light my-2">update The  User</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="userlist.php" class="btn btn-primary my-2" style="font-size: 15px;"><i class="fa fa-table mx-1"></i>Back User List</a>
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

                 
                    
                   <form action="../operation/update_user_op.php" method="post">
                    

                   <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                   
                       <div class="d-flex col-md-12 my-2">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Date:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                            <input type="text" class="form-control" id="date" name="date" value="<?php echo date('d-m-y'); ?>" readonly>
                          
                          </div>
                        </div>

                        <div class="d-flex col-md-12 my-2">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>User Name:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $row['user']; ?>" required>

                          </div>
                          
                        </div>
                        <div class="d-flex col-md-12 my-2">

                          <div class="col-md-4 text-center">
                            
                            <label for="" class="text-center"><b>Department:</b></label>
                          </div>
                          <div class="col-md-8">
                            
                           <!--  <input type="text" class="form-control" id="dept" name="dept" aria-describedby="emailHelp"> -->
                           <select class="form-select" aria-label="Default select example" id="dept" name="dept" required>
                                <option selected value="<?php echo $row['dept_id']; ?>"><?php $dept_id=$row['dept_id']; 

                                        $sql3="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
                                        $query3=mysqli_query($conn,$sql3);
                                        $res3=mysqli_fetch_array($query3);
                                        if($res3['udepartment']==""){
                                          echo "Select Department";
                                        }
                                        else{
                                           echo $res3['udepartment'];
                                         }






                                 ?></option>

                                <?php
                                  $sql="SELECT * FROM `udepartment`";
                                  $query=mysqli_query($conn,$sql);
                                  while($res=mysqli_fetch_array($query)){
                                   echo '<option value="'.$res['id'].'">'.$res['udepartment'].'</option>';


                                  }

                                  ?>
                                
                              </select>
                          
                          </div>
                        </div>
                         <div class="d-flex col-md-12 my-2">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>User Id:</b></label>

                          </div>
                          <div class="col-md-8">

                            <?php if($row['user_id']!=""){ ?>
                                 <input type="text" class="form-control" id="user_id" name="user_id" value="<?php   echo $row['user_id']; ?>" required>
                            <?php }else{ ?>
                              <input type="text" class="form-control" id="user_id" name="user_id" value="<?php   echo $final_user_id; ?>" required>
                            <?php } ?>

                          </div>
                          
                        </div>
                         <div class="d-flex col-md-12 my-2">
                          <div class="col-md-4 text-center">
                            <label for="" class="text-center"><b>User Password:</b></label>

                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>

                          </div>
                          
                        </div>
                
                   <hr>
                  
                  
                   
                   <div class="col-md-12 my-2 d-flex">
                      <button type="submit" class="btn btn-primary mx-2" name="update_submit">Update</button>
                      <button type="Reset" class="btn btn-warning mx-2" name="Reset">Reset</button>
                   </div>
                        
                    
                      
                     
                     
                     
                  </form>
                
                  
                </div>


                 


                

       </div>

     <?php


     include "../template/footer.php";
    ?>


           
