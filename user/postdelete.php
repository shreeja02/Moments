<?php
  $id=$_REQUEST["id"];
  include '../database.php';
  $obj=new database();
  $res=$obj->postdelete($id);
  $obj1=new database();
  $res1=$obj1->commentdel1($id);
  header('location:mypost.php');
?>