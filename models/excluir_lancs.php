<?php

    require 'dbAccess.php';

    $data = $_POST['data'];

    $id_lanc = $data['id'];
    $categoria = $data['categoria'];
    $valor = $data['valor'];
    $mes = $data['mes'];
    $ano = $data['ano'];
    $user = $data['user'];

    $sql_lanc = "DELETE FROM `lancamentos` WHERE `id_lancamentos`=". $id_lanc ." AND `id_usuario`=". $user;

    $result = $db->query($sql_lanc);


    $sql_mov = "UPDATE `movimentacoes` SET `".$categoria."`= `".$categoria."` - ".$valor." WHERE `mes`=".$mes." AND `ano`=".$ano." AND `id_usuario`=". $user;

    $result2 = $db->query($sql_mov);

    if($result2){
        echo $result;
        echo "---";
        echo $result2;

    } else {
       echo false;
    }
    


?>