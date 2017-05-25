<?php
include 'header.php';

if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}

if (!($_SESSION['tipo'] == 1)) {
	sem_permissao();
}

function print_tipos_papelao($default=0) {
    $rows = db_select("SELECT cod,tipo FROM tipos_papelao");

    if ($rows == false)
        return;

    foreach ($rows as $row) {
		if ($row['cod'] == $default) {
			echo "<option value=\"$row[cod]\" selected>$row[tipo]</option>";
		} else {
			echo "<option value=\"$row[cod]\">$row[tipo]</option>";
		}
    }
}

function print_tipos_onda($default=0) {
    $rows = db_select("SELECT cod,tipo FROM tipos_onda");

    if ($rows == false)
        return;

    foreach ($rows as $row) {
		if ($row['cod'] == $default) {
			echo "<option value=\"$row[cod]\" selected>$row[tipo]</option>";
		} else {
			echo "<option value=\"$row[cod]\">$row[tipo]</option>";
		}
    }
}

function validar_cod_material($input) {
    if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;

    return true;
}

$chapa = false;
$secundario = false;

$cod_material = 0;

if (isset($_GET['id'])) {
	$cod_material = db_quote($_GET['id']);

	if (validar_cod_material($cod_material)) {
		$rows = db_select("SELECT cod_material FROM chapas WHERE cod_material=$cod_material");
		$chapa = $rows != null;
		if (!$chapa) {
			$rows = db_select("SELECT cod_material FROM materiais_secundarios WHERE cod_material=$cod_material");
			$secundario = $rows != null;
		}
	}
}

$largura = 0;
$comprimento = 0;
$gramatura = 0;
$tipo_onda = "";
$tipo_papelao = "";
$cod_tipo_onda = 0;
$cod_tipo_papelao = 0;
$quantidade = 0;
$descricao = "";

if ($chapa) {
	$rows = db_select("SELECT
		materiais.quantidade AS materiais_quantidade,
		tipos_papelao.tipo AS tipos_papelao_tipo,
		tipos_onda.tipo AS tipos_onda_tipo,
		chapas.gramatura AS chapas_gramatura,
		chapas.comprimento AS chapas_comprimento,
		chapas.largura AS chapas_largura,
		materiais.cod AS materiais_cod,
		chapas.cod_tipo_onda AS chapas_cod_tipo_onda,
		chapas.cod_tipo_papelao AS chapas_cod_tipo_papelao
		FROM chapas, materiais, tipos_onda, tipos_papelao
		WHERE materiais.cod = $cod_material
			AND chapas.cod_material = materiais.cod
			AND tipos_onda.cod = chapas.cod_tipo_onda
			AND tipos_papelao.cod = chapas.cod_tipo_papelao");

	if ($rows == false) {
		die("");
	}

	$largura = $rows[0]['chapas_largura'];
	$comprimento = $rows[0]['chapas_comprimento'];
	$gramatura = $rows[0]['chapas_gramatura'];
	$tipo_onda = $rows[0]['tipos_onda_tipo'];
	$tipo_papelao = $rows[0]['tipos_papelao_tipo'];
	$quantidade = $rows[0]['materiais_quantidade'];
	$cod_tipo_onda = $rows[0]['chapas_cod_tipo_onda'];
	$cod_tipo_papelao = $rows[0]['chapas_cod_tipo_papelao'];
} else if ($secundario) {
	$rows = db_select("SELECT
		materiais_secundarios.descricao AS materiais_secundarios_descricao,
		materiais.quantidade AS materiais_quantidade
		FROM materiais_secundarios, materiais
		WHERE materiais.cod = $cod_material AND materiais_secundarios.cod_material = materiais.cod");

	if ($rows == false) {
		die("");
	}

	$quantidade = $rows[0]['materiais_quantidade'];
	$descricao = $rows[0]['materiais_secundarios_descricao'];
}

?>

<script src="js/editarmaterial.js"></script>

<section class="home container" id="home">

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<h2>Editar Material</h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<form action="webservice/editarmaterial.php" method="POST" class="boxCadastro">
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
					<select name="tipo_material" class="form-control" id="tipoMaterial" disabled>
						<?php if ($chapa) { ?>
							<option value="chapa">Chapa de papelão</option>
						<?php } if ($secundario) { ?>
							<option value="secundario">Secundário</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<?php if ($chapa) { ?>

				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						Quantidade
						<input type="text" name="quantidade" class="form-control" placeholder="" value="<?php echo $quantidade; ?>">
					</div>

					<div class="col-sm-4 ">
						Tipo papelão:
						<select class="form-control" name="tipo_papelao"><?php print_tipos_papelao($cod_tipo_papelao); ?> </select><br>
					</div>

					<div class="col-sm-3 ">
						Tipo onda:
						<select class="form-control" name="tipo_onda"><?php print_tipos_onda($cod_tipo_onda); ?> </select><br>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						Gramatura [g/m²]:
						<input type="text" class="form-control" name="gramatura" value="<?php echo $gramatura; ?>"><br>
					</div>

					<div class="col-sm-4 ">
						Comprimento [m]:
						<input type="text" class="form-control" name="comprimento" value="<?php echo $comprimento; ?>"><br>
					</div>

					<div class="col-sm-3 ">
						Largura [m]:
						<input type="text" class="form-control" name="largura" value="<?php echo $largura; ?>"><br>
					</div>
				</div>
			<?php } else if ($secundario) { ?>
                <div id="formMaterialSecundario">
    				<div class="row">
    					<div class="col-sm-3 col-sm-offset-1">
    						Quantidade
    						<input type="text" name="quantidade2" class="form-control" placeholder="" value="<?php echo $quantidade; ?>">
    					</div>

    					<div class="col-sm-4 ">
    						Descrição:
    						<input type="text" class="form-control" name="descricao" value="<?php echo $descricao; ?>"><br>
    					</div>
    				</div>
    			</div>
			<?php }?>

			<input type="hidden" name="cod_material" value="<?php echo $cod_material; ?>">

			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<button type="submit" name="editar" class="btn btn-cadastrarMaterial">Atualizar</button>
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
