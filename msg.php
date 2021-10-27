<?php
	session_start();
	$conexao = new mysqli("localhost","root","usbw","chat");

	if($_POST){
	$sql = 'INSERT INTO msg VALUES (null,"'.$_SESSION['nick'].'","'.$_POST['msg'].'")';

	$resultado = $conexao->query($sql);
	if(!$resultado){
		echo "mensagem não enviada: ".$conexao->error;
	}

	}else{
		$sql = 'SELECT origem, mensagem FROM msg';
		$resultado = $conexao->query($sql);
		while($msg = $resultado->fetch_array()){
		$cor = ($msg['origem'] == $_SESSION['nick']) ? 'meu' : '';
			echo '<b class="'.$cor.'">';
			echo $msg['origem'].":</b> ".$msg['mensagem'];
			echo "<br>";
		}
	}


?>