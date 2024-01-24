<?php
require_once('layout/header.php');
require_once('layout/navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataProduk</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: sans-serif;
            font-weight: 100;
            color: #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        section {
            margin: 20px;
            width: 100%;
            max-width: 800px; /* Sesuaikan lebar maksimum sesuai keinginan Anda */
        }

        h2 {
            color: #fff;
            background-image: linear-gradient(45deg, #1c7ed6 0%, #60e7fd 100%);
            text-align: center;
            padding: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #000;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #55608f;
            color: #fff;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body>
    
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataProduk</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
            font-family: sans-serif;
            font-weight: 100;
            color: #000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        section {
            margin: 20px;
            width: 100%;
            max-width: 800px; /* Sesuaikan lebar maksimum sesuai keinginan Anda */
        }

        h2 {
            color: #fff;
            background-image: linear-gradient(45deg, #1c7ed6 0%, #60e7fd 100%);
            text-align: center;
            padding: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #000;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #55608f;
            color: #fff;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #55608f;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #405478;
        }
    </style>
</head>

<body>
<section id="kategori">
    <h2>Kategori</h2>
    <form method="post" action="">
        <label for="searchCategory">Cari Nama Kategori:</label>
        <input type="text" name="searchCategory" id="searchCategory" placeholder="Masukkan nama kategori...">
        <input type="submit" value="Cari">
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conn.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchCategory'])) {
                $searchCategory = mysqli_real_escape_string($conn, $_POST['searchCategory']);
                $queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE nama LIKE '%$searchCategory%'");
            } else {
                $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
            }

            $no = 1;
            while ($rowKategori = mysqli_fetch_assoc($queryKategori)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $rowKategori['nama'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</section>


<section id="produk">
    <h2>Produk</h2>
    <form method="post" action="">
        <label for="searchProduct">Cari Nama Produk:</label>
        <input type="text" name="searchProduct" id="searchProduct" placeholder="Masukkan nama produk...">
        <input type="submit" value="Cari">
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conn.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchProduct'])) {
                $searchProduct = mysqli_real_escape_string($conn, $_POST['searchProduct']);
                $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$searchProduct%'");
            } else {
                $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
            }

            $no = 1;
            while ($rowProduk = mysqli_fetch_assoc($queryProduk)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $rowProduk['nama'] . "</td>";
                echo "<td>" . $rowProduk['harga'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</section>


</body>

</html>
