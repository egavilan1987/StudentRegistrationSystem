<?php 
	session_start();

if (!$_SESSION['admin_name']){
	header('location:admin_login.php?error=You are not an Administrator.');
}

?>

<html>
	<head>
		<title>Student's Registration Form</title>		
	</head>  

<body>
<form method='post' action='UserRegistration.php'>
<table width='500' border='3' align='center'>
      	<tr>
			<th bgcolor='yellow' colspan='5'>Student's Registration Form</h>
		</tr>
  		<tr >
			<td align='right'>Student's Name:</td>
			<td><input type='text' name='user_name'>
			<font color='red'><?php echo @$_GET['name']; ?>
			</font>
			</td>

		</tr>
		<tr>
			<td align='right'>Father's Name:</td>
			<td><input type='text' name='father_name'>
			<font color='red'><?php echo @$_GET['father']; ?>
			</font>
			</td>
		</tr>
		<tr>
			<td align='right'>School's Name:</td>
			<td><input type='text' name='school_name'>
			<font color='red'><?php echo @$_GET['school']; ?>
			</font>
			</td>
		</tr>
		<tr>
			<td align='right'>Roll No: </td>
			<td><input type='text' name='roll_no'>
			<font color='red'><?php echo @$_GET['roll']; ?>
			</font>
			</td>
		</tr>
		<tr>
		<td align='right'>Class:</td>
			<td>
			<select name='student_class'>
			<option value='null'>Select Class</option>
			<option value='10th'>10th </option>
			<option value='9th'>9th</option>
			</select>
			<font color='red'><?php echo @$_GET['class']; ?>
			</font>
			</td>
		</tr>
		<tr>
			<td align='center' colspan='6'>
			<input type='submit' name='submit' value='Submit'>
			</td>
		</tr>  
  </table>
  
</form>
</body>
<h1></h1>
<body style="font-size:20px", align='center'>
	<input type="button" value="Home" onclick = "window.location='index.php'"/>
	<input type="button" value="View" onclick = "window.location='view.php'"/>
</body>
</html>
<?php

$conn = mysqli_connect("localhost","root","","students");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}


if(isset($_POST['submit']))
{
	 $student_name = $_POST['user_name'];
	 $student_father = $_POST['father_name'];
	 $student_school = $_POST['school_name'];
	 $student_roll = $_POST['roll_no'];
	 $student_class = $_POST['student_class'];

if($student_name==''){
	echo
	"<script>window.open('userRegistration.php?name=Name is Required','_selft')</script>";
	exit();
}

if($student_father==''){
	echo
	"<script>window.open('userRegistration.php?father=Father Name is Required','_selft')</script>";
	exit();
}

if($student_school==''){
	echo
	"<script>window.open('userRegistration.php?school=School Name is Required','_selft')</script>";
	exit();
}

if($student_roll==''){
	echo
	"<script>window.open('userRegistration.php?roll=Enter Roll no','_selft')</script>";
	exit();
}

if($student_class=='null'){
	echo
	"<script>window.open('userRegistration.php?class=Select Your class','_selft')</script>";
	exit();
}


$sql = "INSERT INTO u_reg(u_name, u_father, u_school, u_roll, u_class) VALUES('$student_name', '$student_father','$student_school','$student_roll','$student_class')";
$query=mysqli_query($conn,$sql);


if($query){
	echo "<center><b>The Following Data Has Been Inserted Into Our Database:</b></center>";
	echo "<table align='center' border='4'><tr><td>
	$student_name</td><td>$student_father</td><td>
	$student_school</td><td>$student_roll</td><td>
	$student_class</td></tr></table>";
}

}
?>