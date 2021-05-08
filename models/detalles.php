<?php

class detallesModel extends Model{
    /*****************METODOS PRINCIPALES**************** */

    /*listar lienas de un pedidos*/
    //esta funcion recibe un id de un producto mediante post y devuelve todos sus datos
    //*devuelve array de arrays asociativos con nosbres relativos a la base de datos;
    public function index(){

        $idproducto=$_POST['id'];

        $this->query("SELECT * FROM producto where idProductos=$idproducto");
        $row=$this->resultSet();

        return $row;





    }


}
