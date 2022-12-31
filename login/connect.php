<?php
// 	$email=$_POST['email'];

// echo $email
	$password =null;
	$email =null;
	$success=null;

	
	// Database connection
	
if(isset($_POST['sign-up']))
{
	$password = $_POST['password'];
	$email = $_POST['email'];
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt=$conn->prepare("select * from registration where email=?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result=$stmt->get_result();
		if($stmt_result->num_rows>0)
		{
			$data=$stmt_result->fetch_assoc();
			if($data['password']===$password){
				// echo "<h2>Login succesful</h2>";
				// header('Location:http://localhost/3d/public/');
				$username=$data['username'];
			}
			else{
				// echo "<h2>Invalid Email or password</h2>";
			}
		}
		else{
			// ?echo "<h2>Invalid Email or password</h2>";
		}

	
		
	}
	$query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
// $username="SELECT username FROM registration WHERE email='$email' AND password='$password'";
	// Execute the query and store the result
	$result = mysqli_query($conn, $query);
 	 session_start();
	// If the login is successful, set a session variable to indicate that the user is logged in
	if (mysqli_num_rows($result) == 1) {
	  $_SESSION['logged_in'] = true;
	 $_SESSION['username']=$username;
	 $success=' username or password';

	  header('Location:http://localhost/CorbelService/userAccount/index.php');

	} else {
	  // If the login is unsuccessful, display an error message
	
	
	  $success='Invalid email or password';
	//   header('Location: http://localhost/3d/login/Form.html');
	
	}
}
?>