<?php

// https://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17

// funcao responsavel por conectar ao banco de dados
function db_connect() {
    static $connection;
    
    if (!isset($connection)) {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'dexan_estoque';

        $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        
        if ($connection == false) 
        {
            die ('Nao foi possivel se conectar ao banco de dados. Erro: ' . db_error());
            return NULL;
        }
    }

    return $connection;
}

// funcao responsavel por fazer uma query para a conexao
// exemplo: $result = db_query("INSERT INTO `users` (`name`,`email`) VALUES ('John Doe','john.doe@gmail.com')");
function db_query($query) {
    $connection = db_connect();

    return mysqli_query($connection, $query);
}

// funcao responsavel por obter o erro da conexao
function db_error() {
    $connection = db_connect();
    return mysqli_error($connection);
}

// funcao responsavel por preencher o array de um select
// exemplo: $rows = db_select("SELECT `name`,`email` FROM `users` WHERE id=5");
function db_select($query) {
    $rows = array();

    $result = db_query($query);

    if ($result == false)
        return false;
    
    while ($row = mysqli_fetch_assoc($result))
        $rows[] = $row;
    
    return $rows;
}

// funcao responsavel por filtrar a entrada vinda de usuarios para evitar sql injection
// exemplo: $name = db_quote($_POST['username']);
function db_quote($value) {
    $connection = db_connect();
    return mysqli_real_escape_string($connection, $value);
}

?>