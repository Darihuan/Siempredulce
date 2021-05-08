
<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
 
    <div class="card mb-4" style="display:inline-block;margin-left:90rem;margin-top:10rem;">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
           <h3>Modificar USUARIO</h3> 
        </div>
        <div class="card-body">
            <?php foreach ($viewmodel as $producto) : ?>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>usersupdate">
                    <td>
                        <input type="hidden" class="form-control" name='id' value="<?php echo $producto['idUsuario'] ?>">
                    </td>
                    <td>
                    <label for="">Nombre Completo</label>
                        
                        <input type="text" class="form-control" name='nombre' value="<?php echo $producto['nombreCompleto'] ?>">
                    </td>
                    <td>
                    <label for="">Direccion</label>
                        <textarea class="form-control" name='direccion' rows="3"><?php echo $producto['direccion'] ?></textarea>
                    </td>
                    <td>
                        <input type="hidden" class="form-control" name='pass' value="<?php echo $producto['password'] ?>">
                    </td>
                    <td>
                    <label for="">email</label>
                        <input type="text" class="form-control" name='email' value="<?php echo $producto['email'] ?>">
                    </td>
                    <td>

                        <input type="submit" name='submit' value='actualizar' class="btn btn-primary">
                        <a href="http://localhost:81/siempredulce/users/" class="btn btn-secondary">volver</a>

                    </td>
                </form>
                </tr>
            <?php endforeach; ?>

        </div>


