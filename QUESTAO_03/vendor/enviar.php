<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


//verifica se o form foi enviado
if($_SERVER["REQUEST_METHOD"]=="POST"){

    //Load Composer's autoloader
    require '../vendor/autoload.php';

    //obtem os dados enviados

    $email = htmlspecialchars($_POST["email"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    if(empty($nome) || empty($mensagem)) {
        $_SESSION['error_message'] = "Por favor, preencha todos os campos.";
    } else {
    //validando endereço de email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
    $mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'danilo.martins333326@gmail.com';//trocar para seu email                     //SMTP username
    $mail->Password   = 'sua senha';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    //email do remetente
    $mail->setFrom($email, $nome);
    $mail->addAddress($email);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, $nome);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('../img/logo-construsite-new.png', name: "Construsite-Logo");         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    //definindo assunto
    $mail->Subject = "Mensagem enviada por " . $nome; 
    //definindo a mensagem
    $mail->Body    = $mensagem;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //chamando a funcao de envio
    $mail->send();
    $_SESSION['success_message'] = 'Email enviado com sucesso!';
}catch (Exception $e) {
    $_SESSION['error_message'] = "O email não pôde ser enviado. Erro do Mailer: {$mail->ErrorInfo}";
    echo $_SESSION['error_message'];
}
}else{
    $_SESSION['error_message'] = "O email $email é inválido.";
}
    }
} else {
    $_SESSION['error_message'] = "Erro no envio do formulário.";
}

//Create an instance; passing `true` enables exceptions

header("Location: ../index.php");
exit;
?>