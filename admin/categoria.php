		<?php
        include 'sessao.php';
	require_once 'conexao.php';
	$class = new Funcoes();

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
			  <script>
function myFunction(id) {
    var answer = confirm("Deseja excluir este registro?")
	if (answer){
		window.location = "lecategoria.php?acao=deletar&codigo="+id+"";
	}
	else{
		alert("Thanks for sticking around!")
	}
}
</script>
			<body>
				<!-- header -->
				<?php include"header.php" ?>
				<!-- /Header -->
				<!-- Main -->
				<div class="container-fluid">
					<div class="row">
						<?php include "menu.php";?>
						<!-- /col-3 -->
						<div class="col-sm-9">
							<!-- column 2 -->
							<a href="#"></a>
							
							<div class="row">
								<!-- center left-->
								<div class="col-md-12">
									<!--tabs-->
									<div class="container">
										<div class="row">
										
											<div class="container">
		<div class="well"><div class="btn-group btn-group-justified">
										<a href="addcategoria.php" class="btn btn-primary col-sm-3">
										<i class="glyphicon glyphicon-plus"></i>
										<br> Adicionar
										</a>
								
										<a href="categoria.php" class="btn btn-primary col-sm-3">
										<i class="glyphicon glyphicon-th-list"></i>
										<br> Listar
										</a>
								
									</div>
		<table class="table table-striped custab">
		<thead>

			<tr>
				<th>Código</th>
				<th>Categoria</th>
				<th class="text-center">Ações</th>
			</tr>
		</thead>
	<?php 
						$result = $class->listarCategoria();
						while ($row = mysqli_fetch_assoc($result)) {
						$categoria = $row['nome'];
						$codigo = $row['id'];
						?>       
		   <tr>
					<td><?php echo $codigo ?></td>
					<td><?php echo $categoria ?></td>
					<td class="text-center"><a class='btn btn-info btn-xs' href="editcategoria.php?codigo=<?php echo $codigo;?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a> <a href="#" class="btn btn-danger btn-xs" onclick="myFunction(<?php echo $codigo;?>)"><span class="glyphicon glyphicon-remove" ></span> Excluir</a></td>
				</tr>
			   <?php
								}
							?>
		</table>
		</div>
	</div>
										</div>
									</div>
									<!--/tabs-->
								</div>
								<!--/col-->
								<!--/col-span-6-->
							</div>
							<!--/row-->
							<hr>
							<a href="#"></a>
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