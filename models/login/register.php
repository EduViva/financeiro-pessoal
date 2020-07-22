<?php

    include './db_login_access.php';
    include './functions.php';

    if(isset($_POST['data'])) { 
        $data = $_POST['data'];

        $username = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        
        //Checando se e-mail já está cadastrado
        $exists = checkRegister($email, $db_secure);

        if($exists){
            $response = array(
                'exist' => true,
                'mail' => $email
            );
        } else {
            $username = str_replace(" ","-",preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($username))));

            $result = "";
    
            // Cria um salt randômico
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            
            // Cria uma senha pós hash (Cuidado para não re-escrever)
            $password = hash('sha512', $password.$random_salt);

            if ($insert_stmt = $db_secure->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {    
                $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt); 
                // Execute a query preparada.
                $result = $insert_stmt->execute();
            }

            if($result == 1){
                $response = array(
                    'exist' => false,
                    'mail' => $email,
                );
            } else {
                $response = array(
                    'error' => 1
                );
            }
            
        }
        echo json_encode( $response );
    }

?>