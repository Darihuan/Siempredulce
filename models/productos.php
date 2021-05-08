<?php
class ProductosModel extends Model
{

	/***********************FUNCIONES PRINCIPALES***************************************************/
	/*listar productos con paginado*/
	//*esta funcion lista los productos en la base de datos con un limite establecido por la 
	//*funcion paginado, el limite de productos por pagina se recibe en la variable de $_SESSION['limitepaginas']
	//*el primer producto que debe listar es devuelto por la funcion paginado
	//* el metodo devuelve un array con el resultado de la consulta
	public function Index()
	{

		$puntero = $this->paginado();
		$productospp = $_SERVER['limiteprods'];

		/*fin paginado*/


		$this->query("SELECT * FROM producto LIMIT $puntero,$productospp");
		$rows = $this->resultSet();

		return $rows;
	}
	/*listar productos con una id*/
	//lista los datos de un producto  por una id de porducto, esta $id la recibe por metodo post
	//*este metodo devuelve un array con el resultado de la consulta

	public function Indexid()
	{

		$id = $_POST['id'];

		$this->query("SELECT * FROM producto where idProductos=$id");
		$rows = $this->resultSet();

		return $rows;
	}
	/*****************************FUNCIONES AUXILIARES********************************************************** */
	/*paginado para productos*/
	//este metodo devuelve un entero que corresponde al puntero de la consulta
	//por otro lado establece varias variables de servidor que se usaran para dibujar el paginado
	//$_SERVER['limitepaginas'] para el numero de productos por pagina
	//$_SERVER['pagina']  para la cantidad de paginas totales que habra
	//$_SERVER['actual'] la pagina en la que se esta actualmente
	public function paginado()
	{


		if (!isset($_POST['submit'])) {
			$pagina = 1;
		} else {
			$pagina = $_POST['pagina'];
		}

		$this->query('SELECT *FROM producto ');
		$res = $this->execute();

		$_SERVER['limiteprods'] = 8;
		$consultastotales = $this->rowCount();
		$numerodepaginas = ceil($consultastotales / $_SERVER['limiteprods']);
		$puntero = ($pagina - 1) * $numerodepaginas;
		$_SERVER['pagina'] = $numerodepaginas;
		$_SERVER['actual'] = $pagina;
		return $puntero;
	}
}
