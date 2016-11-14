<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);


		
	//$titulo = $_GET['titulo'];
	//$mensaje = $_GET['mensaje'];
	//$correo = $_GET['correo'];
	//$sujeto = $_GET['sujeto'];

	class MandarMail {
		function mandar($titulo, $mensaje, $correo, $sujeto) {
			$body = '<html> <head> <title></title> <meta charset="utf-8" /> </head> <body bgcolor="#070f1a" style="background-color: #070f1a"> <div style="background-color:#070f1a;padding:10px 0px;"> <table cellpadding="0" cellspacing="0" width="100%"> <tbody> <tr> <td align="center"> <table cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;" width="600"> <tbody> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tbody> <tr> <td style="border-bottom: solid 1px #182e53;padding-left:10px"><img alt="logox200.gif" src="http://cleinecuador.com/images/logo.png" /></td> <td valign="top"> <div style="background-color:#182e53"> <div style="padding-top:10px;padding-right:15px;padding-bottom:10px;padding-left:15px;text-align:right;"><span style="color:#FFFFFF;font-size:14px;font-family:Helvetica, Arial, sans-serif;"></span></div> <div style="padding-top:30px;padding-bottom:5px;text-align:right"><a target="_BLANK" href="http://cleinecuador.com/tematica.php" style="text-decoration:none;"><span style="display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:20px;color:#FFFFFF;padding-top:0px;padding-right:20px;padding-bottom:0px;padding-left:0px;">Temática</span></a><a target="_BLANK" href="http://cleinecuador.com/cronograma.php" style="text-decoration:none;"><span style="display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:20px;color:#FFFFFF;padding-top:0px;padding-right:20px;padding-bottom:0px;padding-left:0px;">Cronograma</span></a><a target="_BLANK" href="http://cleinecuador.com/contacto.php" style="text-decoration:none;"><span style="display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:20px;color:#FFFFFF;padding-top:0px;padding-right:15px;padding-bottom:0px;padding-left:0px;">Contacto</span></a></div> </div> </td> </tr> </tbody> </table> </td> </tr> <tr> <td> <div style="height:10px;background-color:#FFFFF;">&nbsp;</div> <h4 style="padding:10px;color:#182e53">'.$titulo.'</h4> <span style="padding:10px"> '.$mensaje.'</span> <div style="height:180px;background-color:#FFFFF;">&nbsp;</div> </td> </tr> <tr> <td> <div style="margin:0px;background-color:#182e53;padding:15px;color:#FFFFFF;font-family:Helvetica, Arial, sans-serif;"> <table bgcolor="#182e53" border="0" cellpadding="0" cellspacing="0" style="width:100%;"> <tbody> <tr> <td align="center"> <table border="0" cellpadding="0" cellspacing="0" style="padding-top:10px;"> <tbody> <tr> <td style="padding-right:15px;"><strong>CLEIN Paraguay - 2015</strong></td> <td><a target="_BLANK" href="https://www.facebook.com/Aleiiaf.Paraguay" style="display:block;padding:0px 5px;text-decoration:none;">Facebook</a></td> </tr> </tbody> </table> </td> </tr> <tr> <td style="text-align:center;padding:10px;color:#FFFFFF;">Tel: +595981353560 | Dirección: Tte. Mellones 1506 Barrio los Laureles.</td> </tr> </tbody> </table> </div> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </div> </body> </html>';
			$mailvariables= array('({titulo})' => $titulo, '({mensaje})' => $mensaje);
			$mail = new PHPMailer;
			$mail->CharSet = "UTF-8";
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = MAIL_SERVER_HOST;
			$mail->Port = MAIL_SERVER_PORT;
			$mail->SMTPAuth = true;
			$mail->Username = MAIL_SERVER_USER;
			$mail->Password = MAIL_SERVER_PASS;
			$mail->setFrom(CONTACT_MAIL,'Info Clein');
			$mail->addReplyTo(CONTACT_MAIL,'Info Clein');
			$mail->addAddress($correo);
			$mail->Subject = $sujeto;
			$mail->Body = $body;
			$mail->IsHTML(true);  
			//$mail->msgHTML(preg_replace(array_keys($mailvariables), array_values($mailvariables), file_get_contents('http://cleinecuador.com/admin/Template Mail/index.php')), dirname(__FILE__));
			$mail->send(); 
		}
	}

	
	
		
	
?>
