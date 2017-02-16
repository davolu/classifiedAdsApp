<?php

error_reporting(0);

$target_dir = "../images/uploads/";


$target_file = $target_dir . basename($_FILES["program_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["program_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["program_image"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
	    
										$temp = explode(".", $_FILES["program_image"]["name"]);
										$newfilename = $target_file."_".round(microtime(true)) . '.' . end($temp);
										
    if (move_uploaded_file($_FILES["program_image"]["tmp_name"], $newfilename)) {
      

	 // echo "The file ". $newfilename. " has been uploaded.";
		  echo" ". basename($_FILES["program_image"]["name"])."<[]>".$newfilename;
		
		
    } else {
     

	 echo "Sorry, there was an error uploading your file.";


	 }
}
 

?>
