<?php

require 'dbAccess.php';

$data = $_POST['data'];

$mes = $data['month'];
$ano = $data['year'];
$user = $data['user'];


$sql = "SELECT * FROM lancamentos WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";

$result = $db->query($sql);

$final1 = array();

if($result){
    while ($linha = $result->fetch_assoc()) {
            $final1['lancamento-'.$linha['id_lancamentos']] = array(
                'id' => $linha['id_lancamentos'],
                'dia' => $linha['dia'],
                'mes' => $linha['mes'],
                'ano' => $linha['ano'],
                'categoria' => $linha['categoria'],
                'descricao' => $linha['descricao'],
                'valor' => $linha['valor'] 
            );
    }
}


$sql = "SELECT * FROM movimentacoes WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";

$result = $db->query($sql);

$final2 = array();

if($result){
    while ($linha = $result->fetch_assoc()) {
        $final2 = array(
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


if($final1){
    if($final2){
        $return = array('lancamentos' => $final1, 'movimentacoes' => $final2);
        echo json_encode( $return );
    } else {
        echo json_encode( $final1 );
    }
} else {
    echo false;
}


?>