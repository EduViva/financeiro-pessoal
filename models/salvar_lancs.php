<?php

    require 'dbAccess.php';

    $data = $_POST['data'];

    $cat_mov = $data['save_cat'];
    $val = $data['save_val']; 

    $dia = $data['dia'];
    $mes = $data['mes'];
    $ano = $data['ano'];
    $categoria = $data['categoria'];
    $descricao = $data['descricao'];
    $user = $data['id_user'];

    $saved = 0;

    $query = "INSERT INTO `lancamentos` (dia, mes, ano, categoria, descricao, valor, id_usuario) VALUES
    ('". $dia ."','" . $mes . "','" . $ano . "','" . $categoria . "','" . $descricao . "','" . $val . "','" . $user . "')";

    $response = $db->query($query);

    if($response){
        
        $saved = $saved + 1;
        $id_lanc = mysqli_insert_id($db);

        $busca = "SELECT * FROM `movimentacoes` WHERE `mes`=". $mes ." AND `ano`=". $ano ." AND `id_usuario`=". $user;
        $retBusca = $db->query($busca);

        if($retBusca->num_rows != 0){
            $sql = "UPDATE `movimentacoes` SET `".$cat_mov."`= `".$cat_mov."` + ".$val." WHERE `mes`=".$mes." AND `ano`=".$ano." AND `id_usuario`=". $user;
        } else {
            $sql = "INSERT INTO `movimentacoes` (mes, ano, " . $cat_mov . ", id_usuario) VALUES 
            ('" . $mes . "','" . $ano . "','" . $val_mov . "','" . $user . "')";
        }
        
        $mov_response = $db->query($sql);

        if($mov_response){
            $saved = $saved + 1;
        }

    }

    if($saved == 2){

        $sql = "SELECT * FROM `movimentacoes` WHERE `mes`=". $mes ." AND `ano`=". $ano ." AND `id_usuario`=". $user;
        
        $result = $db->query($sql);

        $final2 = array();

        if($result){
            while ($linha = $result->fetch_assoc()) {
                $final2 = array(
                    'id_lanc' => $id_lanc,
                    'id' => $linha['id_movimentacoes'],
                    'renda' => $linha['renda'],
                    'essenciais' => $linha['essenciais'],
                    'n_essenciais' => $linha['n_essenciais'],
                    'torrar' => $linha['torrar'],
                    'investimentos' => $linha['investimentos'],
                    'caixa' => $linha['caixa'] 
                );  
            }
        }

        echo json_encode( $final2 );

    } else {
        echo false;
    }

?>