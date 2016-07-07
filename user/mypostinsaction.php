    <?php
    session_start();
    $posttitle=$_POST["txttitle"];
    $postdesc=$_POST["editor1"];
    $catid=$_POST["txtcat"];
    $photo=$_POST["fileToUpload"];	
    $fkemail=$_SESSION["email_id"];
    $date=date("dd/mm/yyyy");
    $time=time();
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists

// Check file size
/*if ($_FILES["txtphoto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        /*include '../database.php';
		$obj=new database();
		$res=$obj->postsinsert($posttitle,$catid,$postdesc,$fkemail,$date,$time,$target_file,0);*/
		$con=mysql_connect('localhost','root','');
		mysql_select_db('moments',$con);
		mysql_query("insert into post_tbl values(null,'$posttitle','$catid','$postdesc','$fkemail','$date','$time','$target_file',0)",$con);
	header('location:mypost.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
    