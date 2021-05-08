
<?php



session_start();
// Include Config
require('config.php');
require("classes/messages.php");
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/productos.php');
require('controllers/users.php');
require('controllers/crud.php');
require('controllers/carro.php');
require('controllers/detalles.php');
require('controllers/pedidos.php');



require('models/home.php');
require('models/productos.php');
require('models/user.php');
require('models/crud.php');
require('models/carro.php');
require('models/detalles.php');
require('models/pedidos.php');

if (isset($_COOKIE['Cookie'])) {
  UserModel::logincookie($_COOKIE['cookie']);
  echo $_COOKIE['sesion_larga'];
}


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller) {
  $controller->executeAction();
}
