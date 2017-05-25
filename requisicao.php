<?php
include 'header.php';

if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}

if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2)) {
	sem_permissao();
}

?>

<script src="js/consultarestoque.js"></script>

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
  		<form action="" method="" class="boxCadastro">
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
						<div class="col-md-3">Material</div>
						<div class="col-md-1">QTD</div>
						<div class="col-md-3">Tipo</div>
						<div class="col-md-1">Onda</div>
						<div class="col-md-1">Gram.</div>
						<div class="col-md-1">Comp.</div>
						<div class="col-md-1">Larg.</div>
						<div class="col-md-1">Selec.</div>
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
                                                <div class=\"col-lg-3 \">Chapa de Papelão</div>
                                                <div class=\"col-lg-1\">$row[materiais_quantidade]</div>
                                                <div class=\"col-lg-3\">$row[tipos_papelao_tipo]</div>
                                                <div class=\"col-lg-1\">$row[tipos_onda_tipo]</div>
                                                <div class=\"col-lg-1\">$row[chapas_gramatura]</div>
                                                <div class=\"col-lg-1\">$row[chapas_comprimento]</div>
                                                <div class=\"col-lg-1\">$row[chapas_largura]</div>
                                                <div class=\"col-lg-1 tipoMaterialLast\">
                                                    <input type=\"radio\" name=\"optionsRadios\">
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
						<div class="col-md-3">Material</div>
	                    <div class="col-md-1">QTD</div>
	                    <div class="col-md-7">Descrição</div>
						<div class="col-md-1">Selec.</div>
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
                                                <div class=\"col-lg-3 \">Material Sec.</div>
                                                <div class=\"col-lg-1\">$row[materiais_quantidade]</div>
                                                <div class=\"col-lg-7\">$row[materiais_descricao]</div>
                                                <div class=\"col-lg-1 tipoMaterialLast\">
                                                    <a href=\"editarmaterial.php?id=$row[materiais_cod]\">
                                                        <i class=\"fa fa-pencil\" aria-hidden=\"true\">
                                                        </i>
                                                    </a>
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
				<div class="col-md-2 col-md-offset-1">
						<b>Quantidade:</b>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<b>Adicionar Campo para Observação</b>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-1">
						<input type="text" name="quantidade" class="form-control" placeholder="">
				</div>

				<div class="col-md-5 col-md-offset-2">
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" id="inlineRadio1"> Sim
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" id="inlineRadio2"> Não
					</label>
				</div>
			</div>
			<div class="row">
				<br>
				<div class="col-sm-10 col-sm-offset-1">
					<button type="submit" name="cadastrar" class="btn btn-cadastrarMaterial">Efetuar Requisição</button>
				</div>
			</div>
  		<form>
  	</div>
  </div>
</section>

<?php
include 'footer.php';
?>
