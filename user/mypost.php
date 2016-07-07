<?php
    session_start();
    $email=$_SESSION["email_id"];
?>
<!DOCTYPE html>
<html>
<head>
		<title>Moments</title>
        <?php include 'links.php';?>
<script type="text/javascript">
    function suredel()
    {
      return confirm("Are you sure you wanna delete this post?");
    }
    function req()
    {
      var x=document.form1.editor1.value;
      if(x.length==0)
      {
      alert("This field is required.");
      return flase;
    }
    else
    {
      return true;
    }
    }
</script>
        
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
    <button  class="btn social-link" style="margin-left: 30px;background-color: #ec483b;border-radius: 100%;height: 38px;width: 38px;" data-placement="top" data-toggle="modal" data-target=".bs-example-modal-lg" href="#" title= "Create new blog"><span class="glyphicon glyphicon-plus-sign" style="font-size: 20px;color:white;margin-left:-3px;"></span></button>
<form name="form1" method="post" enctype="multipart/form-data" action="mypostinsaction.php">
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="container-fluid">
       <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <center><h3 class="box-title">Whats On Your Mind?</h3></center>
              

              <!-- tools box -->
              <label>Post Title</label>
              <input type="text" required="" name="txttitle" class="form-control" placeholder="Enter Post Title" onblur="return validate();">
              <!-- /. tools -->
             
                       <!-- /.box-header -->
            <label>Catagory</label>
            <select name="txtcat" class="form-control">
                    <?php
                        
                        while($row=mysql_fetch_assoc($res6))
                        {
                        ?>
                        <option value="<?php echo $row["cat_id"];?>"><?php echo $row["cat_name"];?></option>
            
        
                        <?php
                        }
                    ?>
                     </select>
                       </div>
             </div>

            <label>Post Description</label>
            <div class="box-body pad">
                    <textarea id="editor1" onblur="retun req();" required="" name="editor1" rows="10" cols="80" placeholder="Whats On your Mind?">
                                            
                    </textarea>
                    <label>Image:</label>
                    <input type="file" class="form-control" name="fileToUpload">
              </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" onclick="alert("Your Post Will BE Approved By Admin!");" class="btn btn-danger">Post</button>
      </div>
    </section>
    </div>
    </div>
  </div>
</div>
<?php

?>

            <br>
        <div class="col-md-8">
            <?php 
                
                $obj=new database();
                $res=$obj->perdisplayposts($_SESSION["email_id"]);
                $cnt=mysql_num_rows($res);
            ?>

            <?php
            if($cnt==0)
            {
               echo '<h3>No Posts Yet!</h3>';
            }
            else {
                while($row=mysql_fetch_assoc($res))
                {
                    $postid=$row["post_id"];
                    $desc=$row["post_desc"];
                    $date=$row["date"];
                    $time=$row["time"];
                    $photo=$row["post_photo"];
                    $title=$row["post_title"];
          ?>
          <article>
                        <!-- Blog item Start -->
                        <div class="blog-item-wrap">
                            <!-- Post Format icon Start -->
                            <div class="post-format">
                             <a href="postdelete.php?id=<?php echo $postid; ?>" onclick="return suredel();" ><span class="glyphicon glyphicon-trash"></span></a>
                                <span><i class="fa fa-camera"></i></span>
                            </div><!-- Post Format icon End -->
                            <h2 class="blog-title"><?php echo $title; ?></h2><!-- Entry Meta Start-->
                            <div class="entry-meta">
                                <span class="meta-part"><i class=
                                "ico-user"></i> <a href="#"><?php echo $_SESSION["email_id"]; ?></a></span> <span class=
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
                                    "single.php?id=<?php echo  $postid;?>">Read More <i class=
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
                                  ?><a href="likeinsaction.php?id=<?php echo $postid?>"><img src="../img/like.jpg" style="height:17px;width:22px;"/></a><?php
                                 
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
                    </article><!-- Blog Article End-->
                    <?php
                }
              }
            ?>
        </div>
        <div class="col-md-4">
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>



<?php
  
?>

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




<?php include 'scripts.php';?>
<?php include 'footer.php';?>

</body>
</html>