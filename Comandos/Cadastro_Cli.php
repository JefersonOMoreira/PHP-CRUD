<?php
include("..\Comandos\conexao.php"); 

$nome = $_POST['txtnome'];
$cpf = $_POST['txtcpf'];
$rg = $_POST['txtrg'];
$email = $_POST['txtemail'];
$endereco = $_POST['txtendereco'];
$complemento = $_POST['txtcomplemento'];
$bairro = $_POST['txtbairro'];
$cidade = $_POST['txtcid'];
$estado = $_POST['txtestado'];
$cep = $_POST['txtcep'];

$sqlinsert = "insert into cliente values(0,'$nome','$cpf','$rg','$email','$endereco','$complemento','$bairro','$cidade','$estado','$cep')";

$resultado = @mysqli_query($conexao, $sqlinsert);
if (!$resultado) {
    die('Query Inválida: ' . @mysqli_error($conexao));
} else {
    echo "Cliente cadastrado com sucesso!";
}
mysqli_close($conexao);
?>
<br><br>
<input type='button' onclick="window.location='../Cadastros/Cad_Cli.php';" value="Voltar">