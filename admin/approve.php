<?php
$id=$_REQUEST["id"];
	 $con=mysql_connect('localhost','root','');
  mysql_select_db('moments',$con);
  $res=mysql_query("update post_tbl set flag=1 where post_id='$id'",$con);
  $cnt=mysql_num_rows($res);
  header('location:index.php');
?>