<?php
include("..\Comandos\conexao.php");
$consulta1 = "SELECT max(id) as id FROM venda";
$con = @mysqli_query($conexao, $consulta1) or die($mysqli->error);
$dado = mysqli_fetch_array($con);

$id_venda = $dado['id'];
$cod = $_POST['txtcod'];
$prod = $_POST['txtprod'];
$qtd = $_POST['txtqtd'];

$constulaProd = "SELECT preco as preco FROM produto where id = $prod";
$conProd = @mysqli_query($conexao, $consultaProd) or die ($mysqli -> error);
$dadoProd = mysqli_fetch_array($conProd);

$preco = $dadoProd['preco'] * $qtd;
$estoque = "insert into itens_venda values (0, '$id_venda' , '$prod', $qtd, '$preco')";
$resultado = @mysqli_query($conexao, $estoque);

if (!$resultado) {
    die('Query Inválida: ' . @mysqli_error($conexao)); 
} else {
    header('Location:..\Tela\PDV.php');
}
mysqli_close($conexao);