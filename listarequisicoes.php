<?php
include 'header.php';
?>


<section class="home container" id="consultarEstoque">

  <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h2>
			Lista de Requisições
        </h2>
      </div>
  </div>
  <div class="row">
  	<div class="col-sm-8 col-sm-offset-2">
  		<form action="" method="" class="boxCadastro">
  			<br>
  			<div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="row cabecalhoEstoque">
                    <div class="col-md-5">Material</div>
                    <div class="col-md-1">QTD</div>
                    <div class="col-md-4">Cód.</div>
                    <div class="col-md-2">Imprimir</div>
                    </div>
                </div>
                <div class="listaEstoque col-sm-9 col-sm-offset-1" id="chapasDePapelao">


                    <ul class="list-group">

                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-5">Chapa de Papelão</div>
                                <div class="col-sm-1">200</div>
                                <div class="col-sm-4">132738473</div>
                                <div class="col-sm-2 tipoMaterialLast"> <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-5">Chapa de Papelão</div>
                                <div class="col-sm-1">200</div>
                                <div class="col-sm-4">132738473</div>
                                <div class="col-sm-2 tipoMaterialLast"> <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row tipoMaterial">
                                <div class="col-sm-5">Cola</div>
                                <div class="col-sm-1">2</div>
                                <div class="col-sm-4">132738473</div>
                                <div class="col-sm-2 tipoMaterialLast"> <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> </div>
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
