<?php
/**
 * Description of ManagerDevice
 *
 * @author MARTIN
 */
class ManagerDevice {
    private $bd = NULL;
    private $table = 'Device';

    function __construct(Database $bd) {
        $this->bd = $bd;
    }

    function read($params) {
        $this->bd->read($this->table, '*', $params);
        $param = $this->bd->getRow();
        
        if ($param) {
            $device = new Device();
            $device->set($param);
            return $device;
        }
        return NULL;
    }

    function get($idDevice) {
        $params['idDevice'] = $idDevice;
        $this->bd->select($this->table, '*', 'idDevice=:idDevice', $params);
        $param = $this->bd->getRow();
        if ($param) {
            $device = new Device();
            $device->set($param);
            return $device;
        }
        return NULL;
    }

    function delete(Device $param) {
        $params['idDevice'] = $param->getIdDevice();
        $r = $this->bd->delete($this->table, 'idDevice=:idDevice', $params);
        return $r;
    }

    // Borra un dispositivo de la tabla
    function erase(Device $param) {
        return $this->delete($param->getIdDevice());
    }

    //Retorna número de filas modificadas
    function set(Device $param) {
        $where['idDevice'] = $param->getIdDevice();
        return $this->bd->update($this->table, $param->get(),$where);
    }

    // Inserta un dispositivo nuevo y retorna el id del elemento insertado
    function insert(Device $param) {
        return $this->bd->insert($this->table, $param->get(), true, 'password');
    }

    // Selecciona todos los registros de una tabla
    function getList() {
        $this->bd->select($this->table);
        $r = array();
        while ($param = $this->bd->getRow()) {
            $device = new Device();
            $device->set($param);
            $r[] = $device;
        }
        return $r;
    }
    
    function count($params=array()) {
        return $this->bd->count($this->table,$params);   
    }
}
