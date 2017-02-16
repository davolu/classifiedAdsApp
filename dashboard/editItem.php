<?php session_start(); ?>

<?php include("../dbConfig.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $website_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>

<?php
include("nav.php");
?>

  
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h4 class="page-header">Edit Item</h4>

    

     
          <div class="table-responsive">
		   
		   <?php
		   
		   $idy = $_GET['idy'];
		   $cat = $_GET['cat'];
		   
		   
		   $slt = mysqli_query($con,"SELECT * FROM item WHERE id='$idy' ");
		   
		     while($row = mysqli_fetch_array($slt))
			 {
		   ?>
		 	
			<div class="col-xs-4 ">
		      	 <br/>
				 <br/>
				 
			  
			  <div class=" ">
			  <p class="text-muted">Item Image 1 </p>
    <img src="<?php echo htmlentities($row['image1']); ?>" id="pre1"   class="img-responsive "  title="" style="cursor:pointer; width:200px; height:100px;"/>
     </div>
     
	 
	
 	 <input type="file" id="file1" onchange="uploadAsBase64(this,1);   "   />		  <br/> 

	 <input type="text"  id="bs1" style="display:none;" value="<?php echo htmlentities($row['image1']); ?>"  />

										  
	 <div class="col-md-12 text-center">
	 <progress id="progressBar1" value="0" max="100" style="width:100px; visibility:hidden"></progress>
	 <h6 id="status1" style="display:none;"></h6>
	 <p id="loaded_n_total1" style="display:none;"></p>
	 </div>  
  
			  
			 
			</div>
			
			
		 	
			<div class="col-xs-4 ">
		      	 <br/>
				 <br/>
				 
			  
			  <div class=" ">
			  <p class="text-muted">Item Image 2 </p>
    <img src="<?php echo htmlentities($row['image2']); ?>" id="pre2"   class="img-responsive "  title="" style="cursor:pointer; width:200px; height:100px;"/>
     </div>
     
	 
	
 	 <input type="file" id="file2" onchange="uploadAsBase64(this,2);   "   />		  <br/> 

	 <input type="text"  id="bs2" style="display:none;" value="<?php echo htmlentities($row['image2']); ?>"   />

										  
	 <div class="col-md-12 text-center">
	 <progress id="progressBar2" value="0" max="100" style="width:100px; visibility:hidden"></progress>
	 <h6 id="status2" style="display:none;"></h6>
	 <p id="loaded_n_total2" style="display:none;"></p>
	 </div>  
  
			  
			 
			</div>
			
		 	
			<div class="col-xs-4 ">
		      	 <br/>
				 <br/>
				 
			  
			  <div class=" ">
			  <p class="text-muted">Item Image 3 </p>
    <img src="<?php echo htmlentities($row['image3']); ?>" id="pre3"   class="img-responsive "  title="" style="cursor:pointer; width:200px; height:100px;"/>
     </div>
     
	 
	
 	 <input type="file" id="file3" onchange="uploadAsBase64(this,3);   "   />		  <br/> 

	 <input type="text"  id="bs3" style="display:none;"  value="<?php echo htmlentities($row['image3']); ?>"  />

										  
	 <div class="col-md-12 text-center">
	 <progress id="progressBar3" value="0" max="100" style="width:100px; visibility:hidden"></progress>
	 <h6 id="status3" style="display:none;"></h6>
	 <p id="loaded_n_total3" style="display:none;"></p>
	 </div>  
  
			  
			 
			</div>
			
            
			 <br/>
			 <br/>
			 <br/>
			 <br/>
			 <div class="col-xs-6">
	<label>	Item Name</label>		<br/>		
	<input type="text" class="input-lg form-control"  id="item_name" value="<?php echo htmlentities($row['item_name']); ?>" />
	<br/>
	<br/>
			</div>
		 
			
			<div class="col-xs-6">
	<label>	Item Price</label>		<br/>		
	<input type="number" class="input-lg form-control"  id="item_price" value="<?php echo htmlentities($row['item_price']); ?>" />
	<br/>
	<br/>
			</div>
			
			
			 <br/>
			 <br/>
			 <div class="col-xs-6">
	<label>	Category</label>		<br/>		
	<select class="input-lg form-control"  id="item_category" onchange="getSubs()">
	
	
	<option>Select Category</option>	
	
	<?php

		$sel = mysqli_query($con,"SELECT * FROM category");
		
		while($rq = mysqli_fetch_array($sel))
		{
			if($rq['parent'] !=""){continue;}
			
			
			if($rq['name'] == $row['main_category'])
			{
			?>
			
			<option selected>  <?php  echo $rq['name']; ?></option>
			<?php
			}
			else
			{
				?>
				
			<option>  <?php  echo $rq['name']; ?></option>				
				<?php
				
				
			}
		}
	
	?>

	</select>
 
	<br/>
	<br/>
			</div>
		 
			
			<div class="col-xs-6">
	<label>	Sub Category</label>		<br/>		
	<select class="input-lg form-control"  id="item_sub_category"  >
	 
	 
	 	<?php

		$selx = mysqli_query($con,"SELECT * FROM category");
		
		while($rqx = mysqli_fetch_array($selx))
		{
			if($rqx['parent'] ==""){continue;}
			
			
			if($rqx['name'] == $row['category'])
			{
			?>
			
			<option selected>  <?php  echo $rqx['name']; ?></option>
			<?php
			}
			else
			{
				?>
				
			<option>  <?php  echo $rqx['name']; ?></option>				
				<?php
				
				
			}
		}
	
	?>
	
	
	</select>
	<br/>
	<br/>
			</div>
			
			
			<div class="clearfix"></div>
			<div class="col-xs-12">			
	<label>	Item Details</label>		<br/>
  <textarea  class="input-lg form-control"  id="item_details" rows="10" cols="50"><?php echo htmlentities($row['item_details']); ?> </textarea>
  <br/>
  <br/>
				</div>
				
				<div class="col-xs-4"></div>
				<div class="col-xs-4">	
				
				<button class="btn btn-lg btn-success" onclick="process()">SUBMIT</button>
				</div>
				<div class="col-xs-4"></div>			 
			
			
				  <?php
		  
			 }
		  ?>
		  
		  
          </div>
		  
		  
	 
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script> 
     <script src="uploaderr_script.js"></script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
	
	
	<script>
	
	function process()
	{
		  
		  var item_name = $("#item_name").val();
		  var item_price = $("#item_price").val();
		  var item_details = $("#item_details").val();
		  var item_sub_category = $("#item_sub_category").val();
		  var item_category = $("#item_category").val();
		  var image1 = $("#bs1").val();
		  var image2 = $("#bs2").val();
		  var image3 = $("#bs3").val();
		  
		  
		  $.ajax({
			  
			 url:"processor.php",
			 type:"post",
			 
			 data:{
				 status:"editItem",
				 item_name:item_name,
				 item_price:item_price,
				 item_details:item_details,
				  item_sub_category:item_sub_category,
				 item_category:item_category,				 
				  item_id:"<?php echo $_GET['idy']; ?>",
				  
				 image1:image1,
				 image2:image2,
				 image3:image3
				 
			 },
			 
			 success: function(r)
			 {
				 
				//alert(r);
				
				window.location="index.php";
				 
			 }
			  
			  
		  });
		
		
		
	}
	
	function getSubs()
	{
		  
		  var item_category = $("#item_category").val();
 
		  
		  
		  $.ajax({
			  
			 url:"processor.php",
			 type:"post",
			 
			 data:{
				 status:"getSubs",
				 item_category:item_category
			 
				 
			 },
			 
			 success: function(r)
			 {
				 
				 //alert(r);
				
				document.getElementById("item_sub_category").innerHTML=r;
				document.getElementById("item_sub_category").removeAttribute("disabled");
				//window.location="index.php";
				 
			 }
			  
			  
		  });
		
		
		
	}
	
	</script>
  </body>
</html>
