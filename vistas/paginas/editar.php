<?php 

    if(isset($_GET["token"])){

        $item = "token";
        $valor = $_GET["token"];

        $usuario = ControladorFormularios::ctrSeleccionarContactos($item, $valor);

    }

?>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-dark text-white" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" id="actualizarUsuario" name="actualizarUsuario" value="<?php echo $usuario["usuario"]; ?>" placeholder="Escriba su Usuario"  class="form-control">
            </div>
        </div>
        <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="number" id="actualizarNumero" name="actualizarNumero" value="<?php echo $usuario["numero"]; ?>" placeholder="Escriba su Usuario"  class="form-control">
        </div>

        <div class="input-group my-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" id="pwd" name="actualizarPassword" placeholder="Escriba su Password"  class="form-control">

                <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>" >

                <input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]; ?>" >

                <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>" >
        </div>

        <?php
            
            $actualizar = ControladorFormularios::ctrActualizarContacto();

            if($actualizar == "ok"){

                echo '<script>
                
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }

                    const datos = new FormData();
                    datos.append("validarToken", "'.$usuario["token"].'");

                    $.ajax({

                        url: "ajax/formularios_ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success:function(respuesta){
                
                            $("#actualizarUsuario").val(respuesta["usuario"]);
                            $("#actualizarNumero").val(respuesta["numero"]);

                        }
                    
                    })
                
                </script>';

                echo '<div class="alert alert-success mt-3">El usuario ha sido actualizado</div>
                
                ';

            }

            if($actualizar == "error"){

                echo '<script>
                
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }
                
                </script>';

                echo '<div class="alert alert-danger mt-3">Error al actualizar el usuario</div>
                
                ';

            }

        ?>

        <button type="submit" class="btn btn-info">Actualizar</button>
    </form>
</div>