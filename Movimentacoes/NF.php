<?php
include("..\Comandos\conexao.php");
function listarFornecedores($conexao)
{
    $listadefornecedores = array();
    $resultado = mysqli_query($conexao, "select * from fornecedor order by razaosocial");
    while ($fornecedor = mysqli_fetch_assoc($resultado)) {
        array_push($listadefornecedores, $fornecedor);
    }
    return $listadefornecedores;
}
$listaforn = listarFornecedores($conexao);
?>

<html lang="en">

<head>
    <title>Compra</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="Style.css" rel="stylesheet" type="text/css">
</head>

<body>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="Index.html"><img src="../img/logo2.svg" height="35px" width="115px"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../Tela/Index.php"> Home </a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Cadastros <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Cadastros/Cad_Cli.php"> Clientes </a></li>
                        <li><a href="../Cadastros/Cad_Prod.php"> Produtos </a></li>
                        <li><a href="../Cadastros/Cad_Forn.php"> Fornecedores </a></li>
                        <li><a href="../Cadastros/Cad_Usu.php"> Usuários </a></li>
                    </ul>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Movimentações <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../Movimentacoes/NF.php">Nota Fiscal Entrada</a></li>
                        <li><a href="../Movimentacoes/NFVendas.php">Vendas</a></li>
                        <li><a href="../Movimentacoes/NFAcer.php">Acerto de Estoque</a></li>
                    </ul>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Consultas <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../Consultas/ListaClientes.php">.....</a></li>
                            <li><a href="Cons....html">.....</a></li>
                        </ul>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Relatórios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="Rel....html"> ..... </a></li>
                                <li><a href="Rel....html"> ..... </a></li>
                            </ul>
                            <li><a href="Sair.html">Sair</a></li>
        </div>
    </div>
</nav>

    <br>
    <h2>
        <p style="font-size:30px" align="center"> Compra de Produtos
    </h2>
    <form method="post" action="..\Comandos\Cad_Compra.php">
        <div style="font-size:30px" class="form-group"> Fornecedores 
        <select style="font-size:30px" class="form-control" name="txtfornecedor">
        <?php foreach ($listaforn as $forn) { ?>
        $forn['razaosocial'] ?> </option>
    <?php } ?>
        </select>
        Observação
        <input style="font-size:30px" class="form-control" type="text" name="txtobs">
        <br>
        <input type="submit" name="btncal" style="width: 70px;height: 30px;" value="Iniciar Compra">
        <input type="button" value="Voltar" onclick="javascript:location.href='..\Tela\PDV.php';" />
        </form>