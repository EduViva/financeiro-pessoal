<?php

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
                    
                    //Apenas para fins de teste sem enviar e-mail
                    $link2 = "./create-pass.php?key=".$chave."&user=".$email;
                    echo $link2;

                    /*
                    if( mail($email, 'Recuperação de Senha', 'Olá '.$user[0].', visite este link para recuperar sua senha: </br>'.$link)){
                        echo 'enviado';
                    }
                    */
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