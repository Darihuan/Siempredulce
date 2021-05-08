
<?php


class pedidosModel extends Model
{
    /*****************METODOS PRINCIPALES**********************************/

    /*realizar un pedido*/
    //*a nivel conceptual un pedido esta realizado cuando el total del pedido se actualiza al total del importe del carro, 
    //*cuando el estado del pedido pasa a terminado y cuando el numero del pedido del cliente cambia a otro que no sea el actual.

    //*este metodo hace estas labores y como calculo el total del pedido a nivel de vista aprovechando el bucle para listar el carro


    //*el metodo recibe $total el importe del pedido,$id pedido,$idcliente y realiza las funciones antes descritas


    public function realizar()
   
    {
        $total=$_SESSION['total'];
        $idpedido=$_SESSION['idPedido'];
        $idcliente=$_SESSION['user_data']['id'];
      
        $this->query("UPDATE PEDIDO SET Usuario_idUsuario=$idcliente,totalpedido=$total,estado='terminado' where idPedido=$idpedido ");
        $this->execute();
        $_SESSION['pedido_terminado'] = $idpedido;

        /*esteblecer un pedido nuevo*/

        $this->query("INSERT INTO pedido (totalpedido,Usuario_idUsuario,estado) VALUES (0,$idcliente,'proceso') ");
        $_SESSION['pedido'] = $this->resultSet();
        $_SESSION['idPedido'] = $this->ultimoidpedido($idcliente);
        $idpedido = $this->ultimoidpedido($idcliente);

       
    }
    /*mostrar pedidos de un cliente*/
    //*este metodo recibe el id de cliente mediante una variable de sesion y devuelve los pedidos
    //*que ha realizado ese id con un estado=terminado
    public function resumen(){
        $idusuario=$_SESSION['user_data']['id'];
        

        $this->query("SELECT * FROM pedido where Usuario_idUsuario=$idusuario and estado='terminado'");
        $rows=$this->resultSet();

        return $rows;

    }

    /**********************************METODOS AUXILIARES************************************************************************* */
    /*devuelve id ultimo pedidos*/
    //este metodo recibe un id de usuario y devuelve un entero que corresponde al ultimo id de pedido para ese usuario.
    public function ultimoidpedido($id)
    {
        $this->query("SELECT MAX(idPedido)  from pedido where Usuario_idUsuario=$id");
        $row = $this->single();
        foreach ($row as $id) {

            $idpedido = $id;
        }
        return $idpedido;
    }

   
}
