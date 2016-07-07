<?php
	session_start();
    $email=$_SESSION["email_id"];
    $postid=$_REQUEST["id"];
    echo $postid;
	$cmnt=$_POST["comment"];
	$date=date("d/m/y");
	$time=time("H:M:S");
	include '../database.php';
	$obj=new database();
	$res=$obj->commentadd($cmnt,$postid,$email,$date,$time);
	header('location:single.php?id='.$postid);
?>