<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-dark text-white" method="post">
        <div class="form-group">
            <label for="numero">Número:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                </div>
                <input type="number" name="ingresoNumero" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </div>
                <input type="password" id="pwd" name="ingresoPassword" class="form-control">
            </div>
        </div>

        <?php
            
            $ingreso = new ControladorFormularios();

            $ingreso -> ctrIngresar();

        ?>

        <button type="submit" class="btn btn-info">Ingresar</button>
    </form>
</div>