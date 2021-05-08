
<div class="container-md cart">
  <table>

    <?php
    $total = 0;
    ?>


    <tr>
      <th>producto</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
      <th></th>
    </tr>
    <?php foreach ($viewmodel as $producto) : ?>
      <tr>
        <td>
          <div class="cart-info">
            <img src="../../siempredulce/img/<?php echo $producto['foto'] ?>" alt="">
            <div>
              <h3><?php echo $producto['nombre'] ?></h3>
              <span>Precio <?php echo $producto['precio'] ?>€</span>
              <br />

            </div>
          </div>
        </td>
        <td><input type="number" value="<?php echo CarroModel::cantidadproducto($producto['idProductos'], $_SESSION['idPedido']); ?>" min="1"></td>
        <td><?php echo (CarroModel::cantidadproducto($producto['idProductos'], $_SESSION['idPedido'])) * ($producto['precio']) ?>€</td>
        <td>
          <form action="carro/deleteproducto" method='post'> <input type="hidden" name='id' value='<?php echo $producto['idProductos'] ?>'><input class="btn " type="submit" name='submit' value='remove'></form>
        </td>

      </tr>

      <?php $total = $total + CarroModel::cantidadproducto($producto['idProductos'], $_SESSION['idPedido']) * ($producto['precio']); ?>

    <?php endforeach; ?>

    <div class="total-price">
      <table>
        <tr>
          <td>Subtotal</td>
          <td><?php echo $total ?>€</td>
        </tr>
        <tr>
          <td>impuestos</td>
          <td><?php echo $total * 0.21 ?>€</td>
        </tr>
        <tr>
          <td>Total</td>
          <td><?php echo $total * 1.21 ?>€</td>
        </tr>
      </table>
      <?php $_SESSION['total']=$total * 1.21?>
      <a href="<?php  ROOT_PATH ?>pedidos/realizar"><button class="checkout btn">Realizar pedido</button></a>
    
      

    </div>

</div>

</body>