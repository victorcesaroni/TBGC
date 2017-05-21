<?php
include 'header.php';
?>

<?php
if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}
?>

<section class="home container" id="home">

  <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <h1>
			<?php
				$tipo = get_usuario_tipo_string($_SESSION['tipo']);
				echo "Seja bem vindo, $tipo.<br>";
			?>
        </h1>
      </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <hr class="divisor">
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
