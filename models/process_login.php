<?php

    include 'db_login_access.php';
    include 'functions.php';
    sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php. 

    if(isset($_POST['email'], $_POST['p'])) { 
        $email = $_POST['email'];
        $password = $_POST['p']; // A senha em hash.
        if(login($email, $password, $db_secure) == true) {
            // Login com sucesso
            echo 'Sucesso: Você efetuou login.';
        } else {
            // Falha de login
            header('Lozalização: ./login.php?error=1');
        }
    } else { 
        // As variáveis POST corretas não foram enviadas para esta página.
        echo 'Requisição Inválida';
    }

?>