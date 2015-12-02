<?php

/**
 * Description of ManagerProduct
 *
 * @author MARTIN
 */
class ManagerProduct {

    private $bd = NULL;
    private $table = 'Product';

    function __construct(Database $bd) {
        $this->bd = $bd;
    }

    function read($params) {
        $this->bd->read($this->table, '*', $params);
        $param = $this->bd->getRow();

        if ($param) {
            $user = new User();
            $user->set($param);
            return $user;
        }
        return NULL;
    }

    function get($idProduct) {
        $params['idProduct'] = $idProduct;
        $this->bd->select($this->table, '*', 'idProduct=:idProduct', $params);
        $param = $this->bd->getRow();
        if ($param) {
            $product = new Product();
            $product->set($param);
            return $product;
        }
        return NULL;
    }

    function delete(Product $param) {
        $params['idProduct'] = $param->getIdProduct();
        $r = $this->bd->delete($this->table, 'idProduct=:idProduct', $params);
        return $r;
    }

    // Borra un producto de la tabla
    function erase(Product $param) {
        return $this->delete($param->getIdProduct());
    }

    //Retorna número de filas modificadas
    function set(Product $param) {
        $where['idProduct'] = $param->getIdProduct();
        return $this->bd->update($this->table, $param->get(), $where);
    }

    // Inserta un producto nuevo y retorna el id del elemento insertado
    function insert(Product $param) {
        return $this->bd->insert($this->table, $param->get(), true, 'password');
    }

    // Selecciona todos los registros de una tabla
    function getList($params = array()) {
        $p = array();
        foreach ($params as $key => $value) {
            if($value !== ''){
                $p[$key] = $value;
            }
        }
        $this->bd->read($this->table, '*', $p);
        $r = array();
        while ($param = $this->bd->getRow()) {
            $product = new Product();
            $product->set($param);
            $r[] = $product;
        }
        return $r;
    }

    function count() {
        return $this->bd->count($this->table);
    }

    function getError() {
        return $this->bd->getQueryError()[1];
    }

}
