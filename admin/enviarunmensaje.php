<?php
	$user_id=$_POST['user_id'];
	require('../inc/conexion.php');
	$userMail= mysqli_query($conexion, "SELECT correoElectronico FROM login WHERE id = '$user_id'");
	$userMail= mysqli_fetch_assoc($userMail);
	$correo= $userMail['correoElectronico'];
	$titulo = $_POST['titulo'];
	$mensaje = $_POST['mensaje'];
	$sujeto = $_POST['sujeto'];
	header("Location:http://cleinecuador.com/admin/Template Mail/olvidocontrasenha.php?titulo=".$titulo."&mensaje=".$mensaje."&correo=".$correo."&sujeto=".$sujeto."&tipoMail=usuarios");
?>