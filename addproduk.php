<?php
include 'conn.php';

if(isset($_POST['add'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $detai = $_POST['detai'];
    $stok = $_POST['stok'];

    // Upload gambar
    $nama_file_gambar = $_FILES['gambar']['name'];
    $lokasi_file_gambar = $_FILES['gambar']['tmp_name'];
    $folder_gambar = 'gambar/';

    // Check file type
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    $file_info = pathinfo($nama_file_gambar);
    $file_extension = strtolower($file_info['extension']);

    if (in_array($file_extension, $allowed_types)) {
        // Generate unique file name
        $unique_file_name = uniqid('img_', true) . '.' . $file_extension;

        // Pindahkan gambar ke folder yang ditentukan dengan nama unik
        move_uploaded_file($lokasi_file_gambar, $folder_gambar . $unique_file_name);

        // Simpan data produk ke database dengan prepared statement
        $queryTambahProduk = "INSERT INTO produk (nama, harga, detai, stok, gambar) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($queryTambahProduk);
        $stmt->bind_param("sssss", $nama, $harga, $detai, $stok, $unique_file_name);

        if ($stmt->execute()) {
            echo "Successfully add data";
        } else {
            echo "Oops, cannot add data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid file type. Allowed types: jpg, jpeg, png, gif";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUK</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: sans-serif;
            font-weight: 100;
            background: linear-gradient(45deg, #49a09d, #5f2c82);
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-table-container {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        form,
        table {
            width: 45%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: auto;
            overflow-y: auto;
            max-height: 500px;
            display: block;
            background-color: rgba(255, 255, 255, 0.8);
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            position: relative;
            text-align: left;
            border: 1px solid #ddd;
            box-sizing: border-box;
            white-space: normal;
        }

        th {
            background-color: #55608f;
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        tbody td:hover::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -9999px;
            bottom: -9999px;
            background-color: rgba(255, 255, 255, 0.2);
            z-index: -1;
        }

        h1, p {
            color: #fff;
            text-align: center;
        }

        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            margin: 0 8px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #666;
        }
    </style>
</head>

<body>
    <?php
    require_once('layout/header.php');
    require_once('layout/navbar.php');
    ?>
    
    <div class="container">
    <form action="" method="GET">
            <label for="searchProduct">Cari Produk:</label>
            <input type="text" name="searchProduct" id="searchProduct" placeholder="Masukkan nama produk...">
            <input type="submit" value="Cari">
        </form>
        <div class="form-table-container">
            
            <!-- Form -->
            <form action="addproduk.php" method="POST" enctype="multipart/form-data">
                
                <table>
                    <tr>
                        <td><input type="text" name="nama" class="form-control" placeholder="Input Nama" maxlength="25" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="harga" class="form-control" placeholder="Input Harga" required></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="detai" class="form-control" placeholder="Input Detail"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="stok" class="form-control" placeholder="Input Stok" required></td>
                    </tr>
                    <tr>
                        <td><input type="file" name="gambar" accept="image/*" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><input class="btn btn-outline-primary" type="submit" name="add" value="Add"></td>
                    </tr>
                </table>
            </form>

            <!-- Tabel -->
            
            <table border="1" cellspacing="0" class="btn btn-outline-bg-danger">
            <tr>
                
                <th>Nama</th>
                <th>Harga</th>
                <th>Detail</th>
                <th>STOK</th>
                <th>Action</th>
            </tr>
            
            <?php
            // Mengambil data pencarian jika ada
            $searchProduct = isset($_GET['searchProduct']) ? $_GET['searchProduct'] : '';

            // Query untuk mengambil data produk berdasarkan pencarian
            $sql = "SELECT * FROM produk WHERE nama LIKE '%$searchProduct%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) {
                    ?>
                    <tr class="hover">
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['harga']; ?></td>
                        <td><?php echo $row['detai']; ?></td>
                        <td><?php echo $row['stok']; ?></td>
                        <td><a href="edit.php?id=<?php echo md5($row['id']); ?>">Edit</a>/<a
                                href="delete.php?id=<?php echo md5($row['id']); ?>">Delete</a></td>
                    </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='5' align='center'>No Records</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</div>
</body>

</html>

