<?php

include("..\Comandos\conexao.php");

$codigo = $_POST['txtid'];
$nome = $_POST['txtnome'];
$endereco = $_POST['txtendereco'];
$bairro = $_POST['txtbairro'];
$complemento = $_POST['txtcomplemento'];
$cidade = $_POST['txtcid'];
$estado = $_POST['txtestado'];
$cep = $_POST['txtcep'];
$email = $_POST['txtemail'];
$cpf = $_POST['txtcpf'];
$rg = $_POST['txtrg'];

$sqlupdate = "update cliente set nome='$nome', endereco='$endereco', bairro='$bairro', 
complemento='$complemento', cidade='$cidade', estado='$estado', cep='$cep', email='$email',
cpf='$cpf', rg='$rg' where id=$codigo";

$resultado = @mysqli_query($conexao, $sqlupdate);
if (!$resultado) {
    echo '<input type="button" onclick="window.location=' . "'Index.php'" . ';" value="Voltar">';
    die('<b>Query Inválida: </b>' . @mysqli_error($conexao));
} else {
    echo "Registro Atualizado com Sucesso";
}
mysqli_close($conexao);
?>

<input type='button' onclick="window.location='../Consultas/ListaClientes.php';" value="Voltar">