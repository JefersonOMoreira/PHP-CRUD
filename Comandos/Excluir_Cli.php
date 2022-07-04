<?php

include("..\Comandos\conexao.php");

$codigo = $_POST['txtid'];

$sqlupdate = "delete from cliente where id=$codigo";

$resultado = @mysqli_query($conexao, $sqlupdate);
if (!$resultado) {
    echo '<input type="button" onclick="window.location=' . "'Index.php'" . ';" value="Voltar">';
    die('<b>Query Inválida: </b>' . @mysqli_error($conexao));
} else {
    echo "Registro Excluído com Sucesso";
}
mysqli_close($conexao);
?>

<input type='button' onclick="window.location='../Consultas/ListaClientes.php';" value="Voltar">