<?php
$catname=$_POST['txtname'];
	include '../database.php';
	$obj=new database();
	$res=$obj->catadd($catname);
	header('location:catdetails.php');
?>