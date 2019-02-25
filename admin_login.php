<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<body>
	<form action='admin_login.php' method="post">
		<table width="400" border="2" align="center" bgcolor="orange">
			<tr>
				<td align="center" bgcolor="pink" colspan="6"><h2> Admin Panel Form</h2></td>
			</tr>
			<tr>
				<td align="right">Admin Name:</td>
				<td><input type="text" name="admin_name"></td>				
			</tr>
			<tr>
				<td align="right">Admin Password:</td>
				<td><input type="password" name="admin_pass"></td>				
			</tr>
			<tr>
				<td colspan="4" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
			
		</table>
		
	</form>
		<center>
			<?php
				echo @$_GET['error'];
			?>
		</center>
</body>
</html>

<?php
$conn = mysqli_connect("localhost","root","","students");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}

if(isset($_POST['login'])){
	//$admin_name = $_POST['admin_name'];
	$admin_name = $_SESSION['admin_name'] = $_POST['admin_name'];
	$admin_pass = $_POST['admin_pass'];


	$sql = "SELECT * from login WHERE user_name = '$admin_name' AND user_password = '$admin_pass'";
	$query = mysqli_query($conn,$sql) or die("Bad Query: $sql");
    
    $resultcheck = mysqli_num_rows($query);

	if($resultcheck > 0){
		echo "<script>window.open('view.php?logged=Logged in Successlully..!','_self')</script>";
	}else{
		echo "<script>alert('Password or User name is Incorrect!')</script>";
	}
}
?>