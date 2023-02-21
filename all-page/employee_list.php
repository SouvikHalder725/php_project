
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
  
$sqlresult="select * from `t_05_employee`";
$queryresult=mysqli_query($conn,$sqlresult);
$result=mysqli_num_rows($queryresult);

// to get perpage or page no  value 
$per_page=ceil($result/$limit);

$offset=($page-1)*$limit;

 $sql="SELECT * FROM `t_05_employee` ORDER BY  `employee_id` DESC LIMIT $offset,$limit";
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


        $sql_id="SELECT * FROM `t_05_employee` WHERE `name` like '%$input%' ";
        $query_id=mysqli_query($conn,$sql_id);
        while($res_id=mysqli_fetch_array($query_id)){
          $res_name=$res_id['employee_id'];
        
          $sql="SELECT * FROM `t_05_employee` WHERE `employee_id`='$res_name'";
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
        
      $sqlresult="select * from `t_05_employee`";
      $queryresult=mysqli_query($conn,$sqlresult);
      $result=mysqli_num_rows($queryresult);


      $per_page=ceil($result/$limit);

      $offset=($page-1)*$limit;

       // $sql="SELECT * FROM `employee_table` ORDER BY  `emp_name` DESC LIMIT $offset,$limit";
       // $query=mysqli_query($conn,$sql);

       // if only department input is submitted and company input is blank

        if ($select_department!=""  && $company_select=="") {

            $sql="SELECT * FROM `t_05_employee` WHERE `department`='$select_department'";
            $query=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($query);
            if($num<=0){
              $_SESSION['msg2']="Data Not Found";
            }
           
        }
        // if company is submitted and department is blank 

        elseif ($select_department==""  && $company_select!="") {
            $sql="SELECT * FROM `t_05_employee` WHERE `company_id`='$company_select'";
            $query=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($query);
            if($num<=0){
              $_SESSION['msg2']="Data Not Found";
            }
            
        }

        // if department and company anme both are submittted in filter form

        elseif($select_department!=""  && $company_select!=""){

            $sql="SELECT * FROM `t_05_employee` WHERE  `department`='$select_department' and `company_id`='$company_select'";
            $query=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($query);
            if($num<=0){
              $_SESSION['msg2']="Data Not Found";
            }
          
        }


        // if user not filter and search then show only default view


        else{

           $sql="SELECT * FROM `t_05_employee` ORDER BY  `employee_id ` DESC LIMIT $offset,$limit";
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
                    <h3 class="text-center text-light my-1">All Employee List</h3>
                  </div>




                 
                  
                  <div class="col-md-2">
                    <a href="add_new_employee.php" class="btn btn-primary my-1" style="font-size: 15px;"><i class="fa fa-user-plus mx-1"></i>Add New Employee</a>
                  </div>

                  
                   <div class="col-md-2">
                    <a href="employee_list.php" class="btn btn-info my-1" style="font-size: 15px;"><i class="fa fa-refresh mx-1"></i>Refresh List</a>
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
                <div class="col-md-4 d-flex text-right my-1" style="float: right;">
                  
                  <input type="text" name="search" class="form-control text-right">
                  <!-- <input type="submit" name="search_submit" value="Search" class="btn btn-light text-dark text text-center mx-2 border-2 border-primary rounded-3"> -->
                  <button type="submit" name="search_submit"  class="btn btn-light text-dark text text-center mx-2 border-2 border-primary rounded-3" style="font-size:10px;" ><i class='fa fa-search mx-1'></i>Search</button>
                 
                  
                </div>
              </form>
                  


              </div>


                 <div class="row col-md-12">
                   <table class="table table-striped text-center" style="font-size:10px;" border="0">
                  
                        <thead>
                          
                          <tr>
                            <td scope="col"><b>#</b></td>
                            <td scope="col"><b>Name</b></td>
                            <td scope="col"><b>Image</b></td>
                            <td scope="col"><b>Department</b></td>
                            <td scope="col"><b>Designation</b></td>
                            <td scope="col"><b>Mobile</b></td>
                            <!-- <td scope="col"><b>Email</b></td> -->
                            
                            

                          </tr>
                        </thead>
                        <tbody>


                          <?php 
                          $r=$offset+1;

                          while($row=mysqli_fetch_array($query)) {
                            if($row['employee_id']!=99){
  
                        
                          ?>
                          <tr>
                            <th scope="row"><b><?php echo $r ;?></b></th>
                            <td><b><?php echo $row['name'];?></b></td>  
                            <td><b>


                              <?php 
                              if($row['employee_image']){ ?>
                                     <img src="../operation/uploads/image/<?php echo $row['employee_image']; ?>"  width="50" height="50" style="border: 2px solid black;">

                              <?php }else{ ?>
                                      <img src="../asset/image/userimage.png"  width="50" height="50" style="border: 2px solid black;">

                              <?php } ?>
                            </b></td>                      
                            <td><b>
                              



                               <?php
                              $udept_id=$row['department_id'];


                               $sqldept="SELECT * FROM `t_05_department` WHERE `department_id`='$udept_id'";

                               $querydept=mysqli_query($conn,$sqldept);
                               $resdept=mysqli_fetch_array($querydept);

                               
                               if($resdept!=""){
                                echo $resdept['department'];
                               }
                               else{
                                echo "No Data Found!!";
                               }

                                ?>



                            </b></td>
                            <td><b>
                              


                               <?php
                              $udesig_id=$row['designation_id'];


                               $sqldept="SELECT * FROM `t_05_designation` WHERE `designation_id`='$udesig_id'";

                               $querydept=mysqli_query($conn,$sqldept);
                               $resdept=mysqli_fetch_array($querydept);

                               
                               if($resdept!=""){
                                echo $resdept['designation'];
                               }
                               else{
                                echo "No Data Found!!";
                               }

                                ?>



                            </b></td> 
                             
                            <td><b><?php echo $row['mobile_no'];?></b></td> 
                            <!-- <td><b><?php// echo $row['email'];?></b></td>  -->
                            




                          </tr>

                         
                             
                        <?php 
                        $r++;

                        }
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



                 ?>
                <div class="col-md-12 d-flex">
                  <div class="col-md-6 my-1">
                    <p class="text-start"><?php echo 'Showing  '.$start.'  to  '.$offset_number.'  of  '.$result.'  entries'; ?></p>
                    
                  </div>
                  <div class=" col-md-6 my-1">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item">
                            <a class="page-link" href="employee_list.php?page=<?php echo 1;?>" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>First
                            </a>
                          </li>
                           <?php if($p>1){ ?>
                          <li class="page-item">
                            <a class="page-link" href="employee_list.php?page=<?php echo $prev; ?>">
                             Previous
                            </a>
                          </li><?php } ?>


                          <?php
                          
                           for ($p=$page; $p<=$page+5 ; $p++) {
                           if($p<=$per_page){
                            ?>
                          
                               <li class="page-item"><a class="page-link"  href="employee_list.php?page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
                              <?php
                                  }

                               }
                              ?>
                              <?php if($p<=$per_page){ ?>
                          <li class="page-item">
                            <a class="page-link" href="employee_list.php?page=<?php echo $next; ?>">
                              Next
                            </a>
                          </li> <?php } ?>
                          <li class="page-item">
                            <a class="page-link" href="employee_list.php?page=<?php echo $per_page; ?>" aria-label="Next">
                              Last<span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                          
                        </ul>
                      </nav>
                  </div>
                  
                </div>

                 
                

           </div>

           <?php


           include "../template/footer.php";
            ?>


           
