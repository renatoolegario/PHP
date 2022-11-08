<?php

require_once('../bibliotecas/04-PhpMailer/PHPMailer.php');
require_once('../bibliotecas/04-PhpMailer/SMTP.php');
require_once('../bibliotecas/04-PhpMailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// recebe as variaveis via POST
$email          = $_POST['email'];
$nome           = $_POST['nome'];
$sobrenome      = $_POST['sobrenome'];
$senha          = $_POST['senha'];

$titulo_email 	= $_POST['titulo_email'];

//abaixo configurações do servidor que será o responsavel pelo envio pode ser enviado via POST também ai se cria uma API
$smtp_de_envio = 'smtp.hostinger.com';
$nome_do_usuario = 'Renato Olegario';
$email_de_envio = 'renato@multiplasfr.com.br';
$senha_email 	= 'SenhaDeEnvio';
$porta_envio	= 465;


$mail = new PHPMailer(true);
$mail->SetLanguage('br');
$mail->CharSet='UTF=8';
$mail->isSMTP();
$mail->Host = $smtp_de_envio;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';              // sets the prefix to the servier
$mail->Username = $email_de_envio;
$mail->Password = $senha_email;
$mail->Port = $porta_envio;
$mail->isHTML(true);
$mail->setFrom($email_de_envio,$nome_do_usuario);
$mail->addAddress($email);     
$mail->Subject = $titulo_email;  
$mail->Body = '
			Olá <strong>'.$nome.' '.$sobrenome.'</strong>, seja muito bem vindo.</br>
			Fico feliz que esteja em busca de novos conhecimentos!</br>
			</br>
			E devido a isso, eu irei te entregar uma apostila com mais de 120 truques e dicas que facilitaram o seu dia a dia, economizando tempo e dinheiro.</br>
			Abaixo está o link para acesso das apostila, bons estudos:</br>
			1ª Apostila:<a href="https://www.canva.com/design/DAECm2evnZw/IyqWOMxgczWUkbxAXRw5QA/view?utm_content=DAECm2evnZw&utm_campaign=designshare&utm_medium=link&utm_source=sharebutton" target="_Blank"><strong> VER! </strong></a> </br>
			2ª Apostila:<a href="https://www.canva.com/design/DAECu-DbwtY/BCq5CbwOXMw2Clliz9Osbw/view?utm_content=DAECu-DbwtY&utm_campaign=designshare&utm_medium=link&utm_source=sharebutton" target="_Blank"><strong> VER! </strong> </a></br>
			</br>
			Você também consegue achar ela dentro do painel do Aluno <a href="https://cursos.multiplasfr.com.br/"><strong>clicando aqui!</strong></a>
			</br>	</br>
			
			Seu e-mail de login é: '.$email.' </br>
			Sua senha de acesso é: '.$senha.'</br>
			
				</br>	</br>
			
			Me acompanhe no Youtube temos vários conteúdos que pode te ajudar no seu dia a dia!</br>
			<a href="https://www.youtube.com/channel/UC-Oska3spxiysj45X9TN9dA/playlists?sub_confirmation=1" target="_blank">Ir ao Youtube!</a></br>
			
			</br>
			Obrigado, <strong>Renato Olegário.</strong></br>
			WhatsApp: <strong><a target="_blank" href="https://web.whatsapp.com/send?phone=553492399036&text=Oi%20bom%20dia"> (34) 99239-9036  </a> </strong>
			';        
        
       
       	try {
				$mail->send();
				//echo "Código enviado com sucesso.";
			} catch (Exception $e) {
			    echo "Mailer error: " . $mail->ErrorInfo;
			}
        
      
       

 $msg_retorno = "Cadastro realizado com sucesso!</br> Verifique seu e-mail.";
?>

