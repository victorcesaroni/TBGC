var request;
$(document).ready(function() {
    $("#formMaterialSecundario").hide();
    $("#formChapa").show();
    $("#modalCadastroDialog").hide();

    $(".boxCadastro").submit(function(event) {

        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $( this );
        var url = $form.attr("action");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $(".boxCadastro").serialize();
        serializedData += "&cadastrar"; // famosa gamibarra pra consertar bug das biblioteca
        
        $inputs.prop("disabled", true);

        request = $.ajax({
            url: url,
            type: "POST",
            async: true,
            data: serializedData
        });

        request.done(function (response, textStatus, jqXHR) {
            var json = JSON.parse(response);
            if (json.error === false) {                
                $("#modalCadastroMessage").html('<div class="alert alert-success"><strong></strong>' + json.message + '</div>');
                $("#modalCadastroDialog").modal();
            } else {
                $("#modalCadastroMessage").html('<div class="alert alert-danger"><strong></strong>' + json.message + '</div>');             
                $("#modalCadastroDialog").modal();
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("The following error occurred: " + textStatus, errorThrown);
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });
    });

    $("#tipoMaterial").click(function(event) {
        if ($("#tipoMaterial").val() === "chapa") {
            $("#formMaterialSecundario").hide();
            $("#formChapa").show();
        } else if ($("#tipoMaterial").val() === "secundario") {
            $("#formMaterialSecundario").show();
            $("#formChapa").hide();
        } 
    });
});