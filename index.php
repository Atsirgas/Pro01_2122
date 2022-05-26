<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="./img/JPG.png">
	<link rel="stylesheet" href="./css/styles.css">
	<script type="text/javascript" src="./validacion-login.js"></script>  
    <title>Login</title>
</head>
<body>
<header id="portada">
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container transition">
						<img src="./img/JPG.png" class="brand_logo transition" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="./view/proc_login.php" method="post" enctype="multipart/form-data" onsubmit="return validaFormulario();">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="correo" id="email" class="form-control input_user color" placeholder="exemple@jpg.com">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="psw" id="password" class="form-control input_pass color" placeholder="password">
						</div>
						<br>
						<div class="form-group">								
							<div class="custom-control custom-checkbox">
							<input class="radio" type="radio" name="tipo" id="Administrador" value="Administrador" /> Admin/Secretari/a
        					<input class="radio" type="radio" name="tipo" id="Profesor" value="Profesor" /> Professor<br><br>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 				<button type="submit" name="button" class="btn login_btn">Login</button>
				   			</div>
					</form>
				</div>
		
			</div>
		</div>
	</div>

    </header>
    
</body>
</html>