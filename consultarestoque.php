<?php
include 'header.php';
?>


<section class="home container" id="consultarEstoque">

  <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2>
			Consulta de Estoque
        </h2>
      </div>
  </div>
  <div class="row">
  	<div class="col-sm-8 col-sm-offset-2">
  		<form action="" method="" class="boxCadastro">
  			<br>

  			<div class="row">
  				<div class="col-sm-10 col-sm-offset-1">
  					Filtro
  					<select name="tipo_material" class="form-control" id="tipoMaterial">
  						<option value="chapa">Chapas de papelão</option>
  						<option value="secundario">Secundários</option>
  					</select>
  				</div>
  			</div>


  			<div class="row">
                <div class="listaEstoque col-sm-9 col-sm-offset-1" id="chapasDePapelao">
                    <div class="row cabecalhoEstoque">
                      <div class="col-sm-4">Material</div>
                      <div class="col-sm-2">QTDE</div>
                      <div class="col-sm-1">Tipo</div>
                      <div class="col-sm-1">Onda</div>
                      <div class="col-sm-1">Peso</div>
                      <div class="col-sm-1">Comp.</div>
                      <div class="col-sm-1">Larg.</div>
                      <div class="col-sm-1">Editar</div>
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-4">Chapa de Papelão</div>
                                <div class="col-sm-2">200</div>
                                <div class="col-sm-1">1</div>
                                <div class="col-sm-1">1</div>
                                <div class="col-sm-1">1</div>
                                <div class="col-sm-1">1</div>
                                <div class="col-sm-1">1</div>
                                <div class="col-sm-1 tipoMaterialLast"> <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-4">Chapa de Papelão</div>
                                <div class="col-sm-2">300</div>
                                <div class="col-sm-1">3321</div>
                                <div class="col-sm-1">3321</div>
                                <div class="col-sm-1">2313</div>
                                <div class="col-sm-1">1123</div>
                                <div class="col-sm-1">1132</div>
                                <div class="col-sm-1 tipoMaterialLast"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                            </div>
                        </li>

                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                    </ul>
                </div>
                <!-- <div class="listaEstoque col-sm-9 col-sm-offset-1" id="secundarios">
                    <div class="row cabecalhoEstoque">
                      <div class="col-sm-4">Quantidade</div>
                      <div class="col-sm-7">Descrição</div>
                      <div class="col-sm-1">Editar</div>
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-4">Chapa de Papelão</div>
                                <div class="col-sm-7">200</div>
                                <div class="col-sm-1 tipoMaterialLast"> <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-4">Chapa de Papelão</div>
                                <div class="col-sm-7">300</div>
                                <div class="col-sm-1 tipoMaterialLast"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                            </div>
                        </li>

                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                      <li class="list-group-item">First item</li>
                      <li class="list-group-item">Second item</li>
                      <li class="list-group-item">Third item</li>
                    </ul>
                </div> -->
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
