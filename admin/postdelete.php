<?php
	$id=$_REQUEST["id"];
	include '../database.php';
	$obj=new database();
	$res=$obj->postdelete($id);
	header('location:postdetails.php');
?>