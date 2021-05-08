<?php
class Productos extends Controller
/**clase para mostras los productos */

// los productos tienen una gestion muy simple solo debo mostrarlos y  poder seleccionarlos por id
{
	protected function Index()
	{
		$viewmodel = new ProductosModel();
		$this->returnView($viewmodel->Index(), true);
	}

	public function Indexid()
	{

		$viewmodel = new ProductosModel();
		$this->returnView($viewmodel->Indexid(), true);
	}
}
