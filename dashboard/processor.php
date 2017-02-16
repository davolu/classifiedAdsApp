 <?php
 session_start();
 
  function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}


 include("../dbConfig.php");
  
 $status = mysqli_real_escape_string($con,$_POST['status']);
 
				 
	if($status=="newItem")
	{
	    
 
	$item_name  =  mysqli_real_escape_string($con,$_POST['item_name']); 
	$item_price  =  mysqli_real_escape_string($con,$_POST['item_price']); 
	$item_details  =  mysqli_real_escape_string($con,$_POST['item_details']); 
	$item_category  =  mysqli_real_escape_string($con,$_POST['item_sub_category']); 
	$item__main_category  =  mysqli_real_escape_string($con,$_POST['item_category']); 
	$image1 =  mysqli_real_escape_string($con,$_POST['image1']); 
	$image2 =  mysqli_real_escape_string($con,$_POST['image2']); 
	$image3 =  mysqli_real_escape_string($con,$_POST['image3']); 
	$c1 = $_SESSION['id'];
			 
			 $date = date("y/m/d");
			 $time = date("h:i:s a");
			 
			 $url = seoUrl($item_name);
			 
	$ins = mysqli_query($con,"INSERT INTO item(`main_category`,`date`,`time`,`url`,`category`,`c1`,`item_name`,`item_price`,`item_details`,`image1`,`image2`,`image3`) VALUES('$item__main_category','$date','$time','$url','$item_category','$c1','$item_name','$item_price','$item_details','$image1','$image2','$image3') ");
	 
	 
		if(! $ins)
		{
			echo mysqli_error($con);
			
		}
	 
	}
	
				 
	else if($status=="editItem")
	{
	    
 
	$item_name  =  mysqli_real_escape_string($con,$_POST['item_name']); 
	$item_price  =  mysqli_real_escape_string($con,$_POST['item_price']); 
	$item_details  =  mysqli_real_escape_string($con,$_POST['item_details']); 
	$item_category  =  mysqli_real_escape_string($con,$_POST['item_sub_category']); 
	$item__main_category  =  mysqli_real_escape_string($con,$_POST['item_category']); 
	$image1 =  mysqli_real_escape_string($con,$_POST['image1']); 
	$image2 =  mysqli_real_escape_string($con,$_POST['image2']); 
	$image3 =  mysqli_real_escape_string($con,$_POST['image3']); 
	$item_id =  mysqli_real_escape_string($con,$_POST['item_id']); 
	$c1 = $_SESSION['id'];
			 
			 $date = date("y/m/d");
			 $time = date("h:i:s a");
			 
			 $url = seoUrl($item_name);
			 
	$ins = mysqli_query($con,"UPDATE item SET main_category='$item__main_category', date='$date', time='$time',url='$url' , category='$item_category', c1='$c1', item_name='$item_name', item_price='$item_price',item_details='$item_details',image1='$image1', image2='$image2', image3='$image3'  WHERE id='$item_id' ");
	 
	 
		if(! $ins)
		{
			echo mysqli_error($con);
			
		}
	 
	}
	
 
 else if($status=="getSubs")
 {
 
 
	 	$item_category  =  mysqli_real_escape_string($con,$_POST['item_category']); 
		
		$get = mysqli_query($con,"SELECT * FROM category WHERE parent='$item_category' ");
		
		echo "<option>Select sub category</option>";
		while($row = mysqli_fetch_array($get))
		{
			
			echo "<option>".$row['name']."</option>";
			
		}
		
	 
 }
    else
	 {
					
					
	 }
			
			
			
	 
			
			
 
 ?>