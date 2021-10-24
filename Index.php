<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chat Etec</title>
		<link rel="stylesheet" href="Css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
		<div id="corpo">
			<header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-6 offset-xs-3 col-sm-6 offset-sm-3 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3 col-xxl-6 offset-xxl-3">
							<div id="dTitulo">
								<img src="Img/etec.jpg">
							</div>
						</div>
					</div>
				</div>
			</header>
			<main>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-4 offset-xs-4 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-lg-4 offset-lg-4 col-xl-4 offset-xl-4 col-xxl-4 offset-xxl-4" id="cNome">
							<form method="POST">
								<label for="edtNomme">Digite seu Nome:</label>
								<input id="edtNomme" type="text" name="nick" class="form-control">
								<br>
								<button>Enviar </button>
							</form>
							<?php
								session_start ();
									if ($_POST){
										$nick = $_POST ['nick'];
										$_SESSION['nick'] =  $nick;
										header('location: chat.php');
										}	
							?>
						</div>
					</div>
				</div>
			</main>
			<footer></footer>
		</div>
	</body>
</html>