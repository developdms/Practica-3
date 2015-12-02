<?php
/**
 * Description of ManagerOrderDetail
 *
 * @author MARTIN
 */
class ManagerOrderDetail {
    private $bd = NULL;
    private $table = 'OrderDetail';

    function __construct(Database $bd) {
        $this->bd = $bd;
    }

    function read($params) {
        $this->bd->read($this->table, '*', $params);
        $param = $this->bd->getRow();
        
        if ($param) {
            $orderDetail = new OrderDetail();
            $orderDetail->set($param);
            return $orderDetail;
        }
        return NULL;
    }

    function get($idOrderDetail) {
        $params['idOrderDetail'] = $idOrderDetail;
        $this->bd->select($this->table, '*', 'idOrderDetail=:idOrderDetail', $params);
        $param = $this->bd->getRow();
        if ($param) {
            $orderDetail = new OrderDetail();
            $orderDetail->set($param);
            return $orderDetail;
        }
        return NULL;
    }

    function delete(OrderDetail $param) {
        $params['idOrderDetail'] = $param->getIdOrderDetail();
        $r = $this->bd->delete($this->table, 'idOrderDetail=:idOrderDetail', $params);
        return $r;
    }

    // Borra un dispositivo de la tabla
    function erase(OrderDetail $param) {
        return $this->delete($param->getIdOrderDetail());
    }

    //Retorna número de filas modificadas
    function set(OrderDetail $param) {
        $where['idOrderDetail'] = $param->getIdOrderDetail();
        return $this->bd->update($this->table, $param->get(),$where);
    }

    // Inserta un dispositivo nuevo y retorna el id del elemento insertado
    function insert(OrderDetail $param) {
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
            $orderDetail = new OrderDetail();
            $orderDetail->set($param);
            $r[] = $orderDetail;
        }
        return $r;
    }
    
    function count($params=array()) {
        return $this->bd->count($this->table,$params);   
    }
    
    function sum($params){
        return $this->bd->sum($this->table,$params);
    }
}
