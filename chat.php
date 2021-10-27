<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Chat Etec</title>
		<link rel="stylesheet" href="Css/chat.css">
		<meta name="viewport" content="width=device-width, maximum-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	<body>
	<?php
		session_start();
		if(!isset($_SESSION['nick','turma'])){
			header('location: index.php');
		}
		$conexao = new mysqli("localhost","root","152634152634","eulzfuxx_LOGIN");
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
		Mensagem:
		<textarea name="msg" id="msg"></textarea>
		<button>Enviar</button>
	</form>
	<?php

	?>
	</body>
</html>