<?php
include 'header.php';

?>

<?php
if (isset($_SESSION['logado'])) {
	 header('Location: home.php');
}
?>

<script src="js/login.js"></script>

<section class="home container" id="home">
	<!-- <div class="row">
		<div class="col-xs-8 col-xs-offset-2 title" >
		<h3>Tenha o <span class="blue">controle</span> absoluto de seus dependentes</h3>
		<h4>Com Zalt Card você determina <span class="blue"> quanto </span>e <span class="blue">onde</span> eles podem gastar</h4>
		</div>
	</div> -->
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 boxLogin">
			<div class="loginTitle">
				Bem Vindo!
			</div>
			
			<form action="webservice/login.php" method="POST" class="formLogin">
				<div id="formLoginMessage">					
				</div>		
				<!-- <input type="text" class="form-control" id="username" placeholder="Nome de Usuário">
				<input type="password" class="form-control" id="password" placeholder="Senha"> -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</div>
						<input type="text" class="form-control" id="username" name="usuario" placeholder="Nome de usuário" ng-model="username">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</div>
						<input type="password" class="form-control" id="password" name="senha" placeholder="Senha" ng-model="password">
					</div>
				</div>
				<button type="submit" class="btn btn-lg">Entrar</button>			
			</form>
		</div>
	</div>
</section>

<!-- <section class="home container">
	<div class="row">
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	<div class="col-sm-1">.col-sm-1</div>
	</div>
</section> -->

<?php
include 'footer.php';
?>