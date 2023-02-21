<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">


	 <title>sanmarg.in-it_report</title>
    
     <link rel = "icon" href ="asset/image/sanmarglogo.jpg" type = "image/x-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">

<link  href="../asset/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/footers/">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 



<style type="text/css">
	.wrap{
		background-color: #5f9ea0;
		border: 2px solid black;
		border-radius: 15px;
	}
	
	.img_2{
		background-repeat: no-repeat;
		background-size: cover;
		width: 100%;
		height: 300px;
		border-top-left-radius: 15px;
		border-top-right-radius: 15px;
	}
	@media screen and (max-width: 767px) {
	  #box{
	  	width:600px;
	  }
	  #user_login{
	  	width: 500px;
	  }
	  #admin_login{
	  	width: 500px;
	  }
	  #btn_box{
	  	width: 500px;
	  }
	  #btn_user_login{
	  	width: 270px;
	  }
	  #btn_admin_login{
	  	width: 270px;
	  }
	}
	@media screen and (max-width: 525px) {
	  #box{
	  	width:600px;
	  }
	  #user_login{
	  	width: 396px;
	  }
	  #admin_login{
	  	width: 396px;
	  }
	  #btn_box{
	  	width: 396px;
	  }
	  #btn_user_login{
	  	width: 200px;
	  }
	  #btn_admin_login{
	  	width: 200px;
	  }
	}
	@media screen and (max-width: 425px) {
	  #box{
	  	width:500px;
	  }
	  #user_login{
	  	width: 300px;
	  }
	  #admin_login{
	  	width: 300px;
	  }
	  #btn_box{
	  	width: 300px;
	  }
	  #btn_user_login{
	  	width: 140px;
	  }
	  #btn_admin_login{
	  	width: 140px;
	  }
	}
	@media screen and (max-width: 325px) {
	  #box{
	  	width:300px;
	  }
	  #user_login{
	  	width: 200px;
	  }
	  #admin_login{
	  	width: 200px;
	  }
	  #btn_box{
	  	width: 200px;
	  }
	  #btn_user_login{
	  	width: 140px;
	  }
	  #btn_admin_login{
	  	width: 140px;
	  }
	}




/*c pannel aparajita >>https://sg2plzcpnl487136.prod.sin2.secureserver.net:2083/*/

</style>  





	</head>
	<body style="background-color:wheat;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center border-dark border-3 border rounded-3 my-3">
				<div class="row col-md-6 text-center mb-5">
					<h2 class="heading-section">𝐈𝐭 𝐑𝐞𝐩𝐨𝐫𝐭</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-12">



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





					<div class="wrap">
						<div class="img">
							<img class="img_2" src="asset/image/images_beach3.jfif">
							
						</div>
						<div class="col-md-12 d-flex" id="btn_box">
							<div class=" rounded-3 col-md-6" id="btn_user_login">
					      			<h3 class="mb-4 text-center">𝐔𝐬𝐞𝐫 𝐋𝐨𝐠𝐢𝐧</h3>
					      	</div>
							<div class="  rounded-3 col-md-6" id="btn_admin_login">
					      			<h3 class="mb-4 text-center">𝐀𝐝𝐦𝐢𝐧 𝐋𝐨𝐠𝐢𝐧</h3>
					      	</div>
						</div>
						<div class="col-md-12 d-flex" id="box">
							<div class="login-wrap p-1 p-md-5 col-md-12 my-2" id="user_login">
				      	
					      		
											
						      	<div id="user_div">
									<form action="operation/login_operation.php" method="post" class="signin-form">
							      		<div class="form-group my-3">
							      			
							      			<label class="form-control-placeholder" for="username">𝐔𝐬𝐞𝐫𝐧𝐚𝐦𝐞</label>
							      			<input type="text" class="form-control" name="user_name" id="user_name" required>
							      		</div>
						                <div class="form-group my-3">
						             
								              <label class="form-control-placeholder" for="password">𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</label>
								              <input id="password_value" name="password_value" type="password" class="form-control" required>
						             
						                </div>
							            <div class="form-group my-3">
							            	<button type="submit" id="submit" name="user_submit" class="form-control btn btn-primary rounded submit px-3">𝐋𝐨𝐠𝐢𝐧</button>
							            </div>
						            
						            </form>
						        </div>
			          <!-- <p class="text-center my-3">𝐍𝐨𝐭 𝐚 𝐦𝐞𝐦𝐛𝐞𝐫? <a data-toggle="tab" href="#signup">𝐒𝐢𝐠𝐧 𝐔𝐩</a></p> -->
			                </div>
			                <div class="login-wrap p-2 p-md-5 col-md-12 my-2" id="admin_login">
				      	
					      		
											
						      	<div id="admin_div">
									<form action="operation/login_operation.php" method="post" class="signin-form">
							      		<div class="form-group my-3">
							      			
							      			<label class="form-control-placeholder" for="username">𝐀𝐝𝐦𝐢𝐧 𝐔𝐬𝐞𝐫𝐧𝐚𝐦𝐞</label>
							      			<input type="text" class="form-control" name="user_name" id="user_name" required>
							      		</div>
						                <div class="form-group my-3">
						             
								              <label class="form-control-placeholder" for="password">𝐀𝐝𝐦𝐢𝐧 𝐏𝐚𝐬𝐬𝐰𝐨𝐫𝐝</label>
								              <input id="password_value" name="password_value" type="password" class="form-control" required>
						             
						                </div>
							            <div class="form-group my-3">
							            	<button type="submit" id="submit" name="admin_submit" class="form-control btn btn-primary rounded submit px-3">𝐋𝐨𝐠𝐢𝐧</button>
							            </div>
						            
						            </form>
						        </div>
			          <!-- <p class="text-center my-3">𝐍𝐨𝐭 𝐚 𝐦𝐞𝐦𝐛𝐞𝐫? <a data-toggle="tab" href="#signup">𝐒𝐢𝐠𝐧 𝐔𝐩</a></p> -->
			                </div>
			            </div>
		            </div>
				</div>
			</div>
		</div>
	</section>










<script src="asset/js/jquery-3.6.0.min.js"  type="text/javascript"></script>
<script src="asset/js/bootstrap.min.js"  type="text/javascript" ></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
				integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
				crossorigin="anonymous"></script>






<script type="text/javascript">
 $(document).ready(function(){


 $('#user_login').show();
 $('#admin_login').hide();
 $('#btn_user_login').css("background-color","yellow");
 $('#user_login').css("border","2px solid whitesmoke");
 $('#user_login').css("border-radius","15px");	


   	$('#btn_user_login').click(function(){

       var u=1;

		if(u==1){
		     $('#user_login').show();
             $('#admin_login').hide();
 	
			$('#user_login').css("border","2px solid whitesmoke");
			$('#user_login').css("border-radius","15px");
	   		$('#btn_user_login').css("background-color","yellow");
	   		$('#btn_admin_login').css("background-color","");


	   	}
	   	else{
		   	$('#user_login').css("border","");
	   		$('#user_login').css("border-radius","");
			$('#btn_user_login').css("background-color","");
	   	}
			

   	})

	$('#btn_admin_login').click(function(){

		var u=0;
		if(u==0){
             $('#admin_login').show();
 	         $('#user_login').hide();
			$('#admin_login').css("border","2px solid whitesmoke");
			$('#admin_login').css("border-radius","15px");
	   		$('#btn_admin_login').css("background-color","yellow");
			$('#btn_user_login').css("background-color","");
	 	}else{
	 		$('#admin_login').css("border","");
	   		$('#admin_login').css("border-radius","");
			$('#btn_admin_login').css("background-color","");
	 	}

   			

   	})
		
		      

  });
     	





</script>



	</body>
</html>

