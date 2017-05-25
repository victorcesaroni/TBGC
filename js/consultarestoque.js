var request;
$(document).ready(function() {
    $("#listaSecundarios").hide();
    $("#listaChapas").show();

    $("#tipoMaterial").click(function(event) {
        if ($("#tipoMaterial").val() === "chapa") {
            $("#listaSecundarios").hide();
            $("#listaChapas").show();
        } else if ($("#tipoMaterial").val() === "secundario") {
            $("#listaSecundarios").show();
            $("#listaChapas").hide();
        } 
    });
});