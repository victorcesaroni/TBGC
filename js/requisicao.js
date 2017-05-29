$(document).ready(function() {
    var request;
    var errou = false;

    $("#listaSecundarios").hide();
    $("#listaChapas").show();
    $("#observacao").hide();

    $("#tipoMaterial").click(function(event) {
        if ($("#tipoMaterial").val() === "chapa") {
            $("#listaSecundarios").hide();
            $("#listaChapas").show();
        } else if ($("#tipoMaterial").val() === "secundario") {
            $("#listaSecundarios").show();
            $("#listaChapas").hide();
        } 
    });

    $("#addCampoObservacao").click(function(event) {
        if ($("#addCampoObservacao").is(":checked")) {
            $("#observacao").show();
        } else {
            $("#observacao").hide();
            $("#observacao").val("");
        } 
    });

    $(".boxCadastro").submit(function(event) {
        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $( this );
        var url = $form.attr("action");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $(".boxCadastro").serialize();
        serializedData += "&requisitar";
        
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
                errou = false;   
                $("#modalCadastroMessage").html('<div class="alert alert-success"><strong></strong>' + json.message + '</div>');
                $("#modalCadastroDialog").modal();
            } else {
                $("#modalCadastroMessage").html('<div class="alert alert-danger"><strong></strong>' + json.message + '</div>');             
                $("#modalCadastroDialog").modal();
                errou = true;
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("The following error occurred: " + textStatus, errorThrown);
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });
    });

    $("#fecharDialog").click(function(event) {
        if (!errou)
            location.reload();
    });

    $("#fecharDialog2").click(function(event) {
        if (!errou)
            location.reload();
    });
});

