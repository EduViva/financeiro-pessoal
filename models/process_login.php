<?php

    include 'db_login_access.php';
    include 'functions.php';
    sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php. 

    if(isset($_POST['email'], $_POST['p'])) { 
        $email = $_POST['email'];
        $password = $_POST['p']; // A senha em hash.
        if(login($email, $password, $db_secure) == true) {
            // Login com sucesso
            header('location: ../lancar2.php');
        } else {
            // Falha de login
            header('location: ../login2.php?errorLogin=1');
        }
    } else { 
        // As variáveis POST corretas não foram enviadas para esta página.
        echo 'Requisição Inválida';
    }

?>