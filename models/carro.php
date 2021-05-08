<?php
class carroModel extends Model
{
	//************FUNCIONES PRINCIPALES*************** */
	//*listar productos en el carro de un usuario*/
	//*utilizo un identificador unico que consiste en $idusuario y $idpedido para identificar las lineas
	//*que quiero seleccionar
	public function Index()
	{
		$id = $_SESSION['user_data']['id'];
		$idpedido = $_SESSION['idPedido'];

		$this->query("SELECT * FROM producto where idProductos in (Select Producto_idProductos from producto_has_pedido where usuario_idUsuario=$id AND Pedido_idPedido=$idpedido)");
		$rows = $this->resultSet();

		return $rows;
	}
	/*añadir productos al carro*/
	//*con un id que tomo de cada producto(mediante un formulario "metodo post")
	//*hago un insert en lineas de carro con el identificador unico de pedido que he descrito antes;
	public function addproducto()
	{

		$idpedido = $_SESSION['idPedido'];
		$idproducto = $_POST['id'];
		$idusuario = $_SESSION['user_data']['id'];

		$this->query("INSERT INTO producto_has_pedido (Producto_idProductos,Pedido_idPedido,usuario_idUsuario) VALUES ($idproducto,$idpedido,$idusuario)");
		$this->execute();
	}
	/*borrar productos del carro*/
	//*con el identificador $id pedido y el $idpedido que tomo con un formulario (metodo post) hborro un producto del carro 
	//*este metodo borra todas las lineas del mismo tipo de producto en un mismo pedido
	public function deleteproducto()
	{

		$idpedido = $_SESSION['idPedido'];
		$idproducto = $_POST['id'];


		$this->query("DELETE FROM producto_has_pedido WHERE  Pedido_idPedido=$idpedido and Producto_idProductos=$idproducto");
		$this->execute();
	}
	//***********************METODOS AUXILIARES************************************************************ */
	/*contar cantidad de cada producto*/
	//*utilizo un metodo estatico que luego uso a nivel de vista para mostrar los datos
	//*el metodo recibe el$idproducto y el $idpedido y devuelve un entero con todas las coincidencias en en ese pedido para ese producto
	//*es decir la cantidad

	public static function cantidadproducto($idproducto, $idpedido)
	{
		$idusuario = $_SESSION['user_data']['id'];

		$conexion = new carroModel();
		$conexion->query("SELECT COUNT(*) FROM producto_has_pedido WHERE Producto_idProductos=$idproducto AND Pedido_idPedido=$idpedido AND usuario_idUsuario=$idusuario ");
		$row = $conexion->single();
		foreach ($row as $cifra) {
			$cantidad = $cifra;
		}


		return $cantidad;
	}
	/*ultimo pedido*/
	//*este metodo recibe un $id en este caso un identificador de unusario y devuelve un entero
	//* que corresponde al ultimo pedido para ese identificador

	public function ultimoidpedido($id)
	{
		$this->query("SELECT MAX(idPedido)  from pedido where Usuario_idUsuario=$id");
		$row = $this->single();
		foreach ($row as $id) {

			$idpedido = $id;
		}

		return $idpedido;
	}

	/*control carro */
	//*no he usado este metodo pero a la larga tendria que imprementar algo así
	//*el uso de la pagína genera muchos registros de pedios que no se han realizado
	//* y por consiguiente de sus carros con muchos clientes esto serria una locura de datos
	//* por lo tanto mi solucion seria borrar los datos de los pedidos y de sus carros
	//*cuando el total de pedido es 0,este metodo lo usaria en el cierre de sesion.

	public function controlcarro()
	{

		$idpedido = $_SESSION['idPedido'];
		$this->query("DELETE FROM producto_has_pedido where Pedido_idPedido=$idpedido ");
		$this->execute;

		$this->query("DELETE FROM pedido where idPedido=$idpedido and total=0");
		$this->execute;
	}
}
