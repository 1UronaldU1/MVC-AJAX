$("#numero").change(function(){

    $(".alert").remove();

    const numero = $(this).val();

    const datos = new FormData();
    datos.append("validarNumero", numero);

    $.ajax({

        url: "ajax/formularios_ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

            if(respuesta){

                $("#numero").val("");

                $("#numero").parent().after(`

                <div class="alert alert-warning">
                
                    <b>ERROR:</b>

                    El número ya existe en la base de datos, por favor ingrese otro diferente
                
                </div>

                `);

            }

        }

    });

});