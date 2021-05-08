
<?php

class detalles extends Controller
{
/*clase para mostrar los detalles de un producto concreto*/
//*solo tengo un metodo el de listar esos detalles 
    public function index()
    {
        $viewmodel = new detallesModel();
        $this->returnView($viewmodel->Index(), true);
    }
}
