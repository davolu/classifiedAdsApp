<?php

session_start();
include("dbConfig.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $website_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<!-- top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
    	 <?php 
	 include("header.php");
	 ?>
	 
	   
       <div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">New Customers</h4>
					<h5 class="sub_title">Register Account</h5>
					<p>
					Join the community to start sell your items with free
					ads. Sell fast
					Join the community to start sell your items with free
					ads. Sell fast
					Join the community to start sell your items with free
					ads. Sell fast
					Join the community to start sell your items with free
					ads. Sell fast
					Join the community to start sell your items with free
					ads. Sell fast
					
					</p>
					<div class="button1">
					   <a href="register.html"><input type="submit" name="Submit" value="Continue"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					 <div class="comments-area">
					 
					 

 
	  <?php
	     if(isset($_POST['submit']))
		 {
		      
			  $username  =  mysqli_real_escape_string($con,$_POST['email_address']);
			  $password = mysqli_real_escape_string($con,$_POST['password']);
			  
			  //Test the login details...
			  
			  $msql = mysqli_query($con,"SELECT * FROM c1");
			             
						   
						   while($rq = mysqli_fetch_array($msql))
						        {
								    
								    if($rq['email'] === $username && $rq['password'] === $password)
									   {
									       
										   $_SESSION['id'] = $rq['id'];
										   $_SESSION['username'] = $rq['email'];
										    $_SESSION['password'] = $rq['password'];
											$_SESSION['timeout'] = time();
											 
											 
											 
											 header("Location:user/index.php");
											?>
											<script>
											
											//alert("Hello!!");
											 window.location ="dashboard/index.php";
											</script>
											
											<?php
									   }
								
								else
								{
								?>
								
								<script>
                  				var theElem = document.getElementById("login_error_report");
								theElem.innerHTML="Wrong Username or Password";
								</script>
								
								<?php
								// echo "Wrong Login Details";
								 
								}
								
								}
			  
		 
		 }
		 
	  
	  
	  ?>
	  
	  
	  <p style="color:red" id="login_error_report"></p>
						<form action="login.php" method="post">
							<p>
								<label>Email Address</label>
								<span>*</span>
								<input type="text" name="email_address" value="">
							</p>
							<p>
								<label>Password</label>
								<span>*</span>
								<input type="password" name="password" value="">
							</p>
							 <p id="login-form-remember">
								<label><a href="#">Forget Your Password ? </a></label>
							 </p>
							 <p>
								<input type="submit" name="submit" value="Login">
							</p>
						</form>
						
						
					</div>
			      </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
         	 <?php 
	 include("footer.php");
	 ?>
	 
	   
       <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>