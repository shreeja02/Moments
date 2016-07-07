 <?php
 
    /*if(isset($_POST["btnlog"]))
    {
        $password=$_POST["txtpass"];
        $email=$_POST["txtemail"];
            require 'database.php';
            $obj=new database();
            $cnt=$obj->login($email,$password);
            if($cnt==1)
            {
                $_SESSION["email_id"]=$email;
                if($email=="admin@gmail.com")
                {
                    header('location:admin/usercreate.php');
                }
                else
                {
                     Header('location:user/#.php');
                }
               
            }
            else
            {
                echo "wrong";
            }*/
            $password=$_POST["txtpass"];
            $email=$_POST["txtemail"];
            require 'database.php';
            $obj=new database();
            $res=$obj->login($email,$password);
            $cnt=mysql_num_rows($res);
            while($row=mysql_fetch_array($res))
            {
            	if($cnt==1)
                {
                    if($row['type']=="admin")
                    {
                    header('location:admin/index.php');

                    }
                    else
                    {
                    header('location:user/index.php');
                    }
                }
                else
                {
                    echo "user Name or password invalid";
                }
            }
            
    
 ?>


<!--<body bgcolor="orange">
<center><h1>LOGIN</h1></center>
<form action="login.php" method="post">
<center>
<table>
<tr>
	<td>Email Id:</td>
	<td><input type="email" name="txtemail" placeholder="Enter Email"></td>
</tr>

<tr>
	<td>Password:</td>
	<td><input type="password" name="txtpass" placeholder="Enter Password"</td>
</tr>
<tr>
	<td><input type="submit" name="btnlog" value="LOGIN"/></td>
	<td><input type="submit" name="btnhome" value="HOME"/></td>
	</tr>
</table>
<h4><a href="forget.php"/>Forget password?</h4>
</center>

</body>	
</html>-->