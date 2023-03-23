<?php

if(!isset($_SESSION["validarIngreso"])){

    echo '<script>window.location = "ingresar";</script>';
    return;

}else{

    if($_SESSION["validarIngreso"] != "ok"){

        echo '<script>window.location = "ingresar";</script>';
        return;

    }

}

$usuarios = ControladorFormularios::ctrSeleccionarContactos(null, null);

?>

<div class="container-fluid">
    <div class="container py-5">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Número</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $key => $value): ?>

                <tr>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $value["usuario"]; ?></td>
                    <td><?php echo $value["numero"]; ?></td>
                    <td><?php echo $value["fecha"]; ?></td>
                    <td>
                        <div class="btn-group">
                            <div class="px-1">
                                <a href="index.php?pagina=editar&token=<?php echo $value["token"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                            </div>

                            <form method="post">

                                <input type="hidden" value="<?php echo $value["token"]; ?>" name="eliminarRegistro">

                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                                <?php 
                        
                                    $eliminar = new ControladorFormularios();
                                    $eliminar -> ctrEliminarContacto();
                                
                                ?>

                            </form>

                        </div>
                    </td>
                </tr>

            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>