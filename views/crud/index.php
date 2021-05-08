<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>productos</title>

</head>

<body>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DATOS PRODUCTOS
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>IdProducto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>foto</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>IdProducto</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Foto</th>
                            <th></th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($viewmodel as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['idProductos'] ?></td>
                                <td><?php echo $producto['nombre'] ?></td>
                                <td><?php echo $producto['descripcion'] ?></td>
                                <td><?php echo $producto['categoria'] ?></td>
                                <td><?php echo $producto['total'] ?></td>
                                <td><?php echo $producto['precio'] ?></td>
                                <td><?php echo $producto['foto'] ?></td>

                                <td>
                                    <form action="<?php echo ROOT_PATH ?>crud/delete" method='post'>
                                        <input type="hidden" name='id' value="<?php echo $producto['idProductos'] ?>">
                                        <input type='submit' name="submit" class="btn btn-danger" value='borrar' />
                                    </form>
                                    <form action="<?php echo ROOT_PATH ?>crud/indexid" method='post'>
                                        <input type="hidden" name='id' value="<?php echo $producto['idProductos'] ?>">
                                        <input type='submit' name="submit" class="btn btn-primary" value='actualizar' />
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>


                        <tr>
                            <form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>crud/add">
                                <td>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='nombre'>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='descripcion'>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='categoria'>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='cantidad'>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='precio'>

                                </td>
                                <td>
                                    <input type="file" name='foto'>

                                </td>
                                <td>
                                    <input type="submit" name='submit' class='btn btn-primary'>

                                </td>

                            </form>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>






</body>

</html>