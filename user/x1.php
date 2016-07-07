
<?php


						$id=$_POST["txtemail1"];
                       	//echo $id;
						$name=$_POST["txtname"];
						//echo $name;
						$mob=$_POST["txtmobno"];
						$gen=$_POST["rb"];
						$photo=$_REQUEST["photo"];

							if($_FILES["fileToUpload"]["name"]!="")
							{
								$photo="../images/".basename($_FILES["fileToUpload"]["name"]);

								move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$photo);
								
							}	
					include '../database.php';
                    $obj2=new database();
                    $res2=$obj2->updateuser($id,$name,$mob,$gen,$photo);
                	if($res2==1)
						{
							header('location:myprofile.php');
						}
					else
						{
							echo "Not Updated";
						}
					
?>	

     
	
