<?php
  $con=mysql_connect('localhost','root','');
  mysql_select_db('moments',$con);
  $res=mysql_query("select * from post_tbl where flag=0",$con);
  $cnt=mysql_num_rows($res);
?>
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>NT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Moments</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $cnt?></span>
            </a>
            <ul class="dropdown-menu" style="width: 405px;">
              <li class="header">You have <?php echo $cnt?> Posts for approval request!</li>
              
                <?php 
                  while($row=mysql_fetch_assoc($res))
                  {
                    echo '<li class="header">';
                    echo '<a href="approve.php?id='.$row["post_id"].'">'.$row["fk_email_id"].' wants to approve '.$row["post_title"].'</a>';
                    echo '</li>';
                  }
                ?>
              </li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          
          <?php
  include '../database.php';
  $obj=new database();
  $res=$obj->peruserdisplay($_SESSION["email_id"]);
  while($row=mysql_fetch_assoc($res))
  {
    $name=$row["name"];
    $photo=$row["photo"];
  }
?>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $photo;?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $photo;?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $name?> - Web Developer
                  <small>Member since Nov. 2014</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="../index.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>