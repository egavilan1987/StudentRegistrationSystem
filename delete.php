<?php
$conn = mysqli_connect("localhost","root","","students");

if(!$conn){
	die("Connection failed: ".mysql_connect_error());
}



$delete_record = $_GET['delete'];


mysqli_query($conn, "DELETE from u_reg where u_id='$delete_record'");


echo"<script>window.open('view.php?deleted=Record Has Been Deleted Successfully!','_self')</script>";




?>