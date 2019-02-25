<?php

$conn = mysqli_connect("localhost","root","","students");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}

$edit_record = $_GET['edit'];

$sql = "SELECT * from  u_reg where u_id='$edit_record'";
$query = mysqli_query($conn, $sql) or die("Bad Query: $sql");
$i=1;
while ($row=mysqli_fetch_assoc($query))
	{		
		$edit_id = $row['u_id'];
		$name = $row['u_name'];
		$father = $row['u_father'];
		$school = $row['u_school'];
		$roll = $row['u_roll'];
		$class = $row['u_class'];
	}
?>




<html>
	<head>
		<title>Updating Student's Record</title>		
	</head>  

<body>
<form method='post' action='edit.php?edit_form=<?php echo $edit_id; ?>'>
<table width='500' border='3' align='center'>
      	<tr>
			<th bgcolor='yellow' colspan='5'>Updating Form</h>
		</tr>
  		<tr >
			<td align='right'>Student's Name:</td>
			<td><input type='text' name='user_name1' value='<?php echo $name; ?>'>
			</td>

		</tr>
		<tr>
			<td align='right'>Father's Name:</td>
			<td>
			<input type='text' name='father_name1' value='<?php echo $father; ?>'>
			</td>
		</tr>
		<tr>
			<td align='right'>School's Name:</td>
			<td>
			<input type='text' name='school_name1' value='<?php echo $school; ?>'>
			</td>
		</tr>
		<tr>
			<td align='right'>Roll No: </td>
			<td><input type='text' name='roll_no1' value='<?php echo $roll; ?>'>
			</font>
			</td>
		</tr>
		<tr>
		<td align='right'>Class:</td>
			<td>
			<select name='student_class1'>
			<option value='<?php echo $class; ?>'><?php echo $class; ?></option>
			<option value='10th'>10th </option>
			<option value='9th'>9th</option>
			</select>
			</td>
		</tr>
		<tr>
			<td align='center' colspan='6'>
			<input type='submit' name='update' value='Update'>
			</td>
		</tr>  
  </table>
  
</form>
</body>
<h1></h1>
<body style="font-size:20px", align='center'>
	<input type="button" value="Home" onclick = "window.location='index.php'"/>
</body>
</html>
<?php
if (isset($_POST['update'])) {

	$edit_record1 = $_GET['edit_form'];
	$student_name = $_POST['user_name1'];
	$student_father = $_POST['father_name1'];
	$student_school = $_POST['school_name1'];
	$student_roll = $_POST['roll_no1'];
	$student_class = $_POST['student_class1'];

$sql1 = "UPDATE u_reg set u_name='$student_name',u_father='$student_father',u_school='$student_school',u_roll='$student_roll',u_class='$student_class' WHERE u_id = '$edit_record1'";
	

$query1=mysqli_query($conn,$sql1);

if($query1){
	echo"<script>window.open('view.php?updated=Record hass been updated..!','_self')</script>";
}
}
?>