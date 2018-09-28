<?php  include "head.php"; ?>
<?php
include("connection.php");
require_once('authorise.php');



date_default_timezone_set('Europe/London');
$now  = new DateTime;



//https://www.w3schools.com/php/php_file_upload.asp - to upload image
//Remember to set file_uploads = On 
//Also need to create uploads folder
$target_dir = "uploads/";
$target_file = $target_dir . $now->format( 'dmYHis' ). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
	echo "Sorry, file already exists. <a href=\"posts_page.php\">Go back</a>";
    $uploadOk = 0;

	}
    
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. <a href=\"posts_page.php\">Go back</a>";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <a href=\"posts_page.php\">Go back</a>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$title = $_POST['title'];
$title = mysqli_real_escape_string($conn, $title); //Escape the string value 
$description = $_POST['description'];
$description = mysqli_real_escape_string($conn, $description); //Escape the string value 


$authorid = $_SESSION['userid'];
$createdtime = date("Y-m-d H:i:s");

echo $createdtime;

//Then add the rest of the data to the database
if ($uploadOk == 1 && $target_file != "uploads/"){
	
    $query = "INSERT INTO `posts` (`title`, `description`, `authorid`, `createdtime`, `image_link`) 
					VALUES ('$title', '$description', '$authorid', '$createdtime', '$target_file');";
} else{
    $query = "INSERT INTO `posts` (`title`, `description`, `authorid`, `createdtime`, `image_link`) 
					VALUES ('$title', '$description', '$authorid', '$createdtime', 'NULL');";
};


$result = mysqli_query($conn, $query);



mysqli_close($conn);


header("Location: posts_page.php");

?>


<?php  include "footer.php"; ?>