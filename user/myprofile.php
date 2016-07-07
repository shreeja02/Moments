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
<div class="entry-widget">
                            <div class="widget-profile">
                                <div class="image"></div>
                                <div class="portfolio text-center col-md-offset-1 col-sm-offset-3">
                                
                                <img alt="" src=
                                "<?php echo $photo; ?>">
                                
                                </div>
                                <div class="info">
                                    <h3 >
                                    <?php echo $_SESSION["email_id"];?>
                                    <br>
                                    <?php echo $name;?>
                                    <br>
                                    <?php echo $mobile;?>
                                    <br>
                                     <?php echo $gender;?>
                                    <br>
                                    </h3>

                                   
                                 
                                    
 <a href="editprofile.php"><button type="button" class="btn btn-danger" aria-haspopup="true" aria-expanded="false" style="width: 149px;">
    Edit Profile 
  </button></a>
    


    
  <a href="changepassword.php"><button type="button" class="btn btn-danger" aria-haspopup="true" aria-expanded="false" style="width: 149px;">
    Change Password 
  </button></a>
        


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