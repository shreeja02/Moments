<?php
	session_start();
$email=$_SESSION["email_id"];
?>

<!DOCTYPE html>
<html>
<head>
		<title>Moments</title>
    <?php include 'links.php';?>
</head>
<body>
<?php include 'header.php';?>
 <section class="text-center" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../img/cover.jpg" alt="..." style="height:400px;">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="../img/cover2.jpg" alt="..." style="height:400px;">
      <div class="carousel-caption">
        ...
      </div>
    </div>
     <div class="item">
      <img src="../img/cover3.jpg" alt="..." style="height:400px;">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                </div>
            </div>
        </div>
    </section><!-- Hero Area End -->
    <br><br>
    
    <div class="container">
    	<div class="row">
        <h1>&nbsp;&nbsp;All Posts</h1>
    		<div class="col-md-8">
    			<?php 
    				//include '../database.php';
    				$obj=new database();
    				$res=$obj->displayposts();
            while($row=mysql_fetch_assoc($res))
            {
              $postid=$row["post_id"];
              $desc=$row["post_desc"];
              $date=$row["date"];
              $time=$row["time"];
              $photo=$row["post_photo"];
              $title=$row["post_title"];
              $id=$row["fk_email_id"];
          ?>
          <article>
                        <!-- Blog item Start -->
                        <div class="blog-item-wrap">
                            <!-- Post Format icon Start -->
                            <div class="post-format">
                                <span><i class="fa fa-camera"></i></span>
                            </div><!-- Post Format icon End -->
                            <h2 class="blog-title"><?php echo $title; ?></h2><!-- Entry Meta Start-->
                            <div class="entry-meta">
                                <span class="meta-part"><i class=
                                "ico-user"></i> <a href="#"><?php echo $id; ?></a></span> <span class=
                                "meta-part"><i class=
                                "ico-calendar-alt-fill"></i><?php echo $date;?></span> 
                            </div><!-- Entry Meta End-->
                            <!-- Feature inner Start -->
                            <div class="feature-inner">
                                <a data-lightbox="roadtrip" href=
                                "img/blog/blog-01.jpg"><img alt="" src=
                                "<?php echo $photo;?>"></a>
                            </div><!-- Feature inner End -->
                            <!-- Post Content Start -->
                            <div class="post-content">
                                <p><?php echo substr($row["post_desc"],0,350); ?></p>
                            </div><!-- Post Content End -->
                            <div class="entry-more">
                                <div class="pull-left">
                                    <a class="btn btn-common" href=
                                    "single.php?id=<?php echo $postid;?>">Read More <i class=
                                    "ico-arrow-right"></i></a>
                                </div>
                                <div class="pull-right">
                                    <?php 
                                $like=new database();
                                $likes=$like->displaylikes($postid);
                                $liked=$like->displaylikesperemail($_SESSION["email_id"],$postid);
                                $cnt1=mysql_num_rows($likes);
                                $email=$_SESSION["email_id"];
                                $like1=new database();
                                $likes1=$like1->joinlikes($postid);
                                $flag=0;
                                while($row=mysql_fetch_assoc($liked))
                                {
                                    if($row["fk_email_id"]==$email)
                                    {
                                      ?><!--<a href="likeinsaction.php?id="><img src="../img/liked.jpg" style="height:17px;width:22px;"/></a>--><?php
                                      $flag=1;
                                      
                                    }
                                    
                                    else
                                    {
                                      ?><!--<a href="likeinsaction.php?id="><img src="../img/like.jpg" style="height:17px;width:22px;"/></a>--><?php
                                      $flag=0;
                                    }
                                    
                                }
                                
                                if($flag==1)
                                {
                                   ?><a href="likedelaction.php?id=<?php echo $postid?>"><img src="../img/liked.jpg" style="height:17px;width:22px;"/></a><?php
                                }
                                else
                                {
                                  ?><a href="likeinsaction1.php?id=<?php echo $postid?>"><img src="../img/like.jpg" style="height:17px;width:22px;"/></a><?php
                                 
                                }
                                ?>
                                <a href="#" style="color:#ec483b" data-toggle="modal" data-target="#myModal"><?php echo $cnt1;?></a>
                                 &nbsp;&nbsp; 
                                  <?php
                                      $comment=new database();
                                      $comments=$comment->displaycomments($postid);
                                      $commented=$comment->displaycommentsperemail($_SESSION["email_id"]);
                                      $cnt2=mysql_num_rows($comments);
                                      $email=$_SESSION["email_id"];
                                      $comment1=new database();
                                      $com=$comment1->joincomments($postid);
                                ?>
                                
                                 <span class=
                                "meta-part"><i class="ico-comments" style="color:#ec483b;"></i>
                               <a href="#" style="color:#ec483b" data-toggle="modal" data-target="#myModal1"><?php echo $cnt2;?></a>
                                </div>
                            </div>
                        </div><!-- Blog item End -->
                    </article><!-- Blog Article End-->
                    <?php
                  }
                  ?>
    		</div>
    		<div class="col-md-4">
    			<?php include 'sidebar.php';?>
    			
    		</div>
    	</div>
    </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Likes</h4>
      </div>
      <div class="modal-body">
          <table class="table">
            <?php
              while($row=mysql_fetch_assoc($likes1))
              {

                echo '<tr><td>';
                ?><img style="height:50px;width:50px;" src="<?php echo $row['photo'];?>"><?php
                echo '</td>';
                echo '<td>';
                echo $row["name"];
                echo '</td></tr>';
              }
            ?>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Okay</button>
      
      </div>
    </div>
  </div>
</div>




<!-- comments -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comments</h4>
      </div>
      <div class="modal-body">
          <table class="table">
            <?php
            if($cnt2==0)
            {
              echo "No Comments On This Post!";
            }
            else
            {
              while($row=mysql_fetch_assoc($com))
              {
                echo '<tr><td>';
                ?><img style="height:50px;width:50px;" src="<?php echo $row['photo'];?>"><?php
                echo '</td>';
                echo '<td>';
                echo $row["name"];
                  echo '<td>';
                echo $row["comment_desc"];
                echo '</td></tr>';
              }
            }
            ?>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Okay</button>
      
      </div>
    </div>
  </div>
</div>




<?php include 'footer.php';?>	
<?php include 'scripts.php';?>
</body>
</html>