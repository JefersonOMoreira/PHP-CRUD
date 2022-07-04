<?php
include("..\Comandos\conexao.php");

$consulta1 = "SELECT max(id) as id FROM compra";
$con1 = @mysqli_query($conexao, $consulta1) or die($mysqli->error);
$dado = mysqli_fetch_array($con1);

$id_compra = $dado['id'];
$nome_forn = "select compra.id_forn, fornecedor.razaosocial from compra,
fornecedor where compra.id = $id_compra and compra.id_forn=fornecedor.id";
$fornecedor = @mysqli_query($conexao, $nome_forn) or die ($mysqli->error);
$dado_forn = mysqli_fetch_array($fornecedor);

$consulta = "SELECT produto.descricao, itens_compra.qtd, itens_compra.valor FROM itens_comora,produto
WHERE itens_copra.id_commpra='$id_compra' and itens_compra.id_produto=produto.id";
$con = @mysqli_query($conexao, $consulta) or die (mysqli->error);

$consultaCompraTotal = "SELECT sum(valor) as Total FROM itens_compra where id_compra = $id_compra";
$con = @mysqli_query($conexao, $consulta) or die($mysqli->error):

$consultaCompraTotal = "SELECT sum(valor) as Total FROM itens_compra where id_compra = $id_compra";
$conCompra = @mysli_query($conexao, $consultaCompraTotal) or die($mysqli->error);
$dadoCompra = mysqli_fetch_array($conCompra);

function listarProdutos($conexao)
{
    $listadeprodutos = array();
    $resultado = mysqli_query($conexao, "select * from produto order by descricao");

    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($listadeprodutos, $produto);
    }

    return $listadeprodutos;
}

$listadeproduto = listarProdutos($conexao);

?>
<!--------------------------------------------------- Head --------------------------------------------------------->

<html lang="en">

<head>
    <title>Menu</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="Style.css" rel="stylesheet" type="text/css">
</head>

<!------------------------------------------------------------------------------------------------------------------>

<!--------------------------------------------------- Body --------------------------------------------------------->
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
                    <li><a href="../Tela/PDV.php"> PDV </a></li>
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
                                <li><a href="../Consultas/ListaClientes.php">Clientes Cadastrados</a></li>
                                <li><a href="..\Consultas\ListaFornecedores.php">Fornecedores Cadastrados</a></li>
                            </ul>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Relatórios <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Relatorios/RelatorioGeral.php"> Relatório Geral </a></li>
                                    <li><a href="Rel....html"> ..... </a></li>
                             </ul>
                                <li><a href="Sair.html">Sair</a></li>
         </div>
        </div>
    </nav>
    <h2>
        <p align="center"> Itens Compra
    </h2>
    <br>
    <form method="post" action="..\Comandos\Cad_Itens_Compra.php"> 
        <div class="form-row"> 
            <div class="form-group col-md-6"> 
                Código do Fornecedor 
                <input class="form-control" type="text" name="txtid" value='<?php echo $dado_forn['id_forn']; ?>'readonly>
            </div>

            <div class="form-group col-md-3"> 
                Produto 
                <select class="form-control" name="txtprod"><?php foreach ($listadeproduto as $produ) { ?>
                <option value="<?php echo $produ['id'] ?>"><?php echo $produ['descricao'] ?> </option>
            <?php } ?>
                </select>

                <div class="form-group col-md-3">
                    Quantidade
                    <input class="form-control" type="text" name="txtqtd" value="0">
            </div>

            <div class="form-group col-md-3">
                Quantidade
                <input class="form-control" type="text" name="txtvl"
                value='<?php echo $dadoCompra['Total']; ?>' readonly>
            </div>

            <div class="form-group col-md-3"> 
                <br>
                <input type="submit" name="btncal" class="btn btn-primary btn-alterar" role="button"
                class="glyphicon glyphicon-pencil" value="Adicionar">
            </div>
        </div>
        
    <br>
    <br>
    <div class="form-group col-md-4" style="text-align:center"> <a class="form-control" style="background-color: cyan;">
    <b> Descrição do Produto </b> </a>
    </div>

    <div class="form-group col-md-4" style="text-align:center"> <a class="form-control" style="background-color: cyan;">
    <b> Quantidade </b> </a>
    </div>

    <div class="form-group col-md-4" style="text-align:center"> <a class="form-control" style="background-color: cyan;">
    <b> Valor Produto </b> </a>
    </div> <?php while ($dado = $con -> fetch_array()) { ?>

    <div class='form-group col-md-4">
    <input class="form-control" readonly type="text" name="txtdescri" value= <?php echo $dado['descricao'];?><
    </div>

    <div class="form-group col-md-4">
        <input class="form-control" readonly type="text" name="txtentr" value=<?php echo $dado['qtd']; ?>>
    </div>

    <div class="form-group col-md-4">
        <input class="form-control" readonly type="text" name="txtsaida" value=<?php echo $dado['valor']; ?>>
    </div>
    <?php } ?>
    <br>
    <br>
    <input style="margin: 20px" type="button" value="Finalizar" class="btn btn-danger btn-excluir" role="button"
    class="glyphicon glyphicon-trash" onclick="javascript:location.href='..';" />
    </div>
    </form>


</body>

<!------------------------------------------------------------------------------------------------------------------>

</html>