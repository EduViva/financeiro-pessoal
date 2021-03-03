<?php
    
    require 'dbAccess.php';

    $data = $_POST['data'];

    $mes = $data['month'];
    $ano = $data['year'];
    $user = $data['user'];

    //se o mês for "todos" executa a busca sem filtro de mês, somente por ano
    if($mes === "todos"){
        $sql = "SELECT * FROM lancamentos WHERE ano='".$ano."' AND id_usuario='" .$user."'";
    } else {
        $sql = "SELECT * FROM lancamentos WHERE mes='".$mes."' AND ano='".$ano."' AND id_usuario='" .$user."'";
    }
    
    $result = $db->query($sql);

    $final1 = array();

    $lanc_err = $db->error;

    //Cria um array com os resultados e bota cada resultado em um objeto com o nome "lançamento-id"
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

    if(!$db->error){
        if($final1){
            echo json_encode($final1);
        } else {
            echo "noReturn";
        }
    } else {
        echo false;
    }
?>