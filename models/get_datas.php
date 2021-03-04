<?php

    require 'dbAccess.php';

    $data = $_POST['data'];

    $mes = $data['month'];
    $ano = $data['year'];
    $user = $data['user'];


    // $sql = "SELECT * FROM lancamentos WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";
    // $result = $db->query($sql);

    //se o mês for "todos" executa a busca sem filtro de mês, somente por ano
    if($mes === "todos"){
        $sql = "SELECT * FROM lancamentos WHERE ano='".$ano."' AND id_usuario='" .$user."'";
    } else {
        $sql = "SELECT * FROM lancamentos WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";
    }
    
    $result = $db->query($sql);

    $final1 = array();

    $lanc_err = $db->error;

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

    if($mes === "todos"){
        $sql = "SELECT * FROM movimentacoes WHERE ano='".$ano."' AND id_usuario='" .$user."'";
    } else {
        $sql = "SELECT * FROM movimentacoes WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";
    }

    $result = $db->query($sql);

    $final2 = array();

    if($result){
        while ($linha = $result->fetch_assoc()) {
            $final2['mes-'.$linha['mes']] = array(
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

    //Checando se existe uma linha vazia em movimentações para não retorná-la
    //Porque quando todos lançamentos do mês são excluidos, a linha continua lá
    $count = 0;
    foreach ($final2 as $key => $value){
        if($final2[$key] == "0.00"){
            $count++;
        }
    }

    if(!$lanc_err && !$db->error){
        if($final2 && $count < 6){
            $return = array('lancamentos' => $final1, 'movimentacoes' => $final2);
            echo json_encode( $return );
        } else {
            echo "noReturn";
        }
    } else {
        echo false;
    }


?>