<?php
class Users extends Controller
/**clase para conrolar todos los aspectos relativos a los usuarios */
//registro,login y logout,y hacer update de datos, todos esto a nivel de usuario l 
{
    public function index()
    {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->index(), true);
    }

    protected function register()
    {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->register(), true);
        Messages::setMsg("Usuario registrado con exito","exito");
    }


    protected function login()
    {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(), true);
        
    }

    protected function logout()
    {
        if (isset($_SESSION['loggeado'])) {
            $viewmodel = new UserModel();
            $viewmodel->controlcarro();
            Messages::setMsg("log out","error");

            unset($_SESSION['loggeado']);
            unset($_SESSION['user_data']);
            unset($_SESSION['pedido']);
            unset($_SESSION['idPedido']);
            session_start();
            session_destroy();
            header("location:" . ROOT_URL);
        }
    }

    protected function usersmodificar()
    {
        if (isset($_SESSION['loggeado'])) {
            $viewmodel = new UserModel();

            $this->returnView($viewmodel->usersmodificar(), true);
            Messages::setMsg("Tus datos han sido modificados","exito");
            
        }
    }

    protected function usersupdate()
    {


        if (isset($_SESSION['loggeado'])) {
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->usersupdate(), true);
            Messages::setMsg("Tus datos han sido modificados","exito");
            header('Location:' . ROOT_URL . 'crud');
        }
    }
}
