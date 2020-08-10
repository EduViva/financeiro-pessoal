<?php

    include './db_login_access.php';
    include './functions.php';

    if(isset($_POST['data'])) { 
        $data = $_POST['data'];

        $email = $data['email'];
        $pass = $data['pass'];
        $key = $data['key'];
        
        //Deletando a requisição de senha para não ser usada novamente
        
        if($stmt = $db_secure->prepare("DELETE FROM `forget_password` WHERE email= ? AND chave= ?")){
            $stmt->bind_param('ss', $email, $key);
            $result1 = $stmt->execute();
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
                
                if($result){
                    $response = array("success" => true);
                } else {
                    $response = array("success" => false, "message" => 'Ops! Algo inesperado aconteceu');
                }
            } else {
                $response = array("success" => false, "message" => 'Ops! Algo inesperado aconteceu');
            }
        } else {
            $response = array("success" => false, "message" => 'Ops! Credenciais inválidas');
        }
    } else {
        $response = array("success" => false, "message" => 'Ops! Credenciais inválidas');
    }

    echo json_encode($response);

?>