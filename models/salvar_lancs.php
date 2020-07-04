<?php

require 'dbAccess.php';

$data = $_POST['data'];

$dia = $data['dia'];
$mes = $data['mes'];
$ano = $data['ano'];
$categoria = $data['categoria'];
$descricao = $data['descricao'];
$valor = $data['valor'];

$query = "INSERT INTO `lancamentos` (dia, mes, ano, categoria, descricao, valor) VALUES
('". $dia ."','" . $mes . "','" . $ano . "','" . $categoria . "','" . $descricao . "','" . $valor . "')";


//DECIMAL(M,D), FLOAT(M,D),NUMERIC(M,D),DOUBLE(M,D)

$response = $db->query($query);

if($response){
    echo mysqli_insert_id($db);
} else {
    echo false;
}

?>