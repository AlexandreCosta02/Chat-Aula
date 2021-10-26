<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chat</title>
		<link rel="stylesheet" href="Css/chat.css">
	</head>
	<body>
		
	</body>
</html>

<?php
session_start();
if (!isset($_SESSION['nick'])){
	header('location: Index.php');
}

$conexao = new mysqli("localhost","root","usbw","chat");
?>



<div class="chat">
	<?php
		$sql = 'SELECT origem, mensagem FROM msg';
		$resultado = $conexao->query($sql);
		while ($msg = $resultado->fetch_array()){
			$cor = ($msg['origem'] == $_SESSION['nick']) ? 'meu' : '';
			echo '<b class="'.$cor.'">';
			echo $msg['origem'].":  ".$msg['mensagem'];
			echo "<br>";
		}
		?>
</div>

<form method="POST">
	Mensagem:
	<textarea name="msg"></textarea>
	<button>Enviar</button>
</form>

<?php
if ($_POST){
	$sql = 'INSERT INTO msg VALUES (null,"'.$_SESSION['nick'].'","'.$_POST['msg'].'")';

	$resultado = $conexao->query($sql);

	if (!$resultado){
		echo "Mensagem não enviada: ".$conexao->error;
	}
}
?>