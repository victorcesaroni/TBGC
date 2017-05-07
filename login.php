<?php

require_once 'db/database.php';
require_once 'sessao.php';

if (!isset($_SESSION['logado'])) {
    if (isset($_POST['usuario']) && isset($_POST['senha'])) {
        if (login($_POST['usuario'], $_POST['senha'])) {
            echo "Login efetuado com sucesso.";
            header('Location: home.php');
        } else {
            echo "Usuário e/ou senha inválido(s).";
        }
    } else {
        echo "Usuário e/ou senha inválido(s).";
    }
} else {
    echo "Você já está logado.";
}

?>
