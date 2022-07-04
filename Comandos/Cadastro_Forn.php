<?php
include("..\Comandos\conexao.php"); 

$razao = $_POST['txtrazao'];
$cnpj = $_POST['txtcnpj'];
$inscriest = $_POST['txtinscriest']; 
$email = $_POST['txtemail'];
$endereco = $_POST['txtendereco'];
$complemento = $_POST['txtcomplemento'];
$bairro = $_POST['txtbairro'];
$cidade = $_POST['txtcid'];
$estado = $_POST['txtestado'];
$cep = $_POST['txtcep'];

$sqlinsert = "insert into cliente values(0,'$razao','$cnpj','$inscriest','$email','$endereco','$complemento','$bairro','$cidade','$estado','$cep')";

$resultado = @mysqli_query($conexao, $sqlinsert);
if (!$resultado) {
    die('Query Inválida: ' . @mysqli_error($conexao));
} else {
    echo "Fornecedor Cadastrado com Sucesso!";
}
mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='../Cadastros/Cad_Forn.php';" value="Voltar">