<?php

    include 'db_login_access.php';

    // A senha em hash do formulário
    $password = $_POST['p'];
    //$username = join("-",explode(" ",$_POST['nome']));
    $username = str_replace(" ","-",preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($_POST['nome']))));
    $email = $_POST['email'];
    $wrongPass = $_POST['password'];
    $result = "";
    
    // Cria um salt randômico
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    
    // Cria uma senha pós hash (Cuidado para não re-escrever)
    $password = hash('sha512', $password.$random_salt);

    // Adicione sua inserção ao script de base de dados aqui 
    // Certifique-se de utilizar declarações preparadas
    if ($insert_stmt = $db_secure->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {    
        $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt); 
        // Execute a query preparada.
        $result = $insert_stmt->execute();
    }

    header('location: ../login2.php?register='.$result);

?>