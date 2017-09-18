<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require "PHPMailer/PHPMailerAutoload.php";

if($_POST){

   $nome= $_POST['Nome'];
   $email = $_POST['Email'];
   $telefone = $_POST['Telefone'];
   $onde = $_POST['Onde'];
   $mensagem = $_POST['Mensagem'];
   $origem = $_POST['Origem'];

   // Inicia a classe PHPMailer
   $mail = new PHPMailer();

   $mail->IsSMTP(); // Define que a mensagem será SMTP
   $mail->Host = "smtp.zoho.com"; // Endereço do servidor SMTP
   $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
   $mail->Username = 'noreply@sortsistemas.com.br'; // Usuário do servidor SMTP
   $mail->Password = 'noreply123@'; // Senha do servidor SMTP
   $mail->Port = 587;
   $mail->SMTPSecure = 'tls';
   $mail->Mailer = 'email-smtp.us-east-1.amazonaws.com';

   $mail->From = "contato@sortsistemas.com.br"; // Seu e-mail
   $mail->FromName = "Sort Sistemas"; // Seu nome

   $mail->AddAddress('contato@sortsistemas.com.br', 'Contato Sort Sistemas');

   $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
   $mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

   $mail->Subject  = "Novo contato no site ".$origem; // Assunto da mensagem
   $mail->Body = 'Houve um novo contato no site '.$origem.':<br /><br />
      Nome: '.$nome.'<br />
      Email: '.$email.'<br />
      Telefone: '.$telefone.'<br />
      Onde conheceu: '.$onde.'<br />
      Mensagem: '.$mensagem;

   $enviado = $mail->Send();

   // Limpa os destinatários e os anexos
   $mail->ClearAllRecipients();
   $mail->ClearAttachments();

   // Exibe uma mensagem de resultado
   if ($enviado) {
   //header("Location:/../livros/view/formAluno.php");
      echo 'Enviado com sucesso!';

   } else {
      echo "Não foi possível enviar o e-mail.<br /><br />";
      echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;

   }

}else{
   echo "nada para enviar";
}
