
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
  
// $sqlresult="select * from `it_report_add` WHERE `call_status`='Open'";
// $queryresult=mysqli_query($conn,$sqlresult);
// $result=mysqli_num_rows($queryresult);









$timezone=date_default_timezone_set("Asia/Calcutta");
$date = date('d-m-y');



$sqlresult="select * from `it_report_add`  WHERE `call_status`='Open' ORDER BY `id` DESC";
$queryresult=mysqli_query($conn,$sqlresult);
$num=mysqli_num_rows($queryresult);
 $arr=array();
while($row=mysqli_fetch_array($queryresult)){;

        //echo $cur_date=date('d');
        $originalDate=$row['created'];
        // date_format($data_date,"Y/m/d");
        // $originalDate = "2010-03-21";
        $new_d_Date = date("d", strtotime($originalDate));
        $new_m_Date = date("m", strtotime($originalDate));
        $new_y_Date = date("y", strtotime($originalDate));

        $date_d = date('d');
        $date_m = date('m');
        $date_y = date('y');

        if($date_y==$new_y_Date){
            if($date_m==$new_m_Date){
                if($date_d>=$new_d_Date){
                                       
                   $sql="select * from `it_report_add`  WHERE `created`='$originalDate' and  `call_status`='Open' ORDER BY `id` DESC";
                    $query=mysqli_query($conn,$sql);
                    $num2=mysqli_num_rows($query);
                    $row2=mysqli_fetch_assoc($query);

                       $arr[]=$row['id'];
                     
                    
                
                     

                   
        
                          
                    
                    
                }
            }
        }

}

 $size=sizeof($arr);
// to get perpage or page no  value 
$per_page=ceil($size/$limit);

$offset=($page-1)*$limit;



 




?>
            <div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
               <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
                  <div class="col-md-12">
                    <h3 class="text-center text-light my-2">New Reports List</h3>
                  </div>

                  
              </div>
              


                 <div class="row col-md-12 table-responsive">
                   <table class="table-bordered table table-striped text-center" style="font-size:12px;" border="1">
                  
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
                           
                            <td scope="col"><b>Option</b></td>
                            
                            

                          </tr>
                        </thead>
                        <tbody>


                          <?php 
                          $r=$offset+1;
                          if($size>0){

                               
                                  foreach ($arr as $key) {

    
                                  $sql="select * from `it_report_add`  WHERE `id`='$key' and  `call_status`='Open' ORDER BY `id` DESC";
                                  $query=mysqli_query($conn,$sql);
                                  $num2=mysqli_num_rows($query);
                                  while($row2=mysqli_fetch_assoc($query)){
                                  
        
                              
                                ?>
                                              <tr>
                                                <th scope="row"><b><?php echo $r ;?></b></th>
                                                <td><b>
                                                  <?php
                                                  $user_id=$row2['user_id'];


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
                                                  $udept_id=$row2['udept_id'];


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




                                                  <?php echo $row2['insert_date'];?></b></td>
                                                
                                                <td><b><?php echo $row2['call_time'];?></b></td>
                                                <td><b>
                                                  <?php
                                                  $issue_id=$row2['issue_id'];


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
                                                      $solution_id=$row2['solution_id'];


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
                                                          $eng_id=$row2['eng_id'];


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
                                                          <td><b><?php echo $row2['call_close_date']; ?></b></td>
                                                          
                                                          <td><b><?php echo $row2['call_close_time']; ?></b></td>
                                                          <td><b><?php echo $row2['call_status']; ?></b></td>

                                                
                                                 <td><b><a href="call_log_edit.php?id=<?php echo $row2['id']; ?>" class="btn btn-primary">Edit</a>
                                                  

                                                 </b></td>
                                                  




                                              </tr>

                         
                             
                        <?php 
                        $r++;
                          }

                         }
                       }else{ ?>
                        <td colspan="11"><b><?php echo "No Data Found!!"; ?></b></td>

                       <?php }
                      
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

                 if($size>0){


                 ?>
                      <div class="col-md-12 d-flex">
                        <div class="col-md-6 my-2">
                          <p class="text-start"><?php echo 'Showing  '.$start.'  to  '.$offset_number.'  of  '.$size.'  entries'; ?></p>
                          
                        </div>
                        <div class=" col-md-6 my-2">
                          <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item">
                                  <a class="page-link" href="new_this_month_call.php?page=<?php echo 1;?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>First
                                  </a>
                                </li>
                                <?php if($p>1){ ?>
                                <li class="page-item">
                                  <a class="page-link" href="new_this_month_call.php?page=<?php echo $prev; ?>">
                                   Previous
                                  </a>
                                </li><?php } ?>
                                <?php for ($p=$page; $p<=$page+5 ; $p++) { 
                                   if($p<=$per_page and $page>0){
                                    ?>
                                
                                     <li class="page-item"><a class="page-link"  href="new_this_month_call.php?page=<?php echo $p; ?>"><?php echo $p;  ?></a></li>
                              <?php 
                                   }

                               }
                              ?> <?php if($p<=$per_page){ ?>
                                <li class="page-item">
                                  <a class="page-link" href="new_this_month_call.php?page=<?php echo $next; ?>">
                                    Next
                                  </a>
                                </li> <?php } ?>
                                <li class="page-item">
                                  <a class="page-link" href="new_this_month_call.php?page=<?php echo $per_page; ?>" aria-label="Next">
                                    Last<span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>

                              </ul>
                            </nav>
                        </div>
                        
                      </div>
                       <?php } ?>

                 
               


           </div>

           <?php


           include "../template/footer.php";
            ?>


           