$(document).ready(function(){
    $("#provincia").load("helper/provincia.php");

    municipios = "";

    $("#provincia").on("click",function(){
        var selected = $("#provincia").children("option:selected").val();
        $.ajax({
            url: 'helper/municipios.php',
            data: {'provincia': selected},
            dataType : 'text',
            type: "POST",
            success: function(data){
                $("#txtPoblacion").empty();
                $("#txtPoblacion").append(data);
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema -' + status);
            },
        });
    });
});