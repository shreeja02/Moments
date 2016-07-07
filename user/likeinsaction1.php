<?php
session_start();
	$postid=$_REQUEST["id"];
	//echo $postid;
	include '../database.php';
	$ins=new database();
    $inslike=$ins->insertlikes($_SESSION["email_id"],$postid);
   header('location:home.php');
?>