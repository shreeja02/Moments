<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome Admin!</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-red.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
    <script type="text/javascript">
      function delconfirm()
      {
        return confirm("Are you sure you wanna delete this record?");

      }
       $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  
    <?php include 'sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
 <form method="post" action="usercreate.php" enctype="multipart/form-data">
<center>
<h1>List Of Users</h1>
</center>
<div class="container">
<a href="usercreate.php"><button type="button" class="btn btn-danger
" data-toggle="tooltip" data-placement="right" title="Create New User"><span class="glyphicon glyphicon-plus-sign"></button></a>


<br>
<br>
<div>
<table class="table table-striped" id="example1"> 
<thead>
  <tr>  
    <th>Email Id</th>
    <th>User Name</th>
    <th>Mobile No.</th>
    <th>Gender</th>
    <th>Photo</th>
    <th>Action</th>
  </tr>
</thead>
  <tbody>
  <?php
  //include '../database.php';
  $obj=new database();
  $ans=$obj->userdisplay();
  while($row=mysql_fetch_array($ans,MYSQL_ASSOC))
  {
    echo '<tr>';
    echo "<td>".$row['email_id']."</td>";
    echo " <td>".$row['name']."</td>";
    echo " <td>".$row['mobileno']."</td>";
    echo " <td>".$row['gender']."</td>";
    echo '<td><img src="'.$row["photo"].'" height="50px" width="50px"/></td>';
    echo "<td>
      <a href='userdelete.php?id=".$row['email_id']."' ><input class='btn btn-danger' onclick='delconfirm();'  type='button' value='Delete' name='btndel'/></a> </td></tr>";
  }
?>
</tbody>
  </table>
  
  </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php';?>

<?php include 'aside.php';?>
<!-- ./wrapper -->

<?php include 'scripts.php';?>
</body>
</html>
