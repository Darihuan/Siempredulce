<?php
class pedidos extends Controller{
	/*clase para gestionar los pedidos*/
	//*los pedidos los realizo con un metodo estatico asi que solo uso el controlador para 
	//*listar los pedidos de cada usuario luego

	public function resumen(){
		$viewmodel = new pedidosModel();
		$this->returnView($viewmodel->resumen(), true);
	}
	public function realizar(){
		$viewmodel = new pedidosModel();
		$viewmodel->realizar();

		Messages::setMsg("Pedido realizado con exito","exito");
		header('Location:' . ROOT_URL .'home');
	}

}