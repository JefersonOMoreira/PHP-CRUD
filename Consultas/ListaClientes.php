<?php

include("../Comandos/conexao.php");
$consulta = "select * from cliente";
$con = @mysqli_query($conexao,$consulta) or die ($mysqli->error);

?>

<html>
<!DOCTYPE html>

<head>
<title>Lista Clientes</title>
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
                                <li><a href="../Consultas/ListaClientes.php">Clientes Cadastrados</a></li>
                                <li><a href="..\Consultas\ListaFornecedores.php">Fornecedores Cadastrados</a></li>
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
<br> <br> <br>
<div class="form-group col-md-12" text-alingn="center">
  <div class="form-group col-md-12" text-alingn="center">
     <div class = "row">
         <div class = "col-mod-12">
             <table id = "grid_cadastro" class = "table">
                 <div class = "box">
                         <div class="form-group col-md-4">
                             <input type="text" name="Pesquisa" class="form-control" id="pesq" placeholder="Localizar por Nome">
                         </div>
                         <div class="form-group col-md-6">
                             <button type="submit" class="btn btn-primary mb-2">Pesquisar</button>
                         </div>
                 </div>
                 <br>
                 <thead class = "form-group thead-dark">
                     <tr>
                         <td> Código </td>
                         <td> Nome </td>
                         <td> Cpf </td>
                         <td> Rg </td>
                         <td> E-mail </td>
                         <td> Endereço </td>
                         <td> Complemento </td>
                         <td> Bairro </td>
                         <td> Cidade </td>
                         <td> Estado </td>
                         <td> Cep </td>
                     </tr>
                 </thead>
                 <?php while ($dado = $con->fetch_array()){ ?>
                     <tr>
                         <td><?php echo $dado['id'];?></td>
                         <td><?php echo $dado['nome'];?></td>
                         <td><?php echo $dado['cpf'];?></td>
                         <td><?php echo $dado['rg'];?></td>
                         <td><?php echo $dado['email'];?></td>
                         <td><?php echo $dado['endereco'];?></td>
                         <td><?php echo $dado['complemento'];?></td>
                         <td><?php echo $dado['bairro'];?></td>
                         <td><?php echo $dado['cidade'];?></td>
                         <td><?php echo $dado['estado'];?></td>
                         <td><?php echo $dado['cep'];?></td>
                         <td>
                             <a href="#" class="btn btn-info" role="button">
                             <i class="glyphicon glyphicon-trash"> Imprimir </i></a>

                             <a href="..\Consultas\Alterar.php?id_cli=<?php echo $dado['id']; ?>"
                             class="btn btn-primary btn-alterar" role="button">
                             <i class="glyphicon glyphicon-pencil"> Alterar </i></a>

                             <a href="..\Consultas\Excluir.php?id_cli=<?php echo $dado['id']; ?>" 
                             class="btn btn-danger btn-excluir" role="button">
                             <i class="glyphicon glyphicon-trash"> Excluir </i></a>
                         </td>
                     </tr>
                     <?php } ?>
             </table>
         </div>
     </div>
  </div>
 </div>
</body>

</html>