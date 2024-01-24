<?php
include 'session.php';
require 'conn.php';

require_once('layout/header.php');
require_once('layout/navbar.php');

$jumlahkategori = 0;

if (isset($_POST['simpan_kategori'])) {
    $nama = $_POST['kategori'];
    $insert = "INSERT INTO kategori (nama) VALUES (?)";
    $stmt = $conn->prepare($insert);
    $stmt->bind_param("s", $nama);

    if ($stmt->execute()) {
        echo "BERHASIL MENAMBAHKAN DATA";
        echo '<meta http-equiv="refresh" content="1;url=kategori.php">';
    } else {
        echo "Ooppss, tidak dapat menambah data. Error: " . $stmt->error;
    }

    $stmt->close();
}

$queryKategory = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($queryKategory);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        table {
            width: 800px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #000; /* Mengubah warna teks menjadi hitam */
        }

        th {
            text-align: left;
            background-color: #55608f;
            color: #fff; /* Mengubah warna teks pada header th */
        }

        tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        tbody td {
            position: relative;
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
        html,
body {
	height: 100%;
}

body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
}

.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}
    </style>
    <?php require_once('layout/navbar.php'); ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="my-2">
                <h3>Tambah Kategori</h3>
                <form action="" method="post">
                    <div>
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" placeholder="Input Nama Kategori"
                            class="form-control">
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit" name="simpan_kategori">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-2">
            <h2>List Kategori</h2>
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAMA</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlahkategori == 0) {
                            ?>
                            <tr>
                                <td colspan="3" class="text-center">Data Kategori tidak tersedia</td>
                            </tr>
                        <?php
                        } else {
                            $jumlah = 1;
                            while ($row = mysqli_fetch_assoc($queryKategory)) {
                                ?>
                                <tr class="hover">
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td align="center">
                                        <a href="hps_kategori.php?id=<?php echo md5($row['id']); ?>"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
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
    </div>
</body>

</html>
