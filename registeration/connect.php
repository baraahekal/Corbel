<?php

// Connect to the database

$password =null;
$email =null;
$cpassword = null;
$username = null;
$username_error=null;
$password_error=null;
$success=null;

$conn = new mysqli('localhost','root','','test');
if(isset($_POST['sign-up']))
{
$password = $_POST['password'];
$email = $_POST['email'];
$cpassword = $_POST['cpassword'];
$username = $_POST['username'];
// $conn = new mysqli($db_host, $db_user, '', $db_name);




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email from the form submission
$email = $_POST['email'];

// Check if the email already exists in the table
$sql = "SELECT * FROM registration WHERE email = '$email'";
$result = $conn->query($sql);

// Check if the query was successful
if (!$result) {
    die("Error executing query: " . $conn->error);
}

// If the email already exists, show an error message
if ($result->num_rows > 0) {   
    // $alert="<script>alert('Error: Email already registered');</script>";
    // echo $alert;
     $username_error ="Email already registered";
    //  echo ($username_error);
}

// If the email does not exist, insert the new user's information into the table
else {
    if ($password == $cpassword){

    
    $sql = "INSERT INTO registration VALUES ( '','$username', '$password','$cpassword','$email','0')";

    $result = $conn->query($sql);

    // Check if the insertion was successful
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

     $success= "Thank you for your registration
     <br>Now you can sign in";
    //  echo($success);
    // header('Location:http://localhost/CorbelService/login/Form.html');
}
else
// echo ("password not equal");
 $password_error="Passwords doesn't match";
//  echo ( $password_error);
}

// Close the connection

$conn->close();





}


?>