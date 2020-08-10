<?php
    
    require 'dbAccess.php';

    $data = $_POST['data'];

    $mes = $data['month'];
    $ano = $data['year'];
    $user = $data['user'];

    $sql = "SELECT * FROM lancamentos WHERE id_usuario='" .$user."'";
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

    if(!$db->error){

    } else {
        echo false;
    }
?>