<?php

require_once dirname(__FILE__) . '/includes.php';

$response = array();

if (!isset($_SESSION['logado'])) {
    if (isset($_POST['usuario']) && isset($_POST['senha'])) {
        if (login($_POST['usuario'], $_POST['senha'])) {
            $response['message'] = "Login efetuado com sucesso.";
            $response['error'] = false;
        } else {
            $response['message'] = "Usuário e/ou senha inválido(s).";
            $response['error'] = true;
        }
    } else {
        $response['message'] = "Usuário e/ou senha inválido(s).";
        $response['error'] = true;
    }
} else {
    $response['message'] = "Você já está logado.";
    $response['error'] = true;
}

echo json_encode($response);

?>
