<?php
    include '../database.php';
    $obj5=new database();
    $email=$_SESSION["email_id"];
    $res5=$obj5->peruserdisplay($email);
    while($row=mysql_fetch_assoc($res5))
    {
        $photo=$row["photo"];
        $name=$row["name"];
    }
?>
   <!-- Header Section Start -->
    <header class="site-header">
        <nav class="navbar navbar-default navbar-intimate role="
        data-offset-top="50" data-spy="affix">
            <div class="container">
                <div class="navbar-header">
                    <!-- Start Toggle Nav For Mobile -->
                     <button class="navbar-toggle" data-target="#navigation"
                    data-toggle="collapse" type="button"><span class=
                    "sr-only">Toggle navigation</span> <span class=
                    "icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                    <div class="logo">
                        <a class="navbar-brand" href="index.html"><img src="../img/logo2.png" style="height: 60px;width: 141px;margin-top: -5px;"/></a>
                    </div>
                </div><!-- Stat Search -->
                <div class="side">
                    <a class="show-search"><i class="ico-search"></i></a>
                </div><!-- Form for navbar search area -->
                <form class="full-search">
                    <div class="container">
                        <div class="row">
                            <input class="form-control" placeholder="Search"
                            type="text"> <a class="close-search"><span class=
                            "ico-times"></span></a>
                        </div>
                    </div>
                </form><!-- Search form ends -->
                <!-- Navigation Start -->
                <div class="navbar-collapse collapse" id="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown dropdown-toggle">
                            <a href="home.php">Home</a>
                           
                        </li>
                        <li class="dropdown dropdown-toggle">
                            <a href="myprofile.php">Profile</a>
                            
                        </li>
                        <li class="dropdown dropdown-toggle">
                            <a href="mypost.php">My Posts</a>
                           
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                        <li>
                            <a href="aboutus1.php">About us</a>
                        </li>
                           <li class="dropdown dropdown-toggle">
                            <a data-toggle="dropdown" href="#"><img style="height:30px;width:30px;border-radius:100%;" src="<?php echo $photo;?>"></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="myprofile.php"><?php echo $name;?></a>
                                </li>
                                <li>
                                    <a href="../index.php">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- Navigation End -->
            </div>
        </nav><!-- Mobile Menu Start -->
        <ul class="wpb-mobile-menu">
            <li class="active">
                <a href="home.php">Home</a>
            </li>
            <li>
                <a href="profile.php">Profile</a>
                
            </li>
            <li>
                <a href="mypost.php"> My posts</a>
             
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
            <li>
                <a href="aboutus.php">About us</a>
            </li>
            <li>
                            <a href="../index.php">Log Out</a>
                        </li>
        </ul><!-- Mobile Menu End -->
    </header><!-- Header Section End -->
    <!-- Hero Area Start -->
   