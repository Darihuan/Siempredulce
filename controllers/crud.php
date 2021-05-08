
<?php
/*clase controlador para el CRUD*/
//* asi llamo a los metodos, que me permiten gestionar,la pagina a un nivel de administrador
//*los metodos de esta clase permiten añadir,listar,actualizar y borrar las distintas bases de datos 
//*de la página siempre y cuando tenga alguna logica hacerlo.
class crud extends Controller
{

	/*********************FUNCIONES CREAR************************************** */

	protected function add()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();
			$this->returnView($viewmodel->add(), true);
			Messages::setMsg("nuevo producto añadido","exito");
			header('Location:' . ROOT_URL . 'crud/index');
		}
	}
	protected function adduser()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();
			$viewmodel->adduser();
			Messages::setMsg("nuevo producto añadido","exito");
			header('Location:' . ROOT_URL . 'crud/users');
		}
	}
	/**************FUNCIONES LISTAR******************* */
	protected function Index()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();
			$this->returnView($viewmodel->Index(), false);
		}
	}
	protected function Indexid()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();

			$this->returnView($viewmodel->Indexid(), false);
		}
	}
	protected function users()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();
			$this->returnView($viewmodel->users(), false);
		}
	}
	protected function pedidos()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();
			$this->returnView($viewmodel->pedidos(), false);
		}
	}
	/***********************FUNCIONES ACTUALIZAR******************************************** */


	protected function update()
	{

		if ($_SESSION['Admin']) {

			$viewmodel = new crudModel();
			$this->returnView($viewmodel->update(), true);
			Messages::setMsg("Productomodificado con exito","exito");
			header('Location:' . ROOT_URL . 'crud');
		}
	}
	protected function usersmodificar()
	{
		if ($_SESSION['Admin']) {
			$viewmodel = new crudModel();
		
			$this->returnView($viewmodel->usersmodificar(), false);
		}
	}

	protected function usersupdate()
	{

		if ($_SESSION['Admin']) {

			$viewmodel = new crudModel();
			
			$this->returnView($viewmodel->usersupdate(), true);
			Messages::setMsg("usuario modificado con exito","exito");
			header('Location:' . ROOT_URL . 'crud');
		}
	}




	/************************FUNCIONES BORRAR*************************************** */
	protected function delete()
	{
		if ($_SESSION['Admin']) {


			$viewmodel = new crudModel();
			$this->returnView($viewmodel->delete(), true);
			Messages::setMsg("Producto eliminado","error");
			header('Location:' . ROOT_URL . 'crud/index');
		}
	}

	public function usersdelete()
	{
		if ($_SESSION['Admin']) {


			$viewmodel = new crudModel();
			$viewmodel->usersdelete();
			Messages::setMsg("Usuario eliminado","error");
			header('Location:' . ROOT_URL . 'crud/users');
		}
	}
}
