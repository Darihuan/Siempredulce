<section class="section all-products" id="products">
    <!--cabecera-->
    <div class="top container">
        <h1>Todos los productos</h1>

    </div>
    <!--fin cabecera-->
    <!--listar productos-->

  
    <div class="product-center container">

        <?php foreach ($viewmodel as $item) : ?>


            <div class="product">

                <div class="product-header">
                    <img src="../../siempredulce/img/<?php echo $item['foto'] ?>" alt="">
                    <ul class="icons">  

                        <a href="cart.html"> <span><i class="bx bx-shopping-bag"></i></span></a>
                        <a href="<?php $_SERVER['PHP_SELF']; ?>productos/detalles"> <span><i class="bx bx-search"></i></span></a>
                    </ul>
                </div>
                <div class="product-footer">
                <?php if (isset($_SESSION['loggeado'])) : ?>

                    <form action="carro/addproducto" method="post">
                        <input type="hidden" name='id' value=<?php echo $item['idProductos'] ?>>
                        <input type="submit" class="btn" value='Carrito' style="width:14rem;height: 2rem;margin-top: 0;margin-bottom:0;padding:0;">
                    </form>
                <?php endif; ?>
                    <form action="detalles" method="post">
                        <input type="hidden" name='id' value=<?php echo $item['idProductos'] ?>>
                        <input type="submit" class="btn" value="ficha producto" style="width:14rem;height: 2rem;margin-top: 0;margin-bottom: 0px;padding:0; ">
                    </form>
                    <h3> <?php echo $item['nombre']; ?></h3>
                    <h4 class="price"><?php echo $item['precio']; ?>€</h4>
                </div>
            </div>


        <?php endforeach; ?>


    </div>
</section>




<section class="pagination">
   <p> <?php echo "página:" . $_SERVER['actual'] . " de " . $_SERVER['pagina']; ?></p>
        <span>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <input type="hidden" name='pagina' value=1><input class="btn btn-outline-primary" type="submit" name='submit' value='1'></form>
        </span>
        <?php for ($i = 2; $i <= $_SERVER['pagina']; $i++) : ?>
            <span>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <input type="hidden" name='pagina' value=<?php echo $i ?>><input class="btn btn-outline-secondary" type="submit" name='submit' value='<?php echo $i ?>'></form>

            </span>
        <?php endfor; ?>
        <!--<span><i class='bx bx-right-arrow-alt'></i></span>-->
    </div>
</section>