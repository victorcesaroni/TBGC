<?php
include 'header.php';

if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}

if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2)) {
	sem_permissao();
}

?>

<script src="js/requisicao.js"></script>

<section class="home container" id="consultarEstoque">

  <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2>
			Requisição de Material
        </h2>
      </div>
  </div>
  <div class="row">
  	<div class="col-sm-8 col-sm-offset-2">
  		<form action="webservice/requisicao.php" method="POST" class="boxCadastro">
  			<br>

  			<div class="row">
  				<div class="col-sm-10 col-sm-offset-1">
  					<b>Selecionar Categoria</b>
  					<select name="tipo_material" class="form-control" id="tipoMaterial">
  						<option value="chapa">Chapas de papelão</option>
  						<option value="secundario">Secundários</option>
  					</select>
  				</div>
  			</div>
			<br>

            <div id="listaChapas">
                <div class="row">
					<div class="col-sm-10 col-sm-offset-1">
	  					<b>Selecionar Material</b>
						<div class="row cabecalhoEstoque">
                        <div class="col-md-1">Cód.</div>
						<div class="col-md-1">Qtd.</div>
						<div class="col-md-3">Tipo</div>
						<div class="col-md-1">Onda</div>
						<div class="col-md-1">Gram.</div>
						<div class="col-md-1">Comp.</div>
						<div class="col-md-1">Larg.</div>
						<div class="col-md-1">Selec.</div>
                        <div class="col-md-1">Qtd.</div>
						</div>
	  				</div>
                    <div class="listaEstoque1 col-lg-10 col-lg-offset-1" id="chapasDePapelao">
                        <ul class="list-group">
                            <?php

                                $rows = db_select("SELECT
                                                        materiais.quantidade AS materiais_quantidade,
                                                        tipos_papelao.tipo AS tipos_papelao_tipo,
                                                        tipos_onda.tipo AS tipos_onda_tipo,
                                                        chapas.gramatura AS chapas_gramatura,
                                                        chapas.comprimento AS chapas_comprimento,
                                                        chapas.largura AS chapas_largura,
                                                        materiais.cod AS materiais_cod
                                                    FROM chapas, materiais, tipos_onda, tipos_papelao
                                                    WHERE chapas.cod_material = materiais.cod
                                                        AND tipos_onda.cod = chapas.cod_tipo_onda
                                                        AND tipos_papelao.cod = chapas.cod_tipo_papelao");

                                foreach ($rows as $row) {
                                    echo "<li class=\"list-group-item\">
                                            <div class=\"row tipoMaterial\">
                                                <div class=\"col-lg-1\">#$row[materiais_cod]</div>
                                                <div class=\"col-lg-1\">$row[materiais_quantidade]</div>
                                                <div class=\"col-lg-3\">$row[tipos_papelao_tipo]</div>
                                                <div class=\"col-lg-1\">$row[tipos_onda_tipo]</div>
                                                <div class=\"col-lg-1\">$row[chapas_gramatura]</div>
                                                <div class=\"col-lg-1\">$row[chapas_comprimento]</div>
                                                <div class=\"col-lg-1\">$row[chapas_largura]</div>
                                                <div class=\"col-lg-1\">
                                                    <input type=\"checkbox\" name=\"cod_selecionados[]\" value=\"$row[materiais_cod]\">
                                                </div>
                                                <div class=\"col-lg-1 tipoMaterialLast\">
                                                    <input class=\"form-control quantidadeMaterial\" type=\"text\" name=\"quantidade[$row[materiais_cod]]\" value=\"\">
                                                </div>
                                            </div>
                                        </li>";
                                }

                            ?>
                        </ul>
                    </div>
                </div>
				<br>
            </div>

            <div id="listaSecundarios">
                <div class="row">

					<div class="col-sm-10 col-sm-offset-1">
	  					<b>Selecionar Material</b>
						<div class="row cabecalhoEstoque">
                        <div class="col-md-1">Cód.</div>
	                    <div class="col-md-1">Qtd.</div>
	                    <div class="col-md-7">Descrição</div>
						<div class="col-md-1">Selec.</div>
                        <div class="col-md-1">Qtd.</div>
						</div>
	  				</div>

                    <div class="listaEstoque1 col-lg-10 col-lg-offset-1" id="chapasDePapelao">
                        <ul class="list-group">
                            <?php

                                $rows = db_select("SELECT
                                                        materiais.quantidade AS materiais_quantidade,
                                                        materiais.cod AS materiais_cod,
                                                        materiais_secundarios.descricao AS materiais_descricao
                                                    FROM materiais_secundarios, materiais
                                                    WHERE materiais_secundarios.cod_material = materiais.cod");

                                foreach ($rows as $row) {
                                    echo "<li class=\"list-group-item\">
                                            <div class=\"row tipoMaterial\">
                                                <div class=\"col-lg-1\">#$row[materiais_cod]</div>
                                                <div class=\"col-lg-1\">$row[materiais_quantidade]</div>
                                                <div class=\"col-lg-7\">$row[materiais_descricao]</div>
                                                <div class=\"col-lg-1\">
                                                    <input type=\"checkbox\" name=\"cod_selecionados[]\" value=\"$row[materiais_cod]\">
                                                </div>
                                                <div class=\"col-lg-1 tipoMaterialLast\">
                                                    <input class=\"form-control quantidadeMaterial\" type=\"text\" name=\"quantidade[$row[materiais_cod]]\" value=\"\">
                                                </div>
                                            </div>
                                        </li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="row">
				<br>				
				<div class="col-md-5 col-md-offset-1">
				    Observação
                    <input type="checkbox" name="add_campo_observacao" id="addCampoObservacao">
				</div>
			</div>
			<div class="row">
                <div class="col-sm-10 col-md-offset-1">
                    <input class="form-control" type="text" name="observacao" id="observacao">
				</div>
			</div>
			<div class="row">
				<br>
				<div class="col-sm-10 col-sm-offset-1">
					<button type="submit" name="requisitar" class="btn btn-cadastrarMaterial">Efetuar Requisição</button>
				</div>
			</div>

            <br>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="modal fade" id="modalCadastroDialog">
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="fecharDialog">×</button>
								<h4 class="modal-title">Informação</h4>
							</div>
							<div class="modal-body">
								<p><div id="modalCadastroMessage"></div></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal" id="fecharDialog2">Close</button>
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
