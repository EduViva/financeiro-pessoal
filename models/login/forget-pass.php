<?php

    date_default_timezone_set('America/Sao_Paulo');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../../vendor/autoload.php';

    include './db_login_access.php';
    include './functions.php';

    if(isset($_POST['data'])) { 
        $data = $_POST['data'];

        $email = $data['email'];
        $user = explode("@",$email);
 
        //Checando se e-mail já está cadastrado
        $exists = checkExists($email, $db_secure);

        if($exists){
            $chave = sha1(uniqid( mt_rand(), true));
            
            if ($insert_stmt = $db_secure->prepare("INSERT INTO forget_password (email, chave) VALUES (?, ?)")) {    
                $insert_stmt->bind_param('ss', $email, $chave); 
                // Execute a query preparada.
                $result = $insert_stmt->execute();
                
                if($result){

                    $link = "https://financ-app-pessoal.000webhostapp.com/create-pass.php?key=".$chave."&user=".$email;

                    //Create a new PHPMailer instance
                    $mail = new PHPMailer;

                    //Tell PHPMailer to use SMTP
                    $mail->isSMTP();

                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                    //Set the hostname of the mail server
                    $mail->Host = 'smtp.gmail.com';

                    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                    $mail->Port = 587;

                    //Set the encryption mechanism to use - STARTTLS or SMTPS
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                    //Whether to use SMTP authentication
                    $mail->SMTPAuth = true;

                    //Username to use for SMTP authentication - use full email address for gmail
                    $mail->Username = $email_user;

                    //Password to use for SMTP authentication
                    $mail->Password = $email_pass;

                    //Set who the message is to be sent from
                    $mail->setFrom($email_user, $email_name);

                    //Set an alternative reply-to address
                    $mail->addReplyTo($email_user, $email_name);

                    //Set who the message is to be sent to
                    $mail->addAddress($email, $user[0]);

                    //Set the subject line
                    $mail->Subject = 'Recuperacao de Senha';

                    //Read an HTML message body from an external file, convert referenced images to embedded,
                    //convert HTML into a basic plain-text alternative body
                    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

                    $mail->Body = "Olá ".$user[0]."! Acesse este link para recuperar sua senha $link";

                    //Replace the plain text body with one created manually
                    $mail->AltBody = 'Acesse este link para recuperar sua senha '.$link;

                    //send the message, check for errors
                    if (!$mail->send()) {
                        echo 'exists';
                        echo 'Mailer Error: '. $mail->ErrorInfo;
                    } else {
                        echo 'enviado';
                    }
                    //

                    
                } else {
                    echo 'exists';
                }
            } else {
                echo 'exists';
            }
            
        } else {
            echo 'false';
        }

        
    }

?>