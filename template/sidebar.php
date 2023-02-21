
         <div class="d-flex" id="flex-div">



            <div class="flex-shrink-0   text-white" id="leftsidebar" style="width: 280px;height: 1400px; margin-top: -16px; background-color: #008B8B;">
              
              <ul class="list-unstyled ps-0">
                <li class="float-right side-item my-1">
                  <button class="btn btn-close text-light bg-light" id="close-sidebar" style="margin-left: 230px; border: 2px solid white; font-size: 20px;"></button>
                  
                </li>
                <li class="mb-1 side-item mx-5">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white bg-primary" style="width: 180px;" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                      <b><i class="fa fa-home mx-1"></i>Dashboard</b>
                    </button>
                    <div class="collapse" id="account-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="dashboard.php" class="nav-link text-white">Dashboard</a></li>
                        
                      </ul>
                    </div>
                  </li>
                <?php if($_SESSION['access']=="admin") {?>
                    <li class="mb-1 side-item mx-5">
                      <button class="btn btn-toggle align-items-center rounded collapsed text-white bg-primary" style="width: 180px;" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                       <b><span><i class="fa fa-user mx-1"></i> User </span></b>
                      </button>
                      <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <li><a href="userlist.php" class="nav-link text-white">User</a></li>
                          <li><a href="udepartment_list.php" class="nav-link text-white">User Department</a></li>
                          <li><a href="issue_list.php" class="nav-link text-white">Issue</a></li>
                          <li><a href="solution_type_list.php" class="nav-link text-white">Solution Type</a></li>
                          <li><a href="shift_list.php" class="nav-link text-white">Shift List</a></li>
                          <li><a href="solution_list.php" class="nav-link text-white">Solution</a></li>
                          <!-- <li><a href="list_card.php" class="nav-link text-white">List Card</a></li> -->
                          <li><a href="list_phone.php" class="nav-link text-white">List Phone</a></li>
                          <li><a href="employee_list.php" class="nav-link text-white">It Employee</a></li>
                         
                        </ul>
                      </div>
                    </li>
                <?php } ?>
                <li class="mb-1 side-item mx-5">
                  <button class="btn btn-toggle align-items-center rounded collapsed text-white bg-primary" style="width: 180px;" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                   <b><i class="fa fa-pencil"></i></i>It Report</b>
                  </button>
                  <div class="collapse" id="dashboard-collapse">
                      <?php if($_SESSION['access']=="admin") {?>
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="add_new_report.php" class="nav-link text-white">Add Call Log</a></li>
                      <li><a href="main.php" class="nav-link text-white">Daily It Report</a></li>                  
                    </ul><?php }else{ ?>
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="add_user_new_report.php" class="nav-link text-white">Add Call Log</a></li>
                      <li><a href="user_main.php" class="nav-link text-white">Daily It Report</a></li>                  
                    </ul>
                  <?php } ?>
                  </div>
                </li>
                 <?php if($_SESSION['access']=="admin") {?>
                  <li class="mb-1 side-item mx-5">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white bg-primary" style="width: 180px;" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                      <b><i class="fa fa-file"></i> Report</b>
                    </button>
                    <div class="collapse" id="orders-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="dr_report.php" class="nav-link text-white">DR Report</a></li>
                        <li><a href="search_report.php" class="nav-link text-white">Search Report</a></li>                      
                      </ul>
                    </div>
                  </li>

                 
                  <li class="mb-1 side-item mx-5">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-white bg-primary" style="width: 180px;" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                      <b><i class="fa fa-gear mx-1"></i> Tools</b>
                    </button>
                    <div class="collapse" id="account-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="login_report.php" class="nav-link text-white">Login Details</a></li>
                        
                      </ul>
                    </div>
                  </li>
                <?php } ?>
                 <li class="border-top my-3 side-item"></li>
                <li class="mb-1 side-item mx-5">
                  <button class="btn btn-toggle align-items-center rounded collapsed text-white bg-primary" style="width: 180px;" data-bs-toggle="collapse" data-bs-target="#calculator-collapse" aria-expanded="false">
                    <b><i class="fa fa-calculator mx-1"></i> Calcalutor</b>
                  </button>
                  <div class="col-md-12 my-2">
                    <form method="post" action="calc.php">
                    <div class="d-flex col-md-12">
                      
                       <div class="col-md-12">
                        <input class="form-control" type="text" name="input_calc" id="input_calc">
                        <input type="hidden" class="col-md-12" name="val_one" id="val_one">
                         <input type="hidden" class="col-md-12" name="val_op" id="val_op">
                         <input type="hidden" class="col-md-12" name="val_two" id="val_two">
                         <input type="hidden" class="col-md-12" name="val_two_hidden" id="val_two_hidden">
                       </div>
                       <div class="">
                         <button class="btn btn-close form-control bg-light text-dark text-center my-2" type="Reset" id="btn-clear" style="margin-left: -25px;"></button>
                      </div> 
                   
                    </div> 
                  </form>
                    <div class="d-flex col-md-12 my-1">
                      <button class="btn btn-light text-dark text-center border border-1 border-dark  col-md-3" id="btn1"><b>1</b></button>
                      <button class="btn btn-light text-dark text-center border border-1 border-dark  col-md-3" id="btn2"><b>2</b></button>
                      <button class="btn btn-light text-dark text-center border border-1 border-dark  col-md-3" id="btn3"><b>3</b></button>
                      <button class="btn btn-light text-dark text-center border border-1 border-dark  col-md-3" id="btnp"><b>+</b></button>                     
                    </div>
                     <div class="d-flex col-md-12 my-1">
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btn4"><b>4</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btn5"><b>5</b></button>
                      <button class="btn btn-light text-dark text-center border border-1 border-dark  col-md-3" id="btn6"><b>6</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btnm"><b>-</b></button>                     
                    </div>
                     <div class="d-flex col-md-12 my-1">
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btn7"><b>7</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btn8"><b>8</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btn9"><b>9</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btnmul"><b>*</b></button>                     
                    </div>
                     <div class="d-flex col-md-12 my-1">
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btndot"><b>.</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btnzero"><b>0</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btneq"><b>=</b></button>
                      <button class="btn btn-light text-dark text-center  border border-1 border-dark col-md-3" id="btnmod"><b>%</b></button>                     
                    </div>
                  </div>

                  
                </li>


                 <li class="border-top my-3 side-item"></li>
              </ul>
            </div>
