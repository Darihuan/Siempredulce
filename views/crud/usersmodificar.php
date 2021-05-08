<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

</head>

<body>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Modificar USUARIO
        </div>
        <div class="card-body">
            <?php foreach ($viewmodel as $producto) : ?>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>Update">
                    <td>

                        <input type="hidden" class="form-control" name='id' value="<?php echo $producto['idUsuario'] ?>">


                    </td>
                    <td>
                        <span>Nombre Completo</span>
                        <input type="text" class="form-control" name='nombre' value="<?php echo $producto['nombreCompleto'] ?>">

                    </td>
                    <td>
                        <span>Dirección</span>
                        <textarea class="form-control" name='direccion' rows="3"><?php echo $producto['direccion'] ?></textarea>


                    </td>
                    <td>
                        <span>Stock</span>
                        <input type="text" class="form-control" name='tipo' value="<?php echo $producto['TipoUsuario'] ?>">

                    </td>
                    <td>

                        <input type="hidden" class="form-control" name='pass' value="<?php echo $producto['password'] ?>">

                    </td>
                    <td>
                        <span>email</span>
                        <input type="text" class="form-control" name='email' value="<?php echo $producto['email'] ?>">

                    </td>


                    <td>

                        <input type="submit" name='submit' value='actualizar' class="btn btn-primary">
                        <a href="http://localhost:81/siempredulce/crud/" class="btn btn-secondary">volver</a>

                    </td>
                </form>
                </tr>
            <?php endforeach; ?>

        </div>





</body>

</html>