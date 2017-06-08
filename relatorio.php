<?php
include 'header.php';
?>

<?php
if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}
?>

if (!($_SESSION['tipo'] == 1)) {
	sem_permissao();
}

<section class="home container" id="consultarEstoque">

  <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2>
			Quantidade utilizada do estoque nesta semana
        </h2>
      </div>
  </div>
  <div class="row">
  	<div class="col-sm-8 col-sm-offset-2">
  	<br>
  	    <div class="col-sm-8 col-sm-offset-1">
            <div class="row cabecalhoEstoque">
                <div class="col-sm-3">Núm. requisição</div>
                <div class="col-sm-3">Cód. material</div>
                <div class="col-sm-3">Data</div>                                 
                <div class="col-sm-1">Qtd.</div>
            </div>
        </div>
        <div class="listaEstoque col-sm-9 col-sm-offset-1">
            <ul class="list-group">
            <?php
                $rows = db_select("SELECT requisicoes.cod as cod_requisicao,cod_material, sum(requisicoes_materiais.quantidade) as qtd, date_format(data, '%d/%m/%Y') as data_fmt FROM requisicoes,requisicoes_materiais where cod = cod_requisicao and (CURRENT_DATE-data) < 7 group by cod_material,data order by data,quantidade desc");
                
                foreach ($rows as $row) {
                    echo "<li class=\"list-group-item\">
                            <div class=\"row tipoMaterial\">
                                <div class=\"col-sm-3\">#$row[cod_requisicao]</div> 
                                <div class=\"col-sm-3\">#$row[cod_material]</div> 
                                <div class=\"col-sm-3\">$row[data_fmt]</div>    
                                <div class=\"col-sm-1 tipoMaterialLast\">$row[qtd]</div>
                            </div>
                        </li>";
                }
            ?>                     
            </ul>
        </div>  		
  	</div>
  </div>
</section>

<?php
include 'footer.php';
?>
