var request;
$(document).ready(function() {
    $(".formLogin").submit(function(event) {
        event.preventDefault();

        if (request) {
            request.abort();
        }

        var $form = $( this );
        var url = $form.attr("action");
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $(".formLogin").serialize();
        
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
                window.location = "home.php";
            } else {
                $("#formLoginMessage").html('<div class="alert alert-danger"><strong>Erro: </strong>' + json.message + '.</div>');             
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error("The following error occurred: " + textStatus, errorThrown);
        });

        request.always(function () {
            $inputs.prop("disabled", false);
        });
    });
});