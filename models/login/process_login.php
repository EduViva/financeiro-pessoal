<?php

    include './db_login_access.php';
    include './functions.php';
    sec_session_start(); // Nossa segurança personalizada para iniciar uma sessão php. 

    if(isset($_POST['data'])) { 
        $data = $_POST['data'];

        $email = $data['email'];
        $password = $data['password']; // A senha em hash.

        $login_test = login($email, $password, $db_secure);

        echo $login_test;

    } else { 
        // As variáveis POST corretas não foram enviadas para esta página.
        echo 'Requisição Inválida';
    }

?>