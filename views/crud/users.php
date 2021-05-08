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
                            <th>Idusuario</th>
                            <th>Nombre Completo</th>
                            <th>Dirección</th>
                            <th>Tipo Usuario</th>
                            <th>Password</th>
                            <th>email</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Idusuario</th>
                            <th>Nombre Completo</th>
                            <th>Dirección</th>
                            <th>Tipo Usuario</th>
                            <th>Password</th>
                            <th>email</th>
                            <th>

                            </th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($viewmodel as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['idUsuario'] ?></td>
                                <td><?php echo $producto['nombreCompleto'] ?></td>
                                <td><?php echo $producto['direccion'] ?></td>
                                <td><?php echo $producto['TipoUsuario'] ?></td>
                                <td><?php echo $producto['password'] ?></td>
                                <td><?php echo $producto['email'] ?></td>


                                <td>
                                    <form action="usersdelete" method="post">
                                        <input type="hidden" name="id" value="<?php echo $producto['idUsuario'] ?>">
                                        <input type="submit" name="submit" class="btn btn-danger" value="eliminar">
                                    </form>
                                    <form action="usersmodificar" method="post">
                                        <input type="hidden" name="id" value="<?php echo $producto['idUsuario'] ?>">
                                        <input type="submit" name="submit" class="btn btn-primary" value="modificar">
                                    </form>


                                </td>
                            </tr>

                        <?php endforeach; ?>


                        <tr>
                            <form method="post" action="adduser">
                                <td>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='name'>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='direccion'>

                                </td>
                                <td>
                                    <select type="text" class="form-control" name='tipo'>
                                        <option value="Admin">Admin</option>
                                        <option value="Comprador">Comprador</option>

                                    </select>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='password'>

                                </td>
                                <td>
                                    <input type="text" class="form-control" name='email'>

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