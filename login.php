<?php 
include "php/init.php";
conn();

// jika user sudah login redirect ke dashboard
if( isset($_SESSION['username']) ){
    header("Location: dashboard.php");
}

// user login
if( isset($_POST['login']) ){
    login($_POST['username'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Perpustakaan</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Google Materalize fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .card {
            width: 60vw;
        }
    </style>
</head>
<body>
<form method="post">
    <div class="wrp-login">
        <div class="card">
            <div class="card-title text-center">
                <h1>Hi, Nice to see you again~</h1>
            </div>
            <div class="card-body">
                <div class="align-center">
                    <form action="">
                        <!-- username -->
                        <div class="input-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username">
                        </div>

                        <!-- password -->
                        <div class="input-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Username">
                        </div>

                        <!-- submit -->
                        <div class="input-group">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
<footer class="page-footer pink">
		<div class="footer-copyright">
			<div class="container center">
			&copy; 2022 Pyparamitha
			</div>
		</div>
	</footer>
<script src="js/app.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>