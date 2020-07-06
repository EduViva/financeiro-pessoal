<?php

require 'dbAccess.php';

$data = $_POST['data'];

$dia = $data['dia'];
$mes = $data['mes'];
$ano = $data['ano'];
$categoria = $data['categoria'];
$descricao = $data['descricao'];
$valor = $data['valor'];
$user = $data['id_user'];

$query = "INSERT INTO `lancamentos` (dia, mes, ano, categoria, descricao, valor, id_usuario) VALUES
('". $dia ."','" . $mes . "','" . $ano . "','" . $categoria . "','" . $descricao . "','" . $valor . "','" . $user . "')";


$response = $db->query($query);

if($response){
    echo mysqli_insert_id($db);
} else {
    echo false;
}

?>