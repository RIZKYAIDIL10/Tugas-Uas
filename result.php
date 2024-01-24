<?php
include 'conn.php';
include 'session.php';
if(isset($_POST['add'])){

	$nama = $_POST['nama'];
	$stok = $_POST['stok'];

	$insert = "insert into produk (nama,stom) values ('$nama','$stok')";
	
	if($conn->query($insert)== TRUE){

			echo "Sucessfully add data";
			header('location:maintenance.php');
	}else{

		echo "Ooppss cannot add data" . $conn->connect_error;
		header('location:maintenance.php');
	}
	$insert->close();
}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="mycss.css">
		<title>
			This is Sample
		</title>
		</head>
	<body bgcolor="gray">
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="assets/mycss.css">
		<title>
			PRODUK
		</title>
		</head>
	<body>
		<div class="bg">
			<div id="menu">
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="addproduk.php">Add Produk</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			</div>
			<div id="content">
				<form action="result.php" method="get" ecntype="multipart/data-form">
				<table align="center">
						<h1></h1>	
							<tr>
								<input type="text" name="query"><input type="submit" value="Search" name="search"  class="btn btn-outline-primary">
							</tr>
						</table>
				</form>
				<form action="maintenance.php" method="POST">
				
			</form>
				<br>
				<table align="center" border="1" cellspacing="0" width="500">
					<tr>
					<th>Nama</th>
					<th>Stok</th>
					<th>Action</th>
					</tr>
					<?php
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from produk where nama like '%$query%' or stok like '%$query%'";

						$result = $conn->query($sql);
						if($result->num_rows > 0){
							while($row1 = $result->fetch_array()){
								$nama = $row1['nama'];
								$stok = $row1['stok'];
		
						?>
						<tr>
							<td align="center"><?php echo $nama;?></td>
							<td align="center"><?php echo $stok;?></td>
							<td align="center"><a href="edit.php?id=<?php echo md5($row1['id']);?>">Edit
							</a>/<a href="delete.php?id=<?php echo md5($row1['id']);?>">Delete</a></td>
						</tr>
						<?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$conn->close();
				?>
				</table>
			</div>
		</div>
		</body>

</html>