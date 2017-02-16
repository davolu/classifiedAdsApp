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

  <?php include("nav.php"); ?>
        
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

    

          <h2>Items</h2>
          <div class="table-responsive">
          
		  
		   <table class="table table-striped">
	 
	 <thead>
	 <tr>
	 
	 <th>
	 S/N
	 </th>
	 
	 <th>
	Item Name
	 </th>
	 
 
	 
	 <th>
	Category
	 </th>
	 
	 
 
	 
	 
	 <th>
	Price
	 </th>
	
	 
	 
	 <th>
	Date Posted
	 </th>
	 
	 <th>
	Time Posted
	 </th>
 
	 
	 
	 <th>
	 Actions
	 </th>
	 
	 </thead>
	  <tbody>
	 <?php
	 
	 if(isset($_SESSION['id']) )
	 {
	 $sid = $_SESSION['id'];
	 
	 $get  = mysqli_query($con,"SELECT * FROM item WHERE c1='$sid' ");
	 
	 $count=0;
	 while($rw = mysqli_fetch_array($get))
	 {
		 
		 $count++;
		 
	 ?>
	 
	 
	 <tr>
	 
	 <th>
	<?php echo $count; ?>
	 </th>
	 
	 <th>
	 <?php echo $rw['item_name']; ?>
	 </th>
 
	 
	 <th>
	 <?php echo $rw['category']; ?>
	 </th>
	 
	 
	 
	 <th>
	 <?php echo $rw['item_price']; ?>
	 </th>
	 
	 
	 <th>
	 <?php echo $rw['date']; ?>
	 </th>
	 
 
 	 
	 <th>
	 <?php echo $rw['time']; ?>
	 </th>
	 
	 
	 <th>
	 <a title="view" target="_blank"  class="btn btn-success btn-sm" href="../single.php?item_id=<?php echo strip_tags($rw['id']);?>" class="btn3 pull-right">View </a>

	<a href="editItem.php?idy=<?php echo $rw['id']; ?>&cat=<?php echo $rw['category'];?>" class="btn btn-primary btn-sm">Edit</a>
	<a class="btn btn-danger btn-sm" onclick="deleter(<?php echo $rw['id']; ?>)">Delete</a>
 
	 </th>
	 
	 </tr>
	 
	 <?php
	 
	 }
	 
	 
	 }
	 ?>
	 
	 </tbody>
	 
	 </table>
	 
	 
	 
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script> 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
