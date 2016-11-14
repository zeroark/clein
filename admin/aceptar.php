<?php
	$user_id=$_POST['user_id'];
	require('../inc/conexion.php');
	$query= mysqli_query($conexion, "UPDATE login SET estado = 'pago' WHERE id = '$user_id'");
	$query= mysqli_query($conexion, "UPDATE imagenes SET estado = 'aceptado' WHERE user_id = '$user_id'");
	$userMail= mysqli_query($conexion, "SELECT correoElectronico FROM login WHERE id = '$user_id'");
	$userMail= mysqli_fetch_assoc($userMail);
	$correo= $userMail['correoElectronico'];
	$titulo = 'Solicitud aceptada!';
	$mensaje = 'Su solicitud de inscripción ha sido aceptada. Haga click <a target="_BLANK" href="http://cleinecuador.com/log_in.php">aquí</a> para realizar el pago de su inscripción.';
	$sujeto = 'Solicitud Aceptada';
	header("Location:http://cleinecuador.com/admin/TemplateMail/olvidocontrasenha.php?titulo=".$titulo."&mensaje=".$mensaje."&correo=".$correo."&sujeto=".$sujeto."&tipoMail=admin");
?>