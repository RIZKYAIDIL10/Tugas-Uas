<?php 
include 'session.php';
require "conn.php";
$queryProduk=mysqli_query($conn,"SELECT * FROM produk");
$jumlahkategori = mysqli_num_rows($queryProduk);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kategori</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="ass/js/all.js">
    <link rel="stylesheet" href="ass/css/all.css">
</head>
<style>

  .no-decoration{
    text-decoration: none;
  }
  tr:hover {
background-color: coral;
}
</style>
<body>
    <?php require "navbar.php"; ?>
<div class="container-fluid">
  <div class="row">
    <nav arial-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-cureent="page"><a href="index.php" class="no-decoration text-muted">
            <i class="fa-sharp fa-solid fa-house"></i>HOME
            </a></li>
            <li class="breadcrumb-item active" aria-cureent="page">
                Produk
            </li>
        </ol>
    </nav> 
        </form> 
 
</div>
    </div>
    <div clas="mt-2">
        <h2>List Produk</h2>
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NAMA</th>
                        <th>Detail</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($jumlahkategori==0){
                    ?>
                    <tr>
                    <td coldspan=3 class="text-center">Data Kategori tidak tersedia</td>
                    </tr> 
                    <?php
                    }
                    else{
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($queryProduk)){
                    ?>
                        <tr id="hover">
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['detai'];?></td>
							<td><?php echo $data['stok'];?></td>  
                        </tr>
                    <?php
                        $jumlah++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>