<?php
class crudModel extends Model
{

	/****************FUNCIONES CREAR*******************************/
	/*funcion añadir productos*/
	//*esta funcion recibe mediante un formulario ('post') los datos necesarios
	//*para insetar un registro,es capaz de tranferir archivos dentro del servidor a la carpeta 
	//* rootpath/img,yo utilizo esta funcionalidad para tranferir fotos y luego usarlas
	//*en el futuro seria bueno filtrar los archivos para no admitir archivos no fotos o fotos muy pesadas
	public function add()
	{

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if (isset($post['submit'])) {


			//*bloque de codigo para meter imagenes*/
			$nombre_img = $_FILES['foto']['name'];
			$dir_tmp = $_FILES['foto']['tmp_name'];

			$directorio_img = './img/' . $nombre_img;


			move_uploaded_file($dir_tmp, $directorio_img);


			/*fin imagenes*/

			$this->query('INSERT INTO producto(idProductos, total, categoria, precio, descripcion, nombre,foto) VALUES (:id,:cantidad,:categoria,:precio,:descripcion,:nombre,:foto)');
			$this->bind(':id', $post['id']);
			$this->bind(':cantidad', $post['cantidad']);
			$this->bind(':categoria', $post['categoria']);
			$this->bind(':precio', $post['precio']);
			$this->bind(':descripcion', $post['descripcion']);
			$this->bind(':nombre', $post['nombre']);
			$this->bind(':foto', $nombre_img);
			$this->execute();
			header('Location:' . ROOT_URL . 'crud');
			// Verify
			if ($this->lastInsertId()) {
				// Redirect
				header('Location:' . ROOT_URL . 'crud');
			}
		}
		return;
	}
	/*mmetodo para añadir usuario*/
	//*el administrador puede añadir usuarios y setear que tipo de usuario es 
	//*los datos se reciben mediante un formulario
	public function adduser()
	{
		if (isset($_POST['submit'])) {
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			/*uso de encriptacion unidireccional para contraseña*/
			$password = password_hash($post['password'], PASSWORD_DEFAULT);




			if ($post['submit']) {
				if ($post['name'] == "") {
					Messages::setMsg("please fill the name", 'error');
				} else if ($post['email'] == "") {
					Messages::setMsg("please fill the email", 'error');
				} else if ($post['password'] == "") {
					Messages::setMsg("please fill the pasword", 'error');
				}

				$this->query("INSERT INTO usuario  (nombreCompleto,direccion,TipoUsuario,password,email) VALUES (:name,:adress,:tipo,:pass,:email)");
				$this->bind(':name', $post['name']);
				$this->bind(':adress', $post['direccion']);
				$this->bind(':email', $post['email']);
				$this->bind(':tipo', $post['tipo']);
				$this->bind(':pass', $password);
				$this->execute();
				if ($this->lastInsertId() > 0) {

					header('Location: ' . ROOT_URL . 'crud/users');
				}
			}
		}
		return;
	}

	/****************FUNCIONES LISTAR*******************************/
	/*listar productos*/
	//*esta funcion selecciona todos los productos disponibles y devuelve un array con nombres asociativos
	//*que corresponde a los nombres de los campos en la bbdd
	public function Index()
	{
		$this->query('SELECT * FROM producto ');
		$rows = $this->resultSet();
		return $rows;
	}
	/*listar un producto concreto*/
	//*esta funcion selecciona un producto en concreto recibe el id del producto por metodo post
	//* devuelve un array con nombres asociativos
	//*que corresponde a los nombres de los campos en la bbdd

	public function Indexid()
	{

		$id = $_POST['id'];
		$this->query("SELECT * FROM producto where idProductos=$id");
		$rows = $this->resultSet();
		return $rows;
	}

	/*listar usuarios*/
	//*esta funcion selecciona todos los usuarios y devuelve un array con nombres asociativos
	//*que corresponde a los nombres de los campos en la bbdd
	public function users()
	{
		$this->query('SELECT * FROM usuario ');
		$rows = $this->resultSet();
		return $rows;
	}
	/*listar pedidos*/
	//*esta funcion selecciona los ´pedidos y devuelve un array con nombres asociativos
	//*que corresponde a los nombres de los campos en la bbdd
	/**SOLO SELECIONA PEDIDOS TERMINADOS  */
	public function pedidos()
	{
		$this->query("SELECT * FROM pedido where estado='terminado'");
		$rows = $this->resultSet();
		return $rows;
	}
	/****************FUNCIONES ACTUALIZAR*******************************/
	/*update productos*/
	//*funcion cambia los campos de producto con una iddeterminada
	//*los datos los toma por metodo post
	public function update()
	{
		
			//*bloque de codigo para meter imagenes*/
			$nombre_img = $_FILES['foto']['name'];
			$dir_tmp = $_FILES['foto']['tmp_name'];

			$directorio_img = './img/' . $nombre_img;


			move_uploaded_file($dir_tmp, $directorio_img);


		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			$total = $_POST['cantidad'];
			$categoria = $_POST['categoria'];
			$precio = $_POST['precio'];
			$descripcion = $_POST['descripcion'];
			$nombre = $_POST['nombre'];
			// Insert into MySQL
			$this->query("UPDATE producto set total=$total,categoria='$categoria',precio=$precio,descripcion='$descripcion',nombre='$nombre' WHERE idProductos=$id");


			$this->execute();
			header('Location:' . ROOT_URL . 'crud');
		}
		return;
	}
		/*update usuarios*/
	//*funcion cambia los campos de usuarios con una iddeterminada
	//*los datos los toma por metodo post

	public function usersupdate()
	{


		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$direccion = $_POST['direccion'];
			$tipo = $_POST['tipo'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			// Insert into MySQL
			$this->query("UPDATE usuario set nombreCompleto=$nombre,direccion='$direccion',TipoUsuario=$tipo,password='$pass',email='$email' WHERE idUsuario=$id");


			$this->execute();
			header('Location:' . ROOT_URL . 'crud/users');
		}
		return;
	}
	/****************FUNCIONES BORRAR*******************************/
	/*borrar un producto*/
	//*este metodo borra un producto de la tabla productos
	//* recibe el id del producto por metodo post
	public function delete()
	{


		if (isset($_POST['submit'])) {
			$id = $_POST['id'];

			$this->query("DELETE FROM producto WHERE idProductos=$id");


			$this->execute();


			header('Location: ' . ROOT_URL . 'crud');
		}
		return;
	}
	/*borrar un usuario*/
	//*este metodo borra un usuario de la tabla usuarios
	//* recibe el id del iusuario por metodo post
	public function usersdelete()
	{


		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			// Insert into MySQL
			$this->query("DELETE FROM usuario WHERE idUsuario=$id");


			$this->execute();

			// Verify

			// Redirect
			header('Location: ' . ROOT_URL . 'crud/users');
		}
		return;
	}

	/**************METODOS AUXILIARES**************/
	/*lista datos de un usuario*/
	/***lo uso para pasar los datos en un update de usuarios*/
	public function usersmodificar()
	{
		$id = $_POST['id'];
		$this->query("SELECT * FROM usuario  where idUsuario=$id");
		$rows = $this->resultSet();
		return $rows;
	}
}
