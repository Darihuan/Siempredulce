<!-- Product Details -->

<?Php foreach ($viewmodel as $item) : ?>
  <section class="section product-detail">
    <div class="details container-md">
      <div class="left">
        <div class="main">
          <img src="../../siempredulce/img/<?php echo $item['foto'] ?>" alt="">
        </div>
      </div>
      <div class="right">
        <span><?php $item['descripcion'] ?></span>
        <h1><?php $item['nombre'] ?></h1>
        <div class="price"><?php $item['precio'] ?></div>


        <form>
          <div>
            <select>
              <option value="Select Size" selected disabled>Select Size</option>
              <option value="1">32</option>
              <option value="2">42</option>
              <option value="3">52</option>
              <option value="4">62</option>
            </select>
            <span><i class='bx bx-chevron-down'></i></span>
          </div>
        </form>


        <form class="form">
          <input type="text" placeholder="1">

        </form>
        <form action="<?php echo ROOT_PATH; ?>carro/addproducto" method='post'>
          <input type="hidden" name='id' value="<?php echo $item['idProductos'] ?>">
          <input type="submit" name="submit" value='carro'>
        </form>
        <h3>Product Detail</h3>
        <p><?php echo $item['descripcion'] ?></p>
      </div>
    </div>
  </section>
<?php endforeach; ?>