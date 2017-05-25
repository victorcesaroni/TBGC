<?php

require_once dirname(__FILE__) . '/includes.php';

if (isset($_SESSION['logado'])) {
    logout();
    echo "Deslogado com sucesso.<br>";
    header('Location: ../index.php');
} else {
    echo "Você não está logado.<br>";
    header('Location: ../index.php');
}

?>
