<?php

    header('Content-Type: text/html; charset=utf-8');
        
    $db = new mysqli("localhost", "root", "", "financeiro_pessoal");

    $db->query("SET NAMES 'utf8'");
    $db->query('SET character_set_connection=utf8');
    $db->query('SET character_set_client=utf8');
    $db->query('SET character_set_results=utf8');

?>