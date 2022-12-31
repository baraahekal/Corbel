
<?php

// Connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_name = 'test';
$conn = mysqli_connect($db_host, $db_user, '', $db_name);
$db=new mysqli($db_host, $db_user, '', $db_name);

$password =null;
$email =null;
$cpassword = null;
$username = null;
$oldpass_error='';
$password_error=null;
$success=null;
$opwd=null;
$npwd=null;
$cpwd=null;



if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $opwd=$_POST['opwd'];
    $npwd=$_POST['npwd'];
    $cpwd=$_POST['cpwd'];
  
  $query=mysqli_query($conn,"SELECT email,password from registration where email='$email' AND password ='$opwd'");
  $num=mysqli_fetch_array($query);
  if($num>0)
  {
    if($npwd==$cpwd)
    {
    $con=mysqli_query($conn,"UPDATE registration set password='$npwd' where email='$email'");
    $con=mysqli_query($conn,"UPDATE registration set cpassword='$cpwd' where email='$email'");
    $success="Password Change successfully";
    }
    else{
        $password_error="Password does not match";
    }
  }
  if($num==0){
    $oldpass_error="Password does not match";
  }
  
  }
  

?>