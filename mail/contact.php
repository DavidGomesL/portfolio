<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(500);
    exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "davidgomes1194@gmail.com"; // Troque para o seu e-mail
$subject = "$m_subject:  $name";
$body = "Você recebeu uma nova mensagem do seu formulário de contato.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nEmail: $email\n\nAssunto: $m_subject\n\nMensagem: $message";
$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";	

if(!mail($to, $subject, $body, $header)) {
    http_response_code(500);
}
?>
