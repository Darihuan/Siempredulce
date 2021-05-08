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
            Modificar Producto
        </div>
        <div class="card-body">
            <?php foreach ($viewmodel as $producto) : ?>
                <form method="post" enctype="multipart/form-data"  action="<?php $_SERVER['PHP_SELF']; ?>Update">
                    <td>

                        <input type="hidden" class="form-control" name='id' value="<?php echo $producto['idProductos'] ?>">


                    </td>
                    <td>
                        <span>Nombre</span>
                        <input type="text" class="form-control" name='nombre' value="<?php echo $producto['nombre'] ?>">

                    </td>
                    <td>
                        <span>descripcion</span>
                        <textarea class="form-control" name='descripcion' rows="3"><?php echo $producto['descripcion'] ?></textarea>


                    </td>
                    <td>
                        <span>Stock</span>
                        <input type="text" class="form-control" name='cantidad' value="<?php echo $producto['total'] ?>">

                    </td>
                    <td>
                        <span>Categoria</span>
                        <input type="text" class="form-control" name='categoria' value="<?php echo $producto['categoria'] ?>">

                    </td>
                    <td>
                        <span>precio</span>
                        <input type="text" class="form-control" name='precio' value="<?php echo $producto['precio'] ?>">

                    </td>
                    <td>
                        <span>Foto</span>
                        <input type="file" name="foto">

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