<?php
require_once 'conexao.php';
$class = new Funcoes();

if (isset($_GET['acao'])) {
    $id = $_GET['codigo'];
    echo $class->excluirOferta($id);
    echo"<meta http-equiv='refresh' content=3;url='oferta.php'>";
} else {
    
}
$categoria = $_POST['selectcategoria'];
$promocao = $_POST['promocao'];
$id_cliente = $_POST['selectbasic'];
$valorantigo = (float) $_POST['valorantigo'];
$valor = (float) $_POST['valor'];
$desconto = $_POST['desconto'];
$qtd = $_POST['qtdcupons'];
$descricao = $_POST['desc'];
$date = new DateTime(($_POST['datainicial']));
$datainicial = $date->format('Y.m.d');
$date = new DateTime(strtotime($_POST['datafinal']));
$datafinal = $date->format('Y.m.d');
$principal = $_POST['principal'];
$ativo = $_POST['ativo'];

$action = $_POST['action'];

$uploaddir = '../imagem/fotos/';
$nome = rand(00,9999);
$uploadfile1 = $uploaddir . $nome.basename($_FILES['imagem1']['name']);
$uploadfile2 = $uploaddir . $nome.basename($_FILES['imagem2']['name']);
$uploadfile3 = $uploaddir . $nome.basename($_FILES['imagem3']['name']);
$uploadfile4 = $uploaddir . $nome.basename($_FILES['mapa']['name']);

if (move_uploaded_file($_FILES['imagem1']['tmp_name'], $uploadfile1)) {
   $foto1 = $nome.basename($_FILES['imagem1']['name']);
    //echo "Arquivo válido e enviado com sucesso.\n";
} else {
    $foto1="";
    //echo "Possível ataque de upload de arquivo!\n";
}

if (move_uploaded_file($_FILES['imagem2']['tmp_name'], $uploadfile2)) {
    $foto2 = $nome.basename($_FILES['imagem2']['name']);
    //echo "Arquivo válido e enviado com sucesso.\n";
} else {
    $foto2="";
}

if (move_uploaded_file($_FILES['imagem3']['tmp_name'], $uploadfile3)) {
    $foto3 = $nome.basename($_FILES['imagem3']['name']);
    //echo "Arquivo válido e enviado com sucesso.\n";
} else {
    $foto3="";
}

if (move_uploaded_file($_FILES['mapa']['tmp_name'], $uploadfile4)) {
    $mapa = $nome.basename($_FILES['mapa']['name']);
    //echo "Arquivo válido e enviado com sucesso.\n";
} else {
    $mapa="";
}


if ($action == "add") {

    $class->inserirOfertas($id_cliente,$promocao,$valorantigo, $valor, $desconto, $qtd, $descricao, 
          $foto1, $foto2, $foto3, $mapa, $datainicial,$datafinal,$principal,$ativo,$categoria);
    echo"<meta http-equiv='refresh' content=3;url='addoferta.php'>";
}

if ($action == "edit") {
    $id = $_POST['id'];
    echo $class->alterarCategoria($id, $nome, $descricao);
    echo"<meta http-equiv='refresh' content=3;url='categoria.php'>";
}

if (isset($_GET['acao'])) {
    echo $class->excluirCategoria($id);
    echo"<meta http-equiv='refresh' content=3;url='categoria.php'>";
}
?>


<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Área Administrativa AKIPOM</title>
        <meta name="generator" content="Bootply">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">

    </head>

    <body>
        <!-- header -->
        <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /Header -->
        <!-- Main -->
        <div class="container-fluid">
            <div class="row">
                <?php include "menu.php"; ?>
                <!-- /col-3 -->
                <div class="col-sm-9">
                    <!-- column 2 -->
                    <a href="#"></a>

                    <div class="row">
                        <!-- center left-->
                        <div class="col-md-12">
                            <div class="well"><?php
                if (isset($_GET['acao'])) {
                    echo"Registro excluído com sucesso";
                } else {

                    if ($action == "add") {
                        echo"Registro cadastrado com sucesso";
                    }
                    if ($action == "edit") {
                        echo"Registro atualizado com sucesso";
                    }
                }
                ?>

                            </div>

                        </div>
                        <!--/col-->
                        <!--/col-span-6-->
                    </div>
                    <!--/row-->

                    <hr>
                </div>
                <!--/col-span-9-->
            </div>
        </div>
        <!-- /Main -->
        <footer class="text-center">This Bootstrap 3 dashboard layout is compliments of
            <a href="http://www.bootply.com/85850"><strong>Bootply.com</strong></a>
        </footer>
        <div class="modal" id="addWidgetModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Widget</h4>
                    </div>
                    <div class="modal-body">
                        <p>Add a widget stuff here..</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn">Close</a>
                        <a href="#" class="btn btn-primary">Save changes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dalog -->
        </div>
        <!-- /.modal -->
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>

</html>