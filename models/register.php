<?php

    include 'db_login_access.php';

    // A senha em hash do formulário
    $password = $_POST['p'];
    $username = $_POST['name'];
    $email = $_POST['email'];
    $wrongPass = $_POST['password'];
    
    // Cria um salt randômico
    $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
    
    // Cria uma senha pós hash (Cuidado para não re-escrever)
    $password = hash('sha512', $password.$random_salt);

    // Adicione sua inserção ao script de base de dados aqui 
    // Certifique-se de utilizar declarações preparadas
    if ($insert_stmt = $db_secure->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {    
        $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt); 
        // Execute a query preparada.
        $insert_stmt->execute();
    }

?>