<?php

    include './db_login_access.php';
    include './functions.php';

    if(isset($_POST['data'])) { 
        $data = $_POST['data'];

        $email = $data['email'];
        $pass = $data['pass'];
        $key = $data['key'];
        echo "DELETE FROM `forget_password` WHERE email=$email AND chave=$key";
        //Deletando a requisição de senha para não ser usada novamente
        
        if($stmt = $db_secure->prepare("DELETE FROM `forget_password` WHERE email= ? AND chave= ?")){
            $stmt->bind_param('ss', $email, $key);
            $result1 = $stmt->execute();
            echo $result1;
        } else {
            echo var_dump($db_secure->error_list);
        }



        //Checando se e-mail já está cadastrado
        $exists = checkExists($email, $db_secure);

        if($exists){

            // Cria um salt randômico
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            
            // Cria uma senha pós hash (Cuidado para não re-escrever)
            $pass = hash('sha512', $pass.$random_salt);
            
            if ($insert_stmt = $db_secure->prepare("UPDATE members SET password= ?, salt= ? WHERE email= ?")) {    
                $insert_stmt->bind_param('sss', $pass, $random_salt, $email); 
                // Execute a query preparada.
                $result = $insert_stmt->execute();
                echo $result;
                
                if($result){
                    echo 'true';
                } else {
                    echo 'error';
                }
            } else {
                echo 'error';
            }
            
        } else {
            echo 'credentials';
        }
        
    } else {
        echo 'credentials';
    }

?>