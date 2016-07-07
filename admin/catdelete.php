<?php
  $id=$_REQUEST["id"];
  include '../database.php';
  $obj=new database();
  $res=$obj->catdelete($id);
  header('location:catdetails.php');
?>