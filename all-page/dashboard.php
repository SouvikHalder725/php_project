<?php


include "../config/conn.php";
include "../template/header.php";
include "../template/sidebar.php";

$timezone=date_default_timezone_set("Asia/Calcutta");
$date = date('d-m-y');

 
//$timezone=date_default_timezone_set("Asia/Calcutta");
//$date = date('Y-m-d H:i:s');
$day = date('l');
                 





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



// print_r($arr);

                
$arr2=array();





 $arr_length=count($arr);
// foreach ($arr as $key) {
    for($i=0;$i<$arr_length; $i++){


      
        $sql="select * from `it_report_add` WHERE `id`='$arr[$i]' and  `call_status`='Open'";
        $query=mysqli_query($conn,$sql);
        $num2=mysqli_num_rows($query);
        $row2=mysqli_fetch_assoc($query);
        
       

          $user_id=$row2['user_id']; 

          $sql="SELECT * FROM `user` WHERE `id`='$user_id'";
          $query=mysqli_query($conn,$sql);
          $res=mysqli_fetch_array($query);
           $user=$res['user'];

          $dept_id=$row2['udept_id'];


          $sql="SELECT * FROM `udepartment` WHERE `id`='$dept_id'";
          $query=mysqli_query($conn,$sql);
          $res=mysqli_fetch_array($query);
          $dept=$res['udepartment'];



         $issue_id=$row2['issue_id'];

         $sql="SELECT * FROM `issue` WHERE `id`='$issue_id'";
         $query=mysqli_query($conn,$sql);
         $res=mysqli_fetch_array($query);
         $iss=$res['issue'];


          $msg="A Report Is Submitted By: ".$user." From : ".$dept." ,& The Issue Is: ".$iss." Date: ".$row2['created']." ,Time: ".$row2['call_time'].""; 


         $arr2[]=$msg;


              
        



}

 $size=count($arr2);
 // print_r($arr2);
 // echo $arr2[2];
          

?>








<div class="container col-md-12 text-dark border border-3 rounded-4" style="height:100%; border-radius: 15px; background-color:  #f5f5dc;">
       <div class="row bg-secondary my-1 col-md-12" style="width:100%;">
          <div class="col-md-12">
            <h3 class="text-center text-light my-2">Welcome  <?php echo $_SESSION['name']; ?></h3>
          </div>


          

        </div>


        
         <!-- to show success massage  -->

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



    <?php if($_SESSION['access']=="admin") {?>
        <div class="container">
              <div class="d-flex flex-wrap">
               
                    <a href="new_call.php" class="btn btn-info mx-5 col-md-3 my-5">
                        <div class="btn btn-info d-flex">
                            <div style="font-size:30px;">
                                
                                <i class="fa fa-large fa-bell mx-2 fs-5"></i>
                            </div>
                          
                          <div>
                            <h4 class="text-start text-light"><b>Notification</b></h4>
                            <p class="text-start text-light">
                                <b><?php echo $num; ?> Open Call Log</b>
                            </p>
                        </div>
                        </div>
                        
                    </a>
                    <a href="new_this_month_call.php" class="btn btn-warning mx-5 col-md-3 my-5">
                        <div class="btn btn-warning d-flex">
                            <div style="font-size:30px;">
                                
                                <i class="fa fa-large fa-bell mx-2 fs-5"></i>
                            </div>
                          
                          <div>
                            <h4 class="text-start text-light"><b>Notification</b></h4>
                            <p class="text-start text-light">
                                <b><?php echo $size; ?>  New This Month Call Log</b>
                            </p>
                        </div>
                        </div>
                        
                    </a>
                
                  
                  <!-- <a href="javascript:void(0)" onclick="start()">Start</a>
                  <a href="javascript:void(0)" onclick="clear()">Clear</a> -->
              </div>
          </div>

       <input type="hidden" name="size_of_array" id="size_of_array" value="<?php echo $size; ?>">

        <?php for ($i=0; $i <$size; $i++) {  ?>


          <?php if($arr[$i]=="") {?>
                <input type="hidden" name="" id="msg_input<?php echo $i; ?>" class="form-control" value="<?php echo ""; ?>">
            <?php } else{ ?>
               <input type="hidden" name="" id="msg_input<?php echo $i; ?>" class="form-control" value="<?php echo $arr2[$i]; ?>">
            <?php } ?>


        <?php } ?>


           

 <?php }?>

  
</div>






<?php
include "../template/footer.php";
?>

    
<?php if($_SESSION['access']=="admin") { ?>

    
        <script type="text/javascript">



            var size_of=$('#size_of_array').val();
            for (var i = 0; i <size_of; i++) {
               
              if(i==0){
                var msg=$('#msg_input0').val();
               }
             else if(i==1){
                var msg=$('#msg_input1').val();
               } 
             else if(i==2){
                var msg=$('#msg_input2').val();
               }
             else if(i==3){
                var msg=$('#msg_input3').val();
               }
             else if(i==4){
                var msg=$('#msg_input4').val();
               }
                else if(i==5){
                var msg=$('#msg_input5').val();
               }
                else if(i==6){
                var msg=$('#msg_input6').val();
               }
                else if(i==7){
                var msg=$('#msg_input7').val();
               }
                else if(i==8){
                var msg=$('#msg_input8').val();
               }
                else if(i==9){
                var msg=$('#msg_input9').val();
               }
                else if(i==10){
                var msg=$('#msg_input10').val();
               }
              
                
                

                
               
                 // function start(){
                 

                if(msg!=""){
                     Push.create("Hello Admin!", {
                        body: ""+msg+"",
                        icon: '../asset/image/sanmarglogo.jpg',
                        timeout: 4000,
                           onClick: function () {
                              window.focus();
                              this.close();
                           }
                           });
                     }

                     // function clear(){
                       Push.clear();
                    // }
              

                   // }
               }
            
                

            </script>

   
<?PHP } ?>
     
 

