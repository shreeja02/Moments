<?php
	session_start();
	?>

<!DOCTYPE html>
<html>
<head>
		<title>Moments</title>
       <?php include 'links.php'; ?>
    <script type="text/javascript">
        function check()
        {
            var x=document.chng.txtpass1.value;
            var y=document.chng.txtpass2.value;
            if(x!=y)
            {
                alert("Your Password Doesn't Match!")
                document.chng.txtpass2.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<?php include 'header.php';?>
</br></br>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
 <?php 
                    //include '../database.php';
                    $obj=new database();
                    $res=$obj->peruserdisplay($_SESSION["email_id"]);
                    while($row=mysql_fetch_assoc($res))
                    {
                        $name=$row["name"];
                        $mobile=$row["mobileno"];
                        $gender=$row["gender"];
                        $photo=$row["photo"];
                    }
?>

<?php
if(isset($_POST["btnsub"]))
{
    $email=$_SESSION["email_id"];
    $pass=$_POST["txtpasso"];
    $pass1=$_POST["txtpass1"];
    $pass2=$_POST["txtpass2"];
    $obj2=new database();
    $res2=$obj2->login($email,$pass);
    $count=mysql_num_rows($res2);
    if($count==1)
    {
            if($pass1==$pass2)
            {
                   $obj3=new database();
                   $res3=$obj3->updateuserbypass($email,$pass2);
                   
                   if($res3==1)
                   {
                    echo "Password has been changed successfully!";
                    header('location:myprofile.php');
                }
            }
            else
            {
                alert("Your passwords does not match!");
            }
            
    }
    
}
?>
            <div class="entry-widget">
                            <div class="widget-profile">
                                <div class="image"></div>
                                <div class="portfolio text-center col-md-offset-1 col-sm-offset-3">
                                
                                <img alt="" src="<?php echo $photo; ?>">
                                
                                </div>
                        <div class="info">
                                    <h3 class="name"><?php echo $name;?></h3>
                                
                                     <?php 
                                         //include '../database.php';
                                         $obj1=new database();
                                          $res=$obj1->peruserdisplay($_SESSION["email_id"]);
                                         while($row=mysql_fetch_assoc($res))
                                             {
                                                       $name=$row["name"];
                                                     $mobile=$row["mobileno"];
                                                    $gender=$row["gender"];
                                                     $photo=$row["photo"];
                                            }
                                 ?>
                            <div class="panel-body">
                                 <form action="changepassword.php" method="post" name="chng">
                                <div class="input-group">
                                     <span class="input-group-addon"  id="basic-addon1">Old Password:</span>
                                       <input type="password"  name="txtpasso" required class="form-control" placeholder="Enter Old Password" aria-describedby="basic-addon1">
                                           
                                 </div>    
                                         </br>
                                            
                                <div class="input-group">
                                            <span class="input-group-addon" id="Span1">New Password:</span>
                                             <input type="password" name="txtpass1"  class="form-control" placeholder="Enter New Password" aria-describedby="basic-addon1">
                                 </div>
                                        </br>
                                            
                                <div class="input-group">
                                            <span class="input-group-addon" id="Span1">Reenter New Password</span>
                                             <input type="password" name="txtpass2" class="form-control" onblur="return check();" placeholder="Re-Enter New Password" aria-describedby="basic-addon1">
                                </div>
                                        </br>
                                       
                                       
                                <center>
                                <p name="a"><?php 
                                if(isset($_POST["btnsub"]))
                                {
                                    if($count!=1)
                                    {
                                        echo "Please enter correct old password";
                                    }
                                }
                                ?></p>
                                <div>
                                                <button type="submit" name="btnsub" class="btn btn-danger">CHANGE</button>
                                        </div>
                                </center>
                                 </form>
                            </div>    
                        </div>
                        </div>
</div>
</div>
</div>
</div>
</div>
</div>

        <?php include 'footer.php';?> 
  
</body>
</html>