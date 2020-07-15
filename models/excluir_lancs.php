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


    $sql_back = "SELECT * FROM movimentacoes WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";
    $result3 = $db->query($sql_back);

    $final = array();

    if($result3){
        while ($linha = $result3->fetch_assoc()) {
            $final = array(
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



    if(!$db->error){
        echo json_encode( $final );
    } else {
       echo false;
    }
    


?>