<?php
	$id=$_REQUEST["id"];
	include '../database.php';
	$obj=new database();
	$res=$obj->deleteuser($id);
	header('location:starter.php');
?>