<?php
session_start();
if(!isset($_SESSION['nick'])){
	header('location: index.php');
}
$conexao = new mysqli("localhost","root","usbw","chat");

?>
<style>
	.chat{
		width: 80vw;
		height: 70vh;
		margin-top: 5vh;
		margin-left: 10vw;
		border:1px solid red;
	}
	.meu{
		color:red;
	}
</style>
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