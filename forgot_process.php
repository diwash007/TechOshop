<?php 
 require_once("config.php");
if(isset($_POST['subforgot'])){ 
$login=$_REQUEST['login_var'];
$query = "select * from  users where username='$login' OR email = '$login'"; 
$res = mysqli_query($dbc,$query);
$result=mysqli_fetch_array($res);
if($result)
{
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE (username='$login' OR email = '$login')");
if($res = mysqli_fetch_array($findresult))
{
$oldftemail = $res['email'];  
}
$token = bin2hex(random_bytes(50));
 $inresult = mysqli_query($dbc,"insert into pass_reset values('','$oldftemail','$token')"); 
 if ($inresult)  
 { 
$FromName="TechOshop";
$credits="All rights are reserved | TechOshop "; 
$headers = "From TechOshop";
         $subject="TechOshop - Password reset"; 
     $msg="Your password reset link <br> http://localhost:8081/php/form/password-reset.php?token=".$token." <br> Reset your password with this link .Click or open in new tab<br><br> <br> <br> <center>".$credits."</center>"; 
   if(mail($oldftemail, $subject, $msg, $headers)){
header("location:forgot-password.php?sent=1"); 
$hide='1';
          
    } else {
        
    header("location:forgot-password.php?servererr=1"); 
} 
      } 
      else 
      { 
          header("location:forgot-password.php?something_wrong=1"); 
      }     
}
else  
{
header("location:forgot-password.php?err=".$login); 
}
}
?>