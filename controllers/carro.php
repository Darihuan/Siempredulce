<?php
class carro extends Controller
//*controladores para la funcionalidad del carro menos el inde las demas no necesitan
//*una vista,como vemos el carro lista productos, se puede añadir y tambien puede borrar productos
//*del mismo
//*para contar la cantidad de productos de un mismo tipo utilizo funciones auxiliares dentro del modelo*/
{
	protected function Index()
	{
		$viewmodel = new CarroModel();
		$this->returnView($viewmodel->Index(), true);
	}
	protected function addproducto(){
		$viewmodel = new CarroModel();
		$viewmodel->addproducto();
		Messages::setMsg("Producto añadido al carro","exito");
		header('Location:'.ROOT_URL.'productos');

	}
	protected function deleteproducto(){
		$viewmodel = new carroModel();
		$viewmodel->deleteproducto();
		Messages::setMsg("Producto quitado del carro","error");
		header('Location:'.ROOT_URL.'carro');

	}



}
