<?php
    
	include 'conn.php';
	session_start();

	if(isset($_SESSION['userID'])){

		header('location:home.php');
	}

	if(isset($_POST['log'])){

		$user = $_POST['username'];
		$pass =  $_POST['pass'];

		$sql = "SELECT * FROM user_tbl where username = '$user' and password = '$pass'";
		$result = $conn->query($sql);

		if($result-> num_rows > 0){
			while($row= $result->fetch_assoc()){
				$_SESSION['userID'] = $row['userID'];
				$_SESSION['username'] = $row['username'];	

		
			}
			?>
			<script> alert('Welcome <?php echo $_SESSION['username']?>'); </script>
			<script>window.location='home.php';</script>
			<?php

		
			}else{
				echo "<center><p style=color:red;>Invalid username or password</p></center>";

		}
		$conn->close();
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        body {
            background-color: #f6f6f6;
        }

        .login-box {
            background-color: #ffffff;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            padding: 20px;
            margin-top: 100px;
        }

        .login-key {
            color: #808080;
            font-size: 25px;
            margin-bottom: 30px;
            text-align: center;
        }

        .login-title {
            font-size: 25px;
            margin-bottom: 30px;
            text-align: center;
        }

        .login-form .form-control {
            border-radius: 2px;
        }

        .login-button {
            margin-top: 30px;
            text-align: center;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .login-btm {
            padding: 20px 0;
            text-align: center;
            color: #808080;
        }

        .login-btm a {
            color: #3498db;
            text-decoration: none;
        }

        .login-btm a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form action="index.php" method="POST">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="login-key">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="login-title">
                        <h2>SELAMAT DATANG</h2>
                    </div>

                    <div class="login-form">
                        <div class="form-group">
                            <label class="form-control-label">USERNAME</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">PASSWORD</label>
                            <input type="password" name="pass" class="form-control">
                        </div>

                        <div class="login-button">
                            <button type="submit" value="" name="log" class="btn btn-primary btn-block">LOGIN</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.form-control');

            inputs.forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.querySelector('label').classList.add('focused');
                });

                input.addEventListener('blur', function () {
                    if (this.value === '') {
                        this.parentElement.querySelector('label').classList.remove('focused');
                    }
                });
            });
        });
    </script>
</body>

</html>
