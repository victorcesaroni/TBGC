<?php
require_once './includes.php';
?>

<!DOCTYPE html>
<html ng-app>
<head>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/main.js"></script>
	<title>Dexan - Soluções em Embalagens de Papelão</title>
</head>

<body>

<?php
if (isset($_SESSION['logado'])) {
?>

<div id="mySidenav" class="sidenav">	
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<?php
	if ($_SESSION['tipo'] == 1) {
	?>	
		<a href="cadastrarmaterial.php">Cadastrar Material</a>
		<a href="#">Consultar Estoque</a>
		<a href="#">Requisição de Material</a>
		<a href="webservice/logout.php">Sair</a>		
	<?php
	} else if ($_SESSION['tipo'] == 2) { 
	?>
		<a href="#">Acessar Requisições</a>
		<a href="#">Reinserir Sobras</a>
		<a href="#">Consultar Estoque</a>
		<a href="webservice/logout.php">Sair</a>		
	<?php
	}
}
?>
</div> 
<div id="main">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="col-xs-1 menu-icon">
				<a class="navbar-menu" href="#home">
					<span class="menu-icon"  onclick="openNav()">
						<!-- &#9776; -->						
						<?php
						if (!isset($_SESSION['logado'])) {
						?>
							<i class="fa fa-lock" aria-hidden="true"></i>						
						<?php
						} else {
						?>
							<i class="fa fa-bars" aria-hidden="true"></i>
						<?php
						}
						?>
						
					</span>
				</a>
			</div>

			<div class="navbar-header">
				<a class="" href="#home">
					<img alt="Brand" class="navbar-brand" src="img/logo1.png">
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>