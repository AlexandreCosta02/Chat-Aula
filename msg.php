<?php
	session_start();
	$conexao = new mysqli("localhost","root","152634152634","eulzfuxx_LOGIN");

	if($_POST){
	$sql = 'INSERT INTO tb_msg VALUES (null,"'.$_SESSION['nick'].'","'.$_SESSION['turma'].'","'.$_POST['msg'].'")';

	$resultado = $conexao->query($sql);
	if(!$resultado){
		echo "mensagem não enviada: ".$conexao->error;
	}

	}else{
		$sql = 'SELECT origem, turma, mensagem FROM tb_msg';
		$resultado = $conexao->query($sql);
		while($msg = $resultado->fetch_array()){
		$cor = ($msg['origem'] == $_SESSION['nick']) ? 'meu' : '';
			echo '<b class="'.$cor.'">';
			echo $msg['origem'].":</b> ".$msg['mensagem'];
			echo "<br>";
		}
	}


?>