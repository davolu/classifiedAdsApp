<?php

include("dbConfig.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $website_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>
<!----details-product-slider--->
		 	
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
	 
       <div class="single">
         <div class="wrap">
		 
		 
     	    <div class="rsidebar span_1_of_left">
				    <section  class="sky-form ">
                 
 <div class="panel-group" id="accordion">
 
 <?php
 $sl = mysqli_query($con,"SELECT * FROM category");
 
 $count=0;
 
 $all_cats = array();
 
 while($rv = mysqli_fetch_array($sl))
 {
	    
	 if($rv['parent'] !=""){continue;}
     
     array_push($all_cats,$rv['name']); 

	 
 }
 ?>
 
 
 <?php
 
 $uq = array_unique($all_cats);
 
 foreach($uq as $v)
 {
	 $count++;
	 
 ?>
 
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo htmlentities($count); ?>">
       <?php echo htmlentities($v); ?>  </a>
      
	  
	  </h4>
    </div>
    <div id="collapse<?php echo htmlentities($count); ?>" class="panel-collapse collapse in ">
      <div class="panel-body">
	  
	  
	   <?php
	 
	 $cnt=0;
	 
 
 
 
	 
  $sl = mysqli_query($con,"SELECT * FROM category WHERE parent='$v' ");
 
 while($rvx = mysqli_fetch_array($sl))
 {
	  $cat = $rvx['name'];
	   $slwy = mysqli_query($con,"SELECT * FROM item WHERE category='$cat' ");
 
	 while($rvxwy = mysqli_fetch_array($slwy))
	 {
		 $cnt++;
		 
		 
	 }
	 
	 
	 ?>
	 
	 	<label class="checkbox"><input type="checkbox" name="checkbox" checked="" disabled><i></i><a href="<?php echo $rvx['name']?>"> <?php echo htmlentities($rvx['name']); ?> (<?php echo htmlentities($cnt); ?>)</a></label>
 <?php
  
  $cnt=0;
 }

 
?> 

	  
	  </div>
    </div>
  </div>
  
  
  <?php
  }
  
  ?>
 
  
  
  
  
</div>



				</section>
		   
		</div>
		
		<?php
		
		$get_item_id = $_GET['item_id'];
		$sl = mysqli_query($con,"SELECT *FROM item WHERE id='$get_item_id' ");
		
		
		while($row = mysqli_fetch_array($sl))
		{
			
		
		
		?>
		
		<div class="cont span_2_of_3">
			  <div class="labout span_1_of_a1">
		 
			</div>
 			<div class="cont1 span_2_of_a1">
				<h1 class="m_3"><?php echo htmlentities($row['item_name']); ?></h1>
				
				<div class="price_single">
							 
							  <span class="actual">N<?php echo htmlentities($row['item_price']); ?> </span> 
							</div>
			 
		 	 <div>
		 
		 
		<div class="col-xs-4">
		<img src="<?php echo str_replace("../","",htmlentities($row['image1'])); ?>" style="width:400px; height:200px;" />
        </div>
		 
		<div class="col-xs-4">
		<img src="<?php echo str_replace("../","",htmlentities($row['image2'])); ?>" style="width:400px; height:200px;" />
        </div>
		<div class="col-xs-4">
		<img src="<?php echo str_replace("../","",htmlentities($row['image3'])); ?>" style="width:400px; height:200px;" />
        </div>
 
 
 <br/>
 <br/>
		 
		 </div>
		 
 
    			<p class="m_desc">
				
	 <?php echo htmlentities($row['item_details']); ?>
				
				</p>
				
		 <div>
		 
		 <a href="seller_profile.php?id=<?php echo htmlentities($row['c1']); ?>" class=" cv"> CONTACT SELLER </a>
 
		 
		 </div>			
		 
		 
		 
	 
    			
                <div class="social_single">	
			 
			    </div>
			</div>
			<div class="clear"></div>
     
     
 
 		
	 <div class="toogle">
  
  
  
   
					
 
	 
	 
	 
	 </div>
     </div>
	 
	 
 
	 
	 <?php
	 }
	 ?>
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