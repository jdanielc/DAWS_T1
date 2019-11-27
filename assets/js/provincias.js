var sel = $("#provincia").val();
$("#provincia").ready(function () {
    $.ajax({
        url: 'helper/provincia.php',
        data: {'provincia': sel},
        dataType: 'text',
        type: "POST",
        success: function (data) {
            $("#provincia").empty();
            $("#provincia").append(data);
            municipios();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema -' + status);
        },
    });
});

$(document).ready(function () {
    $("#provincia").on("change", function(){
        municipios();
    });
});


function municipios() {
    var selected = $("#provincia").children("option:selected").val();
    $.ajax({
        url: 'helper/municipios.php',
        data: {"municipio": selected},
        dataType: "text",
        type: "POST",
        success: function (data) {
            $("#txtPoblacion").empty();
            $("#txtPoblacion").append(data);
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema -' + status);
        },
    });
}

