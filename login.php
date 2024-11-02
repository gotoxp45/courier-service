<!DOCTYPE html>
<html>
<head>
	<title>login Page</title>
    <?php
        require_once "files.php";
    ?>
    <style>
        @media(max-width:520px){
            .card{
                width: 300px;
            }
        }
        @media(min-width:520px) and (max-width:700px){
            .card{
                width: 350px;
            }
        }
        @media(min-width:701px){
            .card{
                width: 400px;
            }
        }
    </style>
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card my-auto shadow">
				<div class="card-header text-center bg-dark text-white">
					<h2>Login form</h2>
				</div>
				<div class="card-body">
					<form action="logindata.php" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" class="form-control" name="email" />
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" class="form-control" name="pass" />
						</div>
						<input type="submit" class="btn btn-dark w-100" value="Login" name="submit">
					</form>
					<a href="tracklogin.php" class="d-flex justify-content-end mt-2">Track Parcel</a>
				</div>
				<div class="card-footer text-right">
					<small>&copy;Rapid Courier Service</small>
				</div>
			</div>
		</div>
	</div>
</body>
</html>