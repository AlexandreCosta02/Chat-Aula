<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Chat Etec</title>
		<link rel="stylesheet" href="Css/chat.css">
		<meta name="viewport" content="width=device-width, maximum-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
	<?php
		session_start();
		if(!isset($_SESSION['nick'])){
			header('location: index.php');
		}
		$conexao = new mysqli("localhost","eulzfuxx_root","152634152634","eulzfuxx_LOGIN");
	?>
	<script src="jquery-3.6.0.min.js"></script>
	<script>
		function buscarmsg(){
			$.ajax({
				url:'msg.php',
				data: null,
				type: 'GET',
				success: function(retorno){
					$('.chat').html(retorno);
				}
			});
		}

		setInterval(function(){
			buscarmsg();
		},2000);

		$(document).on('submit','#enviar',function(e){
			$.ajax({
				url: 'msg.php',
				data: $(this).serialize(),
				type: 'POST',
				success:function(){
					$('#msg').val('');
				}
			});
			e.preventDefault();
		});

	</script>
	<div class="chat">	
		<?php
		
		?>
	</div>
	<form id="enviar">
		<textarea name="msg" id="msg"></textarea>
		<br>
		<button id="btnEnviar" class="fas fa-check"></button>
	</form>
	<?php

	?>
	</body>
</html>