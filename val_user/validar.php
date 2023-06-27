<?php
session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include '../conexion/conn.php';	
			
			$email = $_POST['email']; 
			$password = $_POST['pass'];

			$result1 = mysqli_prepare($conn, "SELECT email, pass, nombre FROM login WHERE email= ?");
    
			mysqli_stmt_bind_param($result1, 's', $email);    

			$insert_value1 = mysqli_stmt_execute($result1);

			$result = mysqli_query($conn, $insert_value1);
						
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = $row['pass'];
			$des = $row['email'];
			$user = $row['nombre'];
			if ($_POST['pass'] == $hash ) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['nombre'];
				mysqli_stmt_close($stmt);
        		mysqli_close($conn);
    		
				echo'<script type="text/javascript">
					window.location.href="../index.html";</script>';
									
			
			} if($_POST['pass'] != $hash) {
				mysqli_stmt_close($stmt);
        		mysqli_close($conn);
    
				echo'<script type="text/javascript"> alert("Conexion fallida, compruebe si el usuario y contraseña estan bien escritas");
				window.location.href="../login/index.html";</script>';			
			}	
			?>
		</div>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>