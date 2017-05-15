<?php
require_once dirname(__FILE__) . '/includes.php';

if (isset($_POST['test'])) {
    echo "Mensagem: " . $_POST['test'];
    die();
}

?>

<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script>

var request;
$(document).ready(function() {
    $("#testeForm").submit(function(event) {
        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $( this );
        var url = $form.attr("action");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $("#testeForm").serialize();
        
        $inputs.prop("disabled", true);

        request = $.ajax({
            url: "teste.php",
            type: "POST",
            async: true,
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR) {            
            alert(response);
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("The following error occurred: " + textStatus, errorThrown);
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });
    });
});
</script>

<form action="#" method="POST" id="testeForm">
<input type="text" name="test">
<input type="submit" value="Teste">
</form>
