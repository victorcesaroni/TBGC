<?php

require_once dirname(__FILE__) . '/includes.php';

session_start();

function login($usuario, $senha) {    
    $rows = db_select("SELECT usuario, senha, tipo FROM usuarios WHERE usuario = '" . db_quote($usuario) . "' AND senha = '" . md5($senha) . "'");

    if ($rows == false) {
        session_destroy();
        return false;
    }

    $_SESSION['logado'] = 1;
    $_SESSION['usuario'] = $rows[0]['usuario'];
    $_SESSION['tipo'] = $rows[0]['tipo'];    
    return true;
}

function logout() {
    session_destroy();
}

function get_usuario_tipo_string($tipo)
{
    if ($tipo == 1)
    	return "Administrador";
    else if ($tipo == 2)
    	return "Chefe de Produção";    

    return "";
}

function sem_permissao()
{
    echo '
    <section class="home container" id="home">

	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h1>
				<div class="alert alert-danger"><strong>Erro: </strong>	Sem permissão.</div>		
			</h1>
		</div>
	</div> 
	</section>
    ';

	include 'footer.php';
	die();
}

?>
