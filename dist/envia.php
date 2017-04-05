<?php 

require('./phpmailer/PHPMailerAutoload.php');

$resp = new stdclass();

try {

	$emailenvia = 'vendas@cenattiincorporadora.com.br';
	$assunto = 'Formulário de contato Viva Vernazza';
	$url = 'http://vivavernazza.com.br/';

	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];

	$body = "$mensagem\n\n---------------------------\n\n$nome - $telefone\n$email";

	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	$mail->WordWrap = 70;
	$mail->addAddress("contato@doubleweb.com.br");
	$mail->From = $email;
	$mail->FromName = $nome;
	$mail->AddReplyTo($email,$nome);
	$mail->Subject = $assunto;
	$mail->Body = $body;

	if(!$mail->send()) throw new Exception("ERRO FATAL", 1);

	$resp->success = true;
	$resp->msg = "Formulário enviado com sucesso.";
} catch (Exception $e) {
	$resp->success = false;
	$resp->msg = $e->getMessage();
}
echo json_encode($resp, JSON_HEX_QUOT);