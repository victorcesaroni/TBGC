<?php
include 'header.php';
?>


<section class="home container" id="home">

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<h2>Editar Material</h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<form action="webservice/cadastrarmaterial.php" method="POST" class="boxCadastro">
			<br>
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<b>Informações Gerais</b>
				</div>
			</div>
			<br>

			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					Material
					<select name="tipo_material" class="form-control" id="tipoMaterial">
						<option value="chapa">Chapa de papelão</option>
						<option value="secundario">Secundário</option>
					</select>
				</div>
			</div>


				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						Quantidade
						<input type="text" name="quantidade" class="form-control" placeholder="">
					</div>

					<div class="col-sm-4 ">
						Tipo papelão:
						<select class="form-control" name="tipo_papelao"></select><br>
					</div>

					<div class="col-sm-3 ">
						Tipo onda:
						<select class="form-control" name="tipo_onda"></select><br>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						Gramatura [g/m²]:
						<input type="text" class="form-control" name="gramatura"><br>
					</div>

					<div class="col-sm-4 ">
						Comprimento [m]:
						<input type="text" class="form-control" name="comprimento"><br>
					</div>

					<div class="col-sm-3 ">
						Largura [m]:
						<input type="text" class="form-control" name="largura"><br>
					</div>
				</div>

                <!-- <div id="formMaterialSecundario">
    				<div class="row">
    					<div class="col-sm-3 col-sm-offset-1">
    						Quantidade
    						<input type="text" name="quantidade2" class="form-control" placeholder="">
    					</div>

    					<div class="col-sm-4 ">
    						Descrição:
    						<input type="text" class="form-control" name="descricao"><br>
    					</div>
    				</div>
    			</div> -->



			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<button type="submit" name="cadastrar" class="btn btn-cadastrarMaterial">Atualizar</button>
				</div>
			</div>

			<br>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="modal fade" id="modalCadastroDialog">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Informação</h4>
							</div>
							<div class="modal-body">
								<p><div id="modalCadastroMessage"></div></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
			</div>
		<form>
	</div>
</div>

 </section>
<?php
include 'footer.php';
?>
