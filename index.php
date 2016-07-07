<?php
session_start();
 
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    
        <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
      input [type='radio'] {
        width:10px;
      }
    </style>

    <script type="text/javascript">

    function username_val(uid,mx,my)
  {
    var ul=log.txtemail.value.length;
        if(ul==0 || ul>=my || ul<mx)
    {
        alert("username should not be empty/length must be between "+mx+" to "+my);
        uid.focus();
        return false;
    }
    return true;
  }
      /* function val()
        {
  
            var uid=document..txtemail;
             var passid=document..txtpass;
            if(userid_validation(uid,5,12))
            {
                 if(passid_validation(passid,5,12))
                  {
                      registerform.submit.focus();
                      return true;
                  }
            }

         }
*/
   function validate()
   {  
      var numbers = /^[0-9]+$/; 
      var x=document.sign.txtmobno.value;
      if(x.length!=10)  
      {  
        alert('Please input 10 numeric characters only');  
        document.sign.txtmobno.focus();  
        return false;  
      } 
      
         return true;  
      
    } 
    


   

    
  </script>
  <script type="text/javascript">
     function passid()
    {
      
          var numbers = /^[0-9]+$/; 
      var x=document.sign.txtpass.value;
      if(x.length<5 || x.length>12)  
      {  
        alert('Please enter password between 5 to 12 characters');  
        document.sign.txtpass.focus();  
        return false;  
      } 
      
         return true;  
    }
    function check()
    {
      var x=document.sign.txtpass.value;
      var y=document.sign.txtpass2.value;
      if(x!=y)
      {
        alert("Your Password Doesn't match!");
        document.sign.txtpass2.focus();  
        return false;  
      }
      return true;
    }

  </script>
  </head>
  <body>

    
<br>
<br>
<br>
<div class="form">
  <div class="thumbnail"><img src="img/logo2.png" style="height: 130px;width: 260px;margin-left: -87px;margin-top: -35px;"></div>
  <form class="register-form" name="sign" action="signup1.php" method="post" enctype="multipart/form-data">
  <table style="width:100%;">
  <tr>
  <td>
    <input type="email" name="txtemail1" placeholder="Emailid" required style="margin-left:-12px;"/>
  </td>
  </tr>

  <tr>
  <td>
  <input type="password" name="txtpass" onBlur="return passid();" placeholder="Password" required style="margin-left:-12px;"/>
  </td>
  </tr

  <tr>
  <td>
    <input type="password" name="txtpass2" onBlur="return check();" placeholder="confirm Password" required style="margin-left:-12px;"/>
  </td>
  </tr>

  <tr>
  <td>
    <input type="text" name="txtname" placeholder="Username" style="margin-left:-12px;"/>
    </td>
  </tr>
     
      <tr>
  <td>
     <input type="text" name="txtmobno" placeholder="Mobile No" style="margin-left:-12px;" onBlur="return validate();"/>
     </td>
  </tr>
    <tr>
  <td>
     <input type="file" name="fileToUpload" placeholder="Image" required>
     </td>
  </tr>
    
       <tr>
  <td>
    <input type="radio" style="width:10px;" name="rb" value="male" checked/>Male
    <input type="radio"  style="width:10px;" name="rb" value="female"/>Female<br>
    </td>
  </tr>
  
  <tr>
  <td>
    <img style="margin-left:-5px;" src="captcha_code.php"/></br></br>
  </td>
  </tr>


  <tr>
  <td>
         
         <input type="text"  name="captcha_code" style="margin-left:-12px;" placeholder="Enter captcha code" required>
  </td>
  </tr>


  
    </table>
   <!-- <input type="text" placeholder="email address" style="margin-left:-12px;"/>
   -->
   
  
   
    <button name="btnsub">Create</button>

    <p class="message">Already registered? <a href="#">Log In</a></p>
  </form>

  <?php
  if(isset($_POST["btnsub"]))
  {
            $password=$_POST["txtpass"];
            $email=$_POST["txtemail"];
            $_SESSION["email_id"]=$email;
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
                    header('location:user/home.php');
                    }
                }
               
            }
  }
  ?>


  <form class="login-form" name="log" action="index.php" method="post">
    <input type="email" placeholder="Email id" required name="txtemail" style="margin-left:-12px;"/>
    <input type="password" placeholder="Password" required name="txtpass"  style="margin-left:-12px;" />
    <p name="a" style="color:#EF3B3A"><?php 
    if(isset($_POST["btnsub"]))
    {
      if($cnt!=1)
      {
        echo "Emailid Or Password is Invalid!";
      }
    }

    ?></p>
    <br>
    <input type="submit" name="btnsub" value="Take Me In" class="btn btn-danger" style="background-color:#EF3B3A;color:white;" />
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>

   
         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
    
    
  </body>
</html>
