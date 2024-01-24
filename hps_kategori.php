<?php
	include 'conn.php';
	$id = $_GET['id'];
	$sql = "Delete from kategori where md5(id) = '$id'";
	if($conn->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:kategori.php');
	}else{
		echo "Oppps something error ";
	}
	$conn->close();
?> 

