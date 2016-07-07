<?php
    session_start();
    $email=$_SESSION["email_id"];
    $postid=$_REQUEST["id"];
?>
<!DOCTYPE html>
<html>
<head>
		<title>Moments</title>
        <?php include 'links.php';?>

        
</head>
<body>
<?php 
include 'header.php';
//include '../database.php';
$obj6=new database();
$res6=$obj6->catdisplay();
?>
<br><br>

<div class="container">
    <div class="row">
   
   
            <br>
        <div class="col-md-8">
            <?php 
                
                $obj=new database();
                $res=$obj->singlepost($postid);
                $cnt=mysql_num_rows($res);
                while($row=mysql_fetch_assoc($res))
                {
                    $postid1=$row["post_id"];
                    //$_SESSION["postid"]=$postid;
                    $desc=$row["post_desc"];
                    $date=$row["date"];
                    $time=$row["time"];
                    $photo=$row["post_photo"];
                    $title=$row["post_title"];
                    $id=$row["fk_email_id"];
                  } 
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
                                <p><?php echo $desc; ?></p>
                            </div><!-- Post Content End -->
                            <div class="entry-more">
                               
                                
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
                                  ?><a href="likeinsaction2.php?id=<?php echo $postid?>"><img src="../img/like.jpg" style="height:17px;width:22px;"/></a><?php
                                 
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
                               <a href="#" style="color:#ec483b" data-toggle="modal" data-target="#myModal1"><?php echo $cnt2;?></a></span>
                                </div>
                                
                            </div>
                        </div><!-- Blog item End -->
                        </article>
                         <article>
                         <h2>Comments</h2>
                        <!-- Start Comment Area -->
                        <div id="comments">
                            <ol class="comments-list">
                            <?php
                                      $comment1=new database();
                                      $comments1=$comment->joincomments($postid);
                                    
                              while($row=mysql_fetch_assoc($comments1))
                              {
                                ?>
                                <li>
                                    <div class="comment-box clearfix">
                                        <div class="avatar">
                                            <a href="#"><img alt="" src=
                                            "<?php echo $row["photo"]; ?>"></a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h4 class="comment-by"><a href=
                                                "#"><?php echo $row["name"];?></a></h4>
                                            </div>
                                            <p><?php echo $row["comment_desc"];?></p><a class="reply-link"
                                            href="#">Reply</a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                              }
                              ?>
                            </ol>
                        </div><!-- End Comment Area -->
                    </article><!-- Blog Article End -->
                      <article>
                        <!-- Start Respond Form -->
                        <div id="respond">
                            <h2 class="respond-title">Add Comment</h2>
                            <form action="addcomment.php?id=<?php echo $postid;?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="comment" name="comment"
                                        placeholder="Comment">
                                         <button class="btn btn-common btn-more"
                                        id="submit" name="btnsubmit" type="submit" style="background-color:white;"><i class=
                                        "fa fa-check"></i> Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End Respond Form -->
                    </article><!-- Blog Article End -->
              
                    
        </div>
        <div class="col-md-4">
            <?php include 'sidebar.php'; ?>
        </div>
        
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-top: 100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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



</div>
<?php include 'scripts.php';?>
<?php include 'footer.php';?>

</body>
</html>