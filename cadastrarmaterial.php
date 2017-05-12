<?php

require_once 'db/database.php';
require_once 'sessao.php';

function print_tipos_papelao() {
    $rows = db_select("SELECT cod,tipo FROM tipos_papelao");

    if ($rows == false)
        return;
    
    foreach ($rows as $row) {
        echo "<option value=\"$row[cod]\">$row[tipo]</option>";
    }
}

function print_tipos_onda() {
    $rows = db_select("SELECT cod,tipo FROM tipos_onda");

    if ($rows == false)
        return;
    
    foreach ($rows as $row) {
        echo "<option value=\"$row[cod]\">$row[tipo]</option>";
    }
}

function validar_tipo_onda($input) {
    if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input))
        return false;

    $input = db_quote($input);    
    $rows = db_select("SELECT cod FROM tipos_onda WHERE cod = '$input'");

    if ($rows == false)
        return false;
    
    return true;
}

function validar_gramatura($input) {
    if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;

    return true;
}

function validar_tipo_papelao($input) {
    if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input))
        return false;
    
    $input = db_quote($input);
    $rows = db_select("SELECT cod FROM tipos_papelao WHERE cod = '$input'");

    if ($rows == false)
        return false;

    return true;
}

function validar_comprimento($input) {
    if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;
    
    return true;
}

function validar_largura($input) {
   if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;
    
    return true;
}

function validar_quantidade($input) {
   if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;
    
    return true;
}

function inserir_chapa($cod_tipo_papelao, $cod_tipo_onda, $gramatura, $comprimento, $largura, $quantidade) {
    $rows = db_select("SELECT cod_material FROM chapas WHERE cod_tipo_onda='$cod_tipo_onda' AND cod_tipo_papelao='$cod_tipo_papelao' AND gramatura=$gramatura AND comprimento=$comprimento AND largura=$largura");

    if ($rows == false) {
        // não existe uma chapa igual cadastrada
        
        db_query("BEGIN");
        db_query("INSERT INTO materiais (quantidade) VALUES ($quantidade)");
        $cod_material = db_insert_id();
        db_query("INSERT INTO chapas (cod_material,cod_tipo_papelao,cod_tipo_onda,gramatura,comprimento,largura) VALUES ($cod_material,$cod_tipo_papelao,$cod_tipo_onda,$gramatura,$comprimento,$largura)");
        db_query("COMMIT");

    } else {
        // já existe uma chapa igual cadastrada

        db_query("BEGIN");
        $cod_material = $rows[0]['cod_material'];        
        db_query("UPDATE materiais SET quantidade=(quantidade + $quantidade) WHERE cod=$cod_material");
        db_query("COMMIT");
    }
}

?>

<html>
<body>
    <?php
        $rows = db_select("SELECT * FROM materiais");

        foreach ($rows as $row) {
            echo "$row[cod] - $row[quantidade]<br>";
        }        
    ?>

    <form action="cadastrarmaterial.php" method="POST">
        Tipo papelão: <select name="tipo_papelao"><?php print_tipos_papelao(); ?> </select><br>
        Tipo onda: <select name="tipo_onda"><?php print_tipos_onda(); ?> </select><br>
        Gramatura [g/m²]: <input type="text" name="gramatura"><br>
        Comprimento [m]: <input type="text" name="comprimento"><br>
        Largura [m]: <input type="text" name="largura"><br>
        Quantidade: <input type="text" name="quantidade"><br>
        <input type="submit" name="cadastrar" value="cadastrar"><br>  
    </form>
</body>
</html>

<?php

if (isset($_POST['cadastrar'])) {
    $validado = true;
    $erro = "";

    if (!(isset($_POST['tipo_onda']) && validar_tipo_onda($_POST['tipo_onda']))) {
        $validado = false;
        $erro .= "Tipo de onda inválido!<br>";
    }

    if (!(isset($_POST['gramatura']) && validar_gramatura($_POST['gramatura']))) {
        $validado = false;
        $erro .= "Gramatura inválida!<br>";
    }

    if (!(isset($_POST['tipo_papelao']) && validar_tipo_papelao($_POST['tipo_papelao']))) {
        $validado = false;
        $erro .= "Tipo de papelão inválido!<br>";
    }

    if (!(isset($_POST['comprimento']) && validar_comprimento($_POST['comprimento']))) {
        $validado = false;
        $erro .= "Comprimento inválido!<br>";
    }

    if (!(isset($_POST['largura']) && validar_largura($_POST['largura']))) {
        $validado = false;
        $erro .= "Largura inválida!<br>";
    }

    if (!(isset($_POST['quantidade']) && validar_quantidade($_POST['quantidade']))) {
        $validado = false;
        $erro .= "Quantidade inválida!<br>";
    }
    
    if ($validado == false) {
        echo $erro;
    } else {
        echo "OK";

        $cod_tipo_papelao = $_POST['tipo_papelao'];
        $cod_tipo_onda = $_POST['tipo_onda'];
        $gramatura = $_POST['gramatura'];
        $largura = $_POST['largura'];
        $comprimento = $_POST['comprimento'];
        $quantidade = $_POST['quantidade'];
        
        inserir_chapa($cod_tipo_papelao, $cod_tipo_onda, $gramatura, $comprimento, $largura, $quantidade);
    }
}

?>