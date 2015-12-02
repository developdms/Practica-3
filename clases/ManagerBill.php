<?php

/**
 * Description of ManagerBill
 *
 * @author MARTIN
 */
class ManagerBill {

    private $bd = NULL;
    private $table = 'Bill';

    function __construct(Database $bd) {
        $this->bd = $bd;
    }

    function read($params) {
        $this->bd->read($this->table, '*', $params);
        $param = $this->bd->getRow();

        if ($param) {
            $bill = new Bill();
            $bill->set($param);
            return $bill;
        }
        return NULL;
    }

    function get($idBill) {
        $params['idBill'] = $idBill;
        $this->bd->select($this->table, '*', 'idBill=:idBill', $params);
        $param = $this->bd->getRow();
        if ($param) {
            $bill = new Bill();
            $bill->set($param);
            return $bill;
        }
        return NULL;
    }

    function delete(Bill $param) {
        $params['idBill'] = $param->getIdBill();
        $r = $this->bd->delete($this->table, 'idBill=:idBill', $params);
        return $r;
    }

    // Borra un dispositivo de la tabla
    function erase(Bill $param) {
        return $this->delete($param->getIdBill());
    }

    //Retorna número de filas modificadas
    function set(Bill $param) {
        $where['idBill'] = $param->getIdBill();
        return $this->bd->update($this->table, $param->get(), $where);
    }

    // Inserta un dispositivo nuevo y retorna el id del elemento insertado
    function insert(Bill $param) {
        $params = array();
        foreach ($param->get() as $key => $value) {
            if ($value !== 'NOW') {
                $params[$key] = $value;
            }
        }
        return $this->bd->insert($this->table, $params, true, 'password');
    }

    // Selecciona todos los registros de una tabla
    function getList($params = array()) {
        $p = array();
        foreach ($params as $key => $value) {
            if ($value !== '') {
                $p[$key] = $value;
            }
        }
        $this->bd->read($this->table, '*', $p);
        $r = array();
        while ($param = $this->bd->getRow()) {
            $bill = new Bill();
            $bill->set($param);
            $r[] = $bill;
        }
        return $r;
    }

    // Selecciona todos los registros de una tabla
    function getListTime($params = array()) {
        $p = array();
        $condicion = '1 = 1';
        foreach ($params as $key => $value) {
            if ($value !== '') {
                $p[$key] = $value;
            }
        }
        foreach ($p as $key => $value) {
           if($key === 'fechaini'){
               $condicion .= " and infoDateTime >=:$key";
           }elseif($key === 'fechafin'){
               $condicion .= " and infoDateTime <=:$key";
           }elseif($key === 'status'){
               $condicion .= " and status >=:$key";
           }
        }
        $this->bd->select($this->table, '*', $condicion,$p);
        $r = array();
        while ($param = $this->bd->getRow()) {
            $bill = new Bill();
            $bill->set($param);
            $r[] = $bill;
        }
        return $r;
    }

    function count($params = array()) {
        return $this->bd->count($this->table, $params);
    }

}
