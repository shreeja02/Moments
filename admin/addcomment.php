<?php
	session_start();
    $email=$_SESSION["email_id"];
    $postid=$_REQUEST["id"];
	$cmnt=$_POST["comment"];
	$date=date("d/m/y");
	$time=time("H:M:S");
	include '../database.php';
	$obj=new database();
	$res=$obj->commentadd($cmnt,$postid,$email,$date,$time);
	header("location:posts.php?id=$postid");
?>