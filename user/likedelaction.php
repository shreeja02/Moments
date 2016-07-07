<?php 
	session_start();
	$postid=$_REQUEST["id"];
	include '../database.php';
	$obj=new database();
	$res=$obj->deletelikes($_SESSION["email_id"],$postid);
	echo $res;
	header('location:home.php');
?>