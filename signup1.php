
<?php
	session_start();
?>
<?php
	
	
	
		 if($_POST["captcha_code"]==$_SESSION["captcha_code"])
		 {

		 	$email=$_POST["txtemail1"];
			$password=$_POST["txtpass"];
			$cpassword=$_POST["txtpass2"];
		
			$name=$_POST["txtname"];
			$mob=$_POST["txtmobno"];
		
			$gender=$_POST["rb"];
			$type="user";
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


    	if($password==$cpassword)
		{
				/* (file_exists($target_file)) 
				{
    				echo "Sorry, file already exists.";
    				$uploadOk = 0;
				}*/
			// Check file size
			/*if ($_FILES["txtphoto"]["size"] > 500000) {
  			  echo "Sorry, your file is too large.";
   			 $uploadOk = 0;
				}*/
			// Allow certain file formats
			/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
			{
    			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    			$uploadOk = 0;
			}*/
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{
    			echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} 
			else 
			{
    			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    			{
        		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        		$target_dir = "../images/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$con=mysql_connect('localhost','root','');
				mysql_select_db('moments',$con);
				$type="user";
				$res=mysql_query("insert into user_tbl values('$email','$name','$password','$mob','$gender','$target_file','$type')",$con);
				echo $res;
				echo "done";
				$_SESSION["email_id"]=$email;
				header('location:user/home.php');
   				 } 
    			else 
    			{		
        			echo "Sorry, there was an error uploading your file.";
    			}

			}

		}
	
				
		else
		{
					

			echo 'wrong password';
		}	
		
		}
		else
		{



					echo '<script langauge="javascript">;
					alert("plzz enter correct captcha code");
					window.location.href="index1.php";
					</script>';
	}


?>	
