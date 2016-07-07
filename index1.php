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
    


    function passid_validation()
    {
       var p1=document.sign.txtpass1.length;
        if(p1==0 || pl>=5 || pl<12)
         {
               alert("password should not be empty/length must be between 5 to 12");
              document.sign.txtpass1.focus();
              return false;
          }
          else
          {
        return true;
      }
    }


    
  </script>
   <?php
    if(isset($_POST["btnlog"]))
    {
      $id=$_POST["txtemail"];
      $pass=$_POST["txtpass"];
    
     // $email=$_SESSION["email_id"];
      $con=mysql_connect('localhost','root','');
      mysql_select_db('moments',$con);
      $res=mysql_query("select * from user_tbl where email_id='$id' and password='$pass'",$con);
      $cnt=mysql_num_rows($res);
      if($cnt==1)
      {
        $_SESSION["email_id"]=$id;
        header('location:user/home.php');
      }
      else
      {
        echo "Not Successful";
      }
    }
  
      
?>
  </head>
  <body>

    
<div class="container">
  <div class="info">
    <h1>Moments</h1><span>Made with <i class="fa fa-heart"></i> by <a href="http://andytran.me">SPK</a></span>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo1.png" style="height: 130px;width: 260px;margin-left: -87px;margin-top: -35px;"></div>
  <form class="register-form" name="sign" action="signup1.php" method="post" enctype="multipart/form-data">
  <table style="width:100%;">
  <tr>
  <td>
    <input type="email" name="txtemail1" placeholder="Emailid" required style="margin-left:-12px;"/>
  </td>
  </tr>

  <tr>
  <td>
    <input type="password" name="txtpass1" placeholder="Password" required style="margin-left:-12px;" onblur="return passid_validation();"/>
  </td>
  </tr

  <tr>
  <td>
    <input type="password" name="txtpass2" placeholder="confirm Password" required style="margin-left:-12px;"/>
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
     <input type="file" name="fileToUpload" placeholder="Image">
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
         
         <input type="text"  name="captcha_code" style="margin-left:-12px;" placeholder="Enter captcha code" >
  </td>
  </tr>


  
    </table>
   <!-- <input type="text" placeholder="email address" style="margin-left:-12px;"/>
   -->
   
  
   
    <button name="btnsub">Create</button>

    <p class="message">Already registered? <a href="#">Log In</a></p>
  </form>




  <form class="login-form" name="log" action="index1.php" method="post">
    <input type="email" placeholder="Email id" required name="txtemail" style="margin-left:-12px;"/>
    <input type="password" placeholder="Password" required name="txtpass"  style="margin-left:-12px;" />
   <a href="home.php"> <button name="btnlog" >login</button></a>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>

   
         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
    
    
  </body>
</html>
