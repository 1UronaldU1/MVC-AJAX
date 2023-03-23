<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-dark text-white" method="post">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" id="usuario" name="registroUsuario" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="numero">Número:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="number" id="numero" name="registroNumero" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" id="pwd" name="registroPassword" class="form-control">
            </div>
        </div>

        <?php
            
            $registro = ControladorFormularios::ctrContacto();

            if($registro == "ok"){

                echo '<script>
                
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }
                
                </script>';

                echo '<div class="alert alert-success">El usuario ha sido registrado</div>';

            }

            if($registro == "error"){

                echo '<script>
                
                    if( window.history.replaceState ){

                        window.history.replaceState(null, null, window.location.href );

                    }
                
                </script>';

                echo '<div class="alert alert-danger">Error, no se permiten caracteres especiales</div>';

            }

        ?>

        <button type="submit" class="btn btn-info">Enviar</button>
    </form>
</div>