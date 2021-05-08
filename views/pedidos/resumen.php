<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">



    <div class="card mb-12" style="display:inline-block;margin-left:90rem;margin-top:10rem;">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Resumen Pedidos
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>IdPedido</th>
                            <th>Usuario</th>
                            <th>total Pedido</th>


                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>IdPedido</th>
                            <th>Usuario</th>
                            <th>total Pedido</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($viewmodel as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['idPedido'] ?></td>
                                <td><?php echo $producto['Usuario_idUsuario'] ?></td>
                                <td><?php echo $producto['totalpedido'] ?>€</td>





                            </tr>

                        <?php endforeach; ?>





                    </tbody>
                </table>
            </div>
        </div>






</body>