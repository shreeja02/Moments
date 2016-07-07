<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome Admin!</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-red.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
    <script type="text/javascript">
      function delconfirm()
      {
        return confirm("Are you sure you wanna delete this record?");

      }
       $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
    <?php include 'sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <?php
  	//include '../database.php';
  	$obj=new database();
    $email=$_SESSION["email_id"];
    $res0=$obj->peruserdisplay($email);
  	$res=$obj->displayposts();
  	$res1=$obj->userdisplay();
  	$res2=$obj->catdisplay();
  	$res3=$obj->commentdisplay();
  	$today_post=$obj->todayposts();
  	$count1=mysql_num_rows($res1);
  	$count=mysql_num_rows($res);
  	$count2=mysql_num_rows($res2);
  	$count3=mysql_num_rows($res3);
  	$cnttoday=mysql_num_rows($today_post);
  	while($row=mysql_fetch_assoc($res0))
  	{
        $name=$row["name"];
        $photo1=$row["photo"];
  	}
  ?>
<div class="content-wrapper">
<br><br><br>
<div class="container">
      
      <?php
        $id=$_REQUEST["id"];
        $post=new database();
        $postres=$post->singlepost($id);
        $comments=new database();
        $cmt=$comments->joincomments($id);

        $countcmt=mysql_num_rows($cmt);
      ?>
      <div class="row">
      
          <div class="col-md-8 col-md-offset-2">
        <?php
        while($row=mysql_fetch_assoc($postres))
        {
          $photo=$row["photo"];
          $name=$row["name"];
          $postid=$row["post_id"];
          $postphoto=$row["post_photo"];
          $desc=$row["post_desc"];
          $posttitle=$row["post_title"];
           $lik=$comments->joinlikes($postid);
        $likes=mysql_num_rows($lik);
        ?>
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="<?php echo $photo;?>" alt="User Image">
                <span class="username"><a href="#"><?php echo $name;?></a></span>
                <span class="description">Shared Today</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <p><?php echo $posttitle?></p>
              <img class="img-responsive pad" src="<?php echo $postphoto; ?>" alt="Photo">

              <p><?php echo $desc?></p>
              <a href="likeinsaction1.php?id=<?php echo $postid;?>">
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button></a>
              <span class="pull-right text-muted"><?php echo $likes;?> - likes,<?php echo $countcmt?> - comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
            <?php
            while($row1=mysql_fetch_assoc($cmt))
              {?>
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="<?php echo $row1["photo"];?>" alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $row1["name"];?> 
                        <span class="text-muted pull-right"><?php echo $row1["date"];?></span>
                      </span><!-- /.username -->
                  <?php echo $row1["comment_desc"];?>
                </div>
                <!-- /.comment-text -->
              </div>
              <?php
             }
            ?>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="addcomment.php?id=<?php echo $postid; ?>" method="post">
                <img class="img-responsive img-circle img-sm" src="<?php echo $photo1;?>" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Type and press enter to comment" name="comment">
                  
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <?php
          }?>
          </div>
      </div>
</div>
</div>
   <?php include 'footer.php'; ?>
 


 <?php include 'scripts.php';?>
</div>
</body>
</html>