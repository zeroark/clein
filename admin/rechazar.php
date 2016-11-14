<?php
	$user_id=$_POST['user_id'];
	$mensaje=$_POST['mensaje'];
	require('../inc/conexion.php');
	$query= mysqli_query($conexion, "UPDATE imagenes SET mensaje = '$mensaje' WHERE user_id = '$user_id'");
	$query= mysqli_query($conexion, "UPDATE imagenes SET estado = 'rechazado' WHERE user_id = '$user_id'");

	$razon= mysqli_query($conexion, "SELECT mensaje FROM imagenes WHERE user_id = '$user_id'");
	$razon= mysqli_fetch_assoc($razon);

	$razonRechazo = $razon['mensaje'];

	$userMail= mysqli_query($conexion, "SELECT correoElectronico FROM login WHERE id = '$user_id'");
	$userMail= mysqli_fetch_assoc($userMail);
	$correo= $userMail['correoElectronico'];
	$titulo = 'Solicitud rechazada.';
	$mensaje = 'Su solicitud de inscripción ha sido rechazada. Haga click <a target="_BLANK" href="http://cleinecuador.com/log_in.php">aquí</a> para cargar sus documentos de nuevo.';
	$mensaje = $mensaje.'<br><br><br>'.'<span style="padding:10px;color:red;font-size:18px">'.$razonRechazo.'</span>';
	$sujeto = 'Solicitud Rechazada';
	header("Location:http://cleinecuador.com/admin/Template Mail/olvidocontrasenha.php?titulo=".$titulo."&mensaje=".$mensaje."&correo=".$correo."&sujeto=".$sujeto."&tipoMail=admin");
?>