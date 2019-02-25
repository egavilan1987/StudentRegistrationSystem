<?php 
	session_start();

if (!$_SESSION['admin_name']){
	header('location:admin_login.php?error=You are not an Administrator.');
}

?>

<html>
	<head>
		<title> Viewing the Records</title>
	</head>
<body>
<a href="userRegistration.php">Insert New Record</a>
Welcome: <font color="blue" size="5">
<?php echo $_SESSION['admin_name']; ?></font>
       
<a href="logout.php">Logout</a>	
<table align='center' width='1000' border='4'>
	<tr>
	<td colspan='20' align='center' bgcolor='yellow'>
	<h1>Viewing all the Records</h1></td>
	</tr>

	<tr align='center'>
	<th>Serial No</th>
	<th>Student's Name</th>
	<th>Father's Name</th>
	<th>Roll No</th>
	<th>Delete</th>
	<th>Edit</th>
	<th>Details</th>
	</tr>

	
<?php
$conn = mysqli_connect("localhost","root","","students");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}

$sql = "SELECT * FROM u_reg";

$query = mysqli_query($conn,$sql) or die("Bad Query: $sql");

$i=1;

while ($row=mysqli_fetch_assoc($query))
	{		
	?>
	<tr align="center">
	<td><?php echo $i; $i++; ?></td>
	<td><?php echo $row['u_name'];; ?></td>
	<td><?php echo $row['u_father'];; ?></td>
	<td><?php echo $row['u_roll']; ?></td>
	<td><a href='delete.php?delete=<?php echo $row['u_id']; ?>' onclick="return confirm('Are you sure?');" >Delete</a></td>
	<td><a href="edit.php?edit=<?php echo $row['u_id']; ?>">Edit</a></td>
	<td><a href="view.php?details=<?php echo $row['u_id']; ?>">Details</a></td>
	</tr>
<?php } ?>



</table>
<?php
if(isset($_GET['details'])){
$record_details = @$_GET['details'];

$sql = "SELECT * from u_reg where u_id = '$record_details'";
$query = mysqli_query($conn, $sql)or die("Bad Query: $sql");

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
<br><br>

<table align="center" border='4' bgcolor="gray" width="800">
	<tr>
		<td bgcolor="yellow" colspan="6" align="center">
		<h2>Your Details Here:</h2>
		</td>
	</tr>
	<tr align="center" bgcolor="white">
		<td><?php echo $name; ?></td>
		<td><?php echo $father; ?></td>
		<td><?php echo $school; ?></td>
		<td><?php echo $roll; ?></td>
		<td><?php echo $class; ?></td>
	</tr>

<?php } ?>
</table>

<br><br><br><br><br>

<form action="view.php" method='get'>
	Search a Record:<input type="text" name="search">
	<input type="submit" name="submit" value="Find Now">
</form>
<?php
if(isset($_GET['search'])){
	$search_record = $_GET['search'];

	$sql2 = "SELECT * from u_reg WHERE u_name='$search_record' OR u_roll='$search_record'";
	$query2 = mysqli_query($conn, $sql2)or die("Bad Query: $sql");

	while ($row=mysqli_fetch_assoc($query2))
	{		
		$name_search = $row['u_name'];
		$father_search = $row['u_father'];
		$school_search = $row['u_school'];
		$roll_search = $row['u_roll'];
		$class_search = $row['u_class'];
	

?>
<table width="800" bgcolor="yellow" align="center" border='1'>
	<tr>
		<td><?php echo $name_search; ?></td>
		<td><?php echo $father_search; ?></td>
		<td><?php echo $school_search; ?></td>
		<td><?php echo $roll_search; ?></td>
		<td><?php echo $class_search; ?></td>
	</tr>

</table>
<?php }} ?>

</body>
<h1></h1>
<br><br><br>
<body style="font-size:20px", align='center'>
	<input type="button" value="Registration" onclick = "window.location='userRegistration.php'"/>
	<input type="button" value="Home" onclick = "window.location='index.php'"/>
</body>
</html>