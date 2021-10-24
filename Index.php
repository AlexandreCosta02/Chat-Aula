<form method="POST">
	Digite seu nick:
	<input type="text" name="nick">
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