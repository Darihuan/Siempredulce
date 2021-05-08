<?php
class UserModel extends Model
{

	/****************************METODOS PRINCIPALES**************************************** */
	/*listar usuario por id*/
	//recibe id e usuario por una variable de sesion que se genera en el login y 
	//devuelve los datos de un usuario con ese idde usuario
	public function Index()
	{
		$id = $_SESSION['user_data']['id'];
		$this->query("SELECT * FROM usuario WHERE idUsuario=$id");
		$rows = $this->resultSet();
		return $rows;
	}
	/*registrarse*/
	//crea usuarios nuevos 
	//recibe datos mediante metodo post
	//la constraseña esta protegida mediante el metodo password_hash
	//esto hace que nosotros como adsitrador no ppodamos saberla en ningun momento 
	//y lo hace mas seguro e invulnerable a tablas rainbow

	public function register()
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
				$this->bind(':tipo', 'comprador');
				$this->bind(':pass', $password);
				$this->execute();





				if ($this->lastInsertId() > 0) {

					header('Location: ' . ROOT_URL . 'users/login');
				}
			}
		}
		return;
	}
	/*metodo para validad credenciales*/
	//la validadcion se realiza cotejando los datos de email y contraseña
	//si son correctos se genera una variable de sesion que identifica que se esta logueado
	//tambien se generan otras variables utiles.
	//si el usuario asi lo ha indicado se genera un cookie que se podra utilizar en lugar de utilizar el login en el futuro
	
	public function login()

	{


		if (isset($_POST['submit'])) {
			$var = $_POST['email'];
			setcookie("sesion_larga", $var, time() + 3600000);
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


			$email = $post['email'];
			$query = "SELECT password from usuario where email='$email'";
			$this->query($query);
			$this->execute();
			$Setpass = $this->single();


			/*uso de encriptacion unidireccional para contraseña*/
			/*compruebo contraseña antes de la consulta*/

			if (password_verify($post['password'], $Setpass['password'])) {

				if ($post['submit']) {


					$this->query("SELECT * FROM usuario where email=:email");
					$this->bind(':email', $post['email']);

					$row = $this->single();
				}

				if (isset($row)) {
					$_SESSION['loggeado'] = true;
					if ($row['TipoUsuario'] == 'Admin') {
						$_SESSION['Admin'] = true;
					}

					$_SESSION['user_data']['id'] = $row['idUsuario'];
					$_SESSION['user_data']['email'] = $row['email'];
					$_SESSION['user_data']['nombre'] = $row['nombre'];
					/**inicio un pedido para el usuario o recupero el ultimo pedido de ese usuario si no ha cerrado sesion  **/
					$id = $_SESSION['user_data']['id'];
					if (!isset($_SESSION['pedido'])) {

						$this->query("INSERT INTO pedido (totalpedido,Usuario_idUsuario,estado) VALUES (0,$id,'proceso') ");
						$_SESSION['pedido'] = $this->resultSet();
						$_SESSION['idPedido'] = $this->ultimoidpedido($id);
						$idpedido = $this->ultimoidpedido($id);
					} else {

						$idpedido = $this->ultimoidpedido($id);
						$this->query("SELECT * FROM pedido where usuario_idUsuario=$idpedido");
						$_SESSION['idPedido'] = $idpedido;
						$_SESSION['pedido'] = $this->resultSet();
					}
					/*fin de inicio pedido*/




					Messages::setMsg("loggin correcto", "correcto");
					header("location:" . ROOT_URL . "productos");
				}




				Messages::setMsg("loggin correcto", "correcto");
				header("location:" . ROOT_URL . "productos");
			} else {
				Messages::setMsg("login incorrecto", "error");
			}
		}
		return;
	}
	/*metodo login con cookie*/
	//login simplificado cuando existe la cookie creada*/

	public static function logincookie($email)
	{
		$conexion = new UserModel();

		$conexion->query("SELECT * FROM usuario where email=$email");


		$row = $conexion->single();
		if (isset($row)) {
			$_SESSION['loggeado'] = true;
			if ($row['TipoUsuario'] == 'Admin') {
				$_SESSION['Admin'] = true;
			}

			$_SESSION['user_data']['id'] = $row['idUsuario'];
			$_SESSION['user_data']['email'] = $row['email'];
			$_SESSION['user_data']['nombre'] = $row['nombre'];
			/**inicio un pedido para el usuario o recupero el ultimo pedido de ese usuario si no ha cerrado sesion  **/
			$id = $_SESSION['user_data']['id'];
			if (!isset($_SESSION['pedido'])) {

				$conexion->query("INSERT INTO pedido (totalpedido,Usuario_idUsuario,estado) VALUES (0,$id,'proceso') ");
				$_SESSION['pedido'] = $conexion->resultSet();
				$_SESSION['idPedido'] = $conexion->ultimoidpedido($id);
				$idpedido = $conexion->ultimoidpedido($id);
			} else {

				$idpedido = $conexion->ultimoidpedido($id);
				$conexion->query("SELECT * FROM pedido where usuario_idUsuario=$idpedido");
				$_SESSION['idPedido'] = $idpedido;
				$_SESSION['pedido'] = $conexion->resultSet();
			}
			/*fin de inicio pedido*/




			Messages::setMsg("loggin correcto", "correcto");
			header("location:" . ROOT_URL . "productos");
		} else {
			Messages::setMsg("login incorrecto", "error");
		}
	}
	/*metodo para actualizar datos usuario*/
	//cambiar datos de usuario, menos el tipo de usuario,el id y lacontraseña
	//sirve para que un usuario cambie sus datos una vez registrado
	//recibe datos mediante metodo posta

	public function usersupdate()
	{


		if (isset($_POST['submit'])) {
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$direccion = $_POST['direccion'];

			$pass = $_POST['pass'];
			$email = $_POST['email'];
			// Insert into MySQL
			$this->query("UPDATE usuario set nombreCompleto='$nombre',direccion='$direccion',TipoUsuario='comprador',password='$pass',email='$email' WHERE idUsuario=$id");


			$this->execute();
			header('Location:' . ROOT_URL . 'users');
		}
		return;
	}

	/************************METODOS AUXILIARES***************************************** */
	/*seleciona usuario por id*/
	//recibe id usuario y devuelve sus datos 
	//devuelve array con daos consulta
	
	public function usersmodificar()
	{
		$id = $_SESSION['user_data']['id']; 
		$this->query("SELECT * FROM usuario  where idUsuario=$id");
		$rows = $this->resultSet();
		return $rows;
	}
	/*ultimo pedido*/
	//recibe una idde isuario por parametros
	//devuelve un entero que corresponde al id del ultimo pedido para esa id

	public function ultimoidpedido($id)
	{
		$this->query("SELECT MAX(idPedido)  from pedido where Usuario_idUsuario=$id");
		$row = $this->single();
		foreach ($row as $id) {

			$idpedido = $id;
		}

		return $idpedido;
	}


	/*sin uso*/
	public function controlcarro()
	{
		
		$idpedido = $_SESSION['idPedido'];
		$this->query("DELETE FROM producto_has_pedido where Pedido_idPedido=$idpedido ");
		$this->execute;


	
		$this->query("DELETE FROM pedido where totalpedido= 0 ");
		$this->execute;
	}

	/*sin uso*/

	
}
