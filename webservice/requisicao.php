<?php

require_once dirname(__FILE__) . '/includes.php';

if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}

if (!($_SESSION['tipo'] == 1)) {
	sem_permissao();
}

function validar_codigo($input) {
   if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input))
        return false;
    
    return true;
}

function validar_quantidade($input, $cod_material) {
   if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;
    
    $rows = db_select("SELECT quantidade FROM materiais WHERE cod=$cod_material");

    if ($rows == false) {
        return false;
    }

    if ($rows[0]['quantidade'] - $input < 0 ) {
        return false;
    }

    return true;
}


function inserir_requisicao($cod_material, $quantidade, $observacao) {
    db_query("BEGIN");  
    db_query("INSERT INTO requisicoes(quantidade, observacao, cod_material, data) VALUES ($quantidade, '$observacao', $cod_material, CURRENT_DATE)");
    db_query("UPDATE materiais SET quantidade=(quantidade - $quantidade) WHERE cod=$cod_material");
    db_query("COMMIT");

    return true;
}


$response = array();

$response["error"] = false;
$response["message"] = "";

if (isset($_POST['requisitar'])) {
    $validado = true;
    $first = true;

    if (!isset($_POST['quantidade'])) {
        if ($first) { $first = false; } else { $response['message'] .= "<br>"; }
        $validado = false;
        $response['message'] .= "Selecione alguma coisa!<br>";
    }

    if (!isset($_POST['cod_selecionados'])) {
        if ($first) { $first = false; } else { $response['message'] .= "<br>"; }
        $validado = false;
        $response['message'] .= "Selecione alguma coisa!<br>";
    }

    if ($validado) {
        $cod_selecionados = $_POST['cod_selecionados'];
        $quantidades = $_POST['quantidade'];
        $observacao = db_quote(isset($_POST['add_campo_observacao']) ? $_POST['observacao'] : "");

        foreach ($cod_selecionados as $cod) {
            if (!validar_codigo($cod)) {
                $response["error"] = true;
                $response["message"] .= "ta tetando fazer oq meu chapa?...<br>";
                $validado = false;
                break;
            }

            $quantidade = $quantidades[$cod];

            if (!validar_quantidade($quantidade, $cod)) {
                $response["message"] .= "[ERRO] Quantidade do produto #$cod inválida ($quantidades[$cod]).<br>";
                $validado = false;
            } else {
                $response["message"] .= "[OK] Cod #$cod selecionado com $quantidades[$cod].<br>";
            }
        }

        if ($validado) {
            foreach ($cod_selecionados as $cod) {
                $quantidade = $quantidades[$cod];
                inserir_requisicao($cod, $quantidade, $observacao);

                $response["message"] = "Requisição criada com sucesso!<br>" . $response["message"];
            }          
        } else {
            $response["error"] = true;
        }
    } else {
        $response["error"] = true;
    }
}

echo json_encode($response);

?>