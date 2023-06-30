<?php 
	if(isset($_POST['enviar'])) {
        if(!empty($_POST['name']) && !empty ($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['email'])) {
            $name = $_POST['name'];
            $asunto = $_POST['asunto'];
            $msg = $_POST['msg'];
            $msg.= "el correo del remitente es: ".$_POST['email'];
            $header = "From: noreply@example.com" . "\r\n";
            $header.="Reply-To: noreply@example.com" . "\r\n";
            $header.="X-Mailer: PHP/". phpversion();
            $mail = @mail("stephentapia10@gmail.com", $asunto, $msg, $header);
            if ($mail) {
                echo '<script type="text/javascript"> alert("Mail enviado exitosamente, en los proximos 5 dias habiles le responderemos");
				window.location.href="../index.html";</script>';
            }
        }
    }
?>