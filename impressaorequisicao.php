<?php

require_once './includes.php';
require_once 'TCPDF/tcpdf_import.php';

if (!isset($_SESSION['logado'])) {
	 header('Location: index.php');
}

if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2)) {
	sem_permissao();
}

function validar_cod($input) {
    if (empty($input) || is_null($input))
        return false;

    if (!is_numeric($input) || $input <= 0)
        return false;

    return true;
}

function get_tipo_material($cod_material, &$chapa, &$secundario) {
    $rows = db_select("SELECT cod_material FROM chapas WHERE cod_material=$cod_material");
    $chapa = $rows != null;
    if (!$chapa) {
        $rows = db_select("SELECT cod_material FROM materiais_secundarios WHERE cod_material=$cod_material");
        $secundario = $rows != null;
    }    
}

if (isset($_GET['cod']) && validar_cod($_GET['cod'])) {
    $cod_requisicao = $_GET['cod'];

    $rows = db_select("SELECT date_format(data, '%d/%m/%Y') as data_fmt, observacao FROM requisicoes where cod=$cod_requisicao");

    if ($rows == false) {
        die("erro");
    }

    $data = $rows[0]['data_fmt'];
    $observacao = utf8_decode($rows[0]['observacao']);

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('DEXAN');
    $pdf->SetTitle('DEXAN - ETIQUETA');
    $pdf->SetSubject('ETIQUETA');
    $pdf->SetKeywords('PDF, DEXAN, ETIQUETA');

    // set default header data
    $pdf->SetHeaderData("../../../img/logo-colorido.png", PDF_HEADER_LOGO_WIDTH, "REQUISIÇÃO DE MATERIAL", "Requisição número: #$cod_requisicao", array(0,0,0), array(0,0,0));
    $pdf->setFooterData(array(0,0,0), array(0,0,0));

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 12, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

    // Set some content to print
    $html = "";

    $rows = db_select("SELECT cod_material, quantidade FROM requisicoes_materiais where cod_requisicao=$cod_requisicao");

    if ($rows == false) {
        die("erro");
    }

    $today = date("d/m/Y"); 

    $html .= "";
    $html .= "<b>Data da requisição</b>: $data<br>";
    $html .= "<b>Data da emissão</b>: $today<br>";

    $html .= "<br>
    <b></i>Chapas de Papelão</i></b><br>
    <table border=\"1\">
        <tr>
            <td><b>Cód. material</b></td>
            <td><b>Qtd.</b></td>
            <td><b>Compr.</b></td>
            <td><b>Larg.</b></td>
            <td><b>Gram.</b></td>
            <td><b>Tp. Onda</b></td>
            <td><b>Tp. Papel.</b></td>
        </tr>
    ";

    foreach($rows as $row) {
        $cod_material = $row['cod_material'];
        $quantidade = $row['quantidade'];

        $chapa = false;
        $secundario = false;

        get_tipo_material($cod_material, $chapa, $secundario);
     
        if ($chapa) {
            $rows2 = db_select("SELECT
                materiais.quantidade AS materiais_quantidade,
                tipos_papelao.tipo AS tipos_papelao_tipo,
                tipos_onda.tipo AS tipos_onda_tipo,
                chapas.gramatura AS chapas_gramatura,
                chapas.comprimento AS chapas_comprimento,
                chapas.largura AS chapas_largura,
                materiais.cod AS materiais_cod
                FROM chapas, materiais, tipos_onda, tipos_papelao
                WHERE materiais.cod = $cod_material
                    AND chapas.cod_material = materiais.cod
                    AND tipos_onda.cod = chapas.cod_tipo_onda
                    AND tipos_papelao.cod = chapas.cod_tipo_papelao");

            if ($rows2 == false) {
                die("error");
            }

            $largura = $rows2[0]['chapas_largura'];
            $comprimento = $rows2[0]['chapas_comprimento'];
            $gramatura = $rows2[0]['chapas_gramatura'];
            $tipo_onda = $rows2[0]['tipos_onda_tipo'];
            $tipo_papelao = $rows2[0]['tipos_papelao_tipo'];
            
            $html .= "<tr><td>#$cod_material</td><td>$quantidade</td><td>$comprimento</td><td>$largura</td><td>$gramatura</td><td>$tipo_onda</td><td>$tipo_papelao</td></tr>";
        }
    }

    $html .= "</table>";

    $html .= "<br><br><br>
    <b></i>Materiais Secundários</i></b><br>
    <table border=\"1\">
        <tr>
            <td><b>Cód. material</b></td>
            <td><b>Qtd.</b></td>
            <td><b>Descrição</b></td>           
        </tr>
    ";

    foreach($rows as $row) {
        $cod_material = $row['cod_material'];
        $quantidade = $row['quantidade'];

        $chapa = false;
        $secundario = false;

        get_tipo_material($cod_material, $chapa, $secundario);

        if ($secundario) {
            $rows2 = db_select("SELECT
                materiais_secundarios.descricao AS materiais_secundarios_descricao
                FROM materiais_secundarios, materiais
                WHERE materiais.cod = $cod_material AND materiais_secundarios.cod_material = materiais.cod");

            if ($rows2 == false) {
                die("error");
            }

            $descricao = $rows2[0]['materiais_secundarios_descricao'];

            $html .= "<tr><td>#$cod_material</td><td>$quantidade</td><td>$descricao</td></tr>";
        }
    }

    $html .= "</table>";

    if ($observacao != "") {
        $html .= "<br><br><div style=\"border:1px solid black;\"><b>Observação</b>:<br>$observacao</div><br><br>";
    }

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('requisicao_.pdf', 'I');
}