<?php
	session_start();
	?>

<!DOCTYPE html>
<html>
<head>
		<title>Moments</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- Page Description and Author -->
    <meta content="Intimate - Bootstrap HTML5 Blog Template" name=
    "description">
    <meta content="GrayGrids" name="author"><!-- Bootstrap Css -->
    <link href="../css/bootstrap.min.css" madia="screen" rel="stylesheet" type=
    "text/css"><!-- Font Icon Css -->
    <link href="../fonts/font-awesome.min.css" madia="screen" rel="stylesheet"
    type="text/css">
    <link href="../fonts/intimate-fonts.css" madia="screen" rel="stylesheet" type=
    "text/css"><!-- Main Css Styles -->
    <link href="../css/main.css" madia="screen" rel="stylesheet" type="text/css">
    <!-- Owl Carousel -->
    <link href="../extras/owl/owl.carousel.css" media="screen" rel="stylesheet"
    type="text/css">
    <link href="../extras/owl/owl.theme.css" media="screen" rel="stylesheet" type=
    "text/css">
    <link href="../extras/animate.css" media="screen" rel="stylesheet" type=
    "text/css">
    <link href="../extras/lightbox.css" media="screen" rel="stylesheet" type=
    "text/css">
    <link href="../extras/slicknav.css" media="screen" rel="stylesheet" type=
    "text/css"><!-- Responsive Css Styles -->
    <link href="../css/responsive.css" madia="screen" rel="stylesheet" type=
    "text/css">
</head>
<body>
<?php include 'header.php';?>
</br></br>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-2">
 <?php 
                   // include '../database.php';
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
            <div class="entry-widget">
                            <div class="widget-profile">
                                <div class="image" ></div>
                                <div class="portfolio text-center col-md-offset-1 col-sm-offset-3" style="margin-top: -36px;">
                                
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
                                 <form action="x1.php?photo=<?php echo $photo; ?>" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                     <span class="input-group-addon" id="basic-addon1">Email-Id</span>
                                       <input type="text" readonly name="txtemail1" value="<?php echo $_SESSION["email_id"];?>" class="form-control" placeholder="Enter Email-Id" aria-describedby="basic-addon1">
                                           
                                 </div>    
                                         </br>
                                            
                                <div class="input-group">
                                            <span class="input-group-addon" id="Span1">Name</span>
                                             <input type="text" name="txtname" value="<?php echo $name;?>" class="form-control" placeholder="Enter Name" aria-describedby="basic-addon1">
                                 </div>
                                        </br>
                                            
                                <div class="input-group">
                                            <span class="input-group-addon" id="Span1">Mobile Number</span>
                                             <input type="text" name="txtmobno" value="<?php echo $mobile;?>" class="form-control" placeholder="Enter Mobile Number" aria-describedby="basic-addon1">
                                </div>
                                        </br>
                                       
                                <div class="input-group" style="text-align: left;">

                                                <tr>
                                                    <span class="input-group-addon" id="Span1">Gender</span><td>&nbsp;</td>
                                                    <td><input type="radio" name="rb" value="male" <?php if($gender=="male") {echo 'checked';} ?>>Male<td>&nbsp;&nbsp;</td>
                                                    <input type="radio" name="rb" value="female" <?php if($gender=="female") {echo 'checked';} ?>>Female</td>
                                                </tr>
                                </div>
                                </br>

                                 <div class="input-group">
                                            <span class="input-group-addon" id="Span1">Photo</span>
                                             <img style="height: 90px; width: 90px;" src="<?php echo $photo; ?>"/>
                                             <input type="file" name="fileToUpload" value="<?php echo $photo;?>" class="form-control" aria-describedby="basic-addon1">


                                </div>
                                        </br>
                                       
                                <center><div>
                                                <button type="submit" name="btnsub" class="btn btn-danger">UPDATE</button>
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

        



                            
                            
                        
<?php include 'scripts.php';?>   

<?php include 'footer.php';?> 
  
</body>
</html>