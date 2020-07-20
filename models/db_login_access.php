<?php
        
    header('Content-Type: text/html; charset=utf-8');
        
    $db_secure = new mysqli("localhost", "sec_user", "Th7HN87AacBtgRsM", "financeiro_login");

    $db_secure->query("SET NAMES 'utf8'");
    $db_secure->query('SET character_set_connection=utf8');
    $db_secure->query('SET character_set_client=utf8');
    $db_secure->query('SET character_set_results=utf8');

?>