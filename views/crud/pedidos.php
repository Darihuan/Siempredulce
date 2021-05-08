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
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>IdPedido</th>
                            <th>Usuario</th>
                            <th>total Pedido</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>IdPedido</th>
                            <th>Usuario</th>
                            <th>total Pedido</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($viewmodel as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['idPedido'] ?></td>
                                <td><?php echo $producto['Usuario_idUsuario'] ?></td>
                                <td><?php echo $producto['totalpedido'] ?>€</td>



                                <td>

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
                                    <input type="submit" name='submit' class='btn btn-primary'>

                                </td>

                            </form>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>






</body>