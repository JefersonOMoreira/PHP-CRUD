<?php

include("..\Comandos\conexao.php");

$cod_forn = $_POST['txtfornecedor'];
$obs = $_POST['txtobs'];

$compra = "insert into compra values ( 0, '$cod_forn',now(), '$obs')";
$resultado = @mysqli_query($conexao, $compra);

if (!$resultado) {
    die('Query Inválida: ' .@mysqli_error($conexao));

} else {
    header('Location:..\Tela\PDV.php');
}