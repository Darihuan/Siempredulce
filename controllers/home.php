<?php
/*clase para la pagina principal*/
/*solo un metodo el de mostrar*/
class Home extends Controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}
}