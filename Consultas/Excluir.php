<?php

include("..\Comandos\conexao.php");
$id_cli = $_GET['id_cli'];

$consulta_cli = "select * from cliente where id = $id_cli";
$cliente = @mysqli_query($conexao, $consulta_cli) or die($mysqli->error);
$dado_cli = mysqli_fetch_array($cliente);
?>


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
<br>
        <br>
        <br>
        <h2>
            <center> Exclusão de Clientes</center>
        </h2>
        <br>

        <form action="..\Comandos\Excluir_Cli.php" method="POST">
            <div class="form-group col-md-12" text-alingn="center">

             <div class="form-group">

                <div class="form-group col-md-12">
                       <label for="inputName"> Código </label>
                         <input type="text" name="txtid" value='<?php echo $dado_cli['id']; ?>' readonly>
                </div>

                 <div class="form-group col-md-12">
                 <label for="inputName"> Nome </label>
                 <input type="text" name="txtnome" id="inputNome" class="form-control" value='<?php echo $dado_cli['nome'];?>' readonly>
             </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-4">
                 <label for="inputCpf"> CPF </label>
                 <input type="text" class="form-control" name="txtcpf" id="inputCpf" value='<?php echo $dado_cli['cpf']; ?>' readonly>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-4">
                 <label for="inputRG"> RG </label>
                 <input type="text" class="form-control" name="txtrg" id="inputRg" value='<?php echo $dado_cli['rg']; ?>' readonly>
                 </div>
             </div>
             <div class="form-row">
                
                 <div class="form-group col-md-4">
                 <label for="inputEmail"> Email </label>
                 <input type="email" class="form-control" name="txtemail" id="inputEmail" value='<?php echo $dado_cli['email']; ?>' readonly>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-12">
                 <label for="inputEndereco"> Endereço </label>
                 <input type="text" class="form-control" name="txtendereco" id="inputEndereco" value='<?php echo $dado_cli['endereco']; ?>' readonly>
             </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="inputComplemento"> Complemento </label>
                 <input type="text" class="form-control" name="txtcomplemento" id="inputComplemento" value='<?php echo $dado_cli['complemento']; ?>' readonly>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="inputBairro"> Bairro </label>
                 <input type="text" class="form-control" name="txtbairro" id="inputBairro" value='<?php echo $dado_cli['bairro']; ?>' readonly>
                 </div>
             </div>
             <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCidade"> Cidade </label>
                 <input type="text" class="form-control" name="txtcid" id="inputCidade" value='<?php echo $dado_cli['cidade']; ?>' readonly>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-md-4">
                 <label for="inputEstado"> Estado </label>
                 <select id="inputEstado" name="txtestado" class="form-control" value='<?php echo $dado_cli['estado']; ?>' readonly>
                     <option value="AC"> AC </option>
                     <option value="AL"> AL </option>
                     <option value="AP"> AP </option>
                     <option value="AM"> AM </option>
                     <option value="BA"> BA </option>
                     <option value="CE"> CE </option>
                     <option value="DF"> DF </option>
                     <option value="ES"> ES </option>
                     <option value="GO"> GO </option>
                     <option value="MA"> MA </option>
                     <option value="MT"> MT </option>
                     <option value="MS"> MS </option>
                     <option value="MG"> MG </option>
                     <option value="PA"> PA </option>
                     <option value="PB"> PB </option>
                     <option value="PR"> PR </option>
                     <option value="PE"> PE </option>
                     <option value="PI"> PI </option>
                     <option value="RJ"> RJ </option>
                     <option value="RN"> RN </option>
                     <option value="RS"> RS </option>
                     <option value="RO"> RO </option>
                     <option value="RR"> RR </option>
                     <option value="SC"> SC </option>
                     <option value="SP"> SP </option>
                     <option value="SE"> SE </option>
                     <option value="TO"> TO </option>
                 </select>
                 </div>
                 <div class="form-row">
                     <div class="form-group col-md-2">
                     <label for="inputCep"> CEP </label>
                     <input type="text" class="form-control" name="txtcep" id="inputCep" value='<?php echo $dado_cli['cep']; ?>' readonly>
                     </div>
                 </div>
            
                 <div class="form-group col-md-4">
                 <button type="submit" class="btn btn-danger btn-excluir" role="button"> Excluir </button>
                </div>
        </form>


</body>
</html>