<?php

/**
 * Description of ManagerUser
 *
 * @author MARTIN
 */
class ManagerUser {

    private $bd = NULL;
    private $table = 'User';

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

    function get($idUser) {
        $params['idUser'] = $idUser;
        $this->bd->select($this->table, '*', 'idUser=:idUser', $params);
        $param = $this->bd->getRow();
        if ($param) {
            $user = new User();
            $user->set($param);
            return $user;
        }
        return NULL;
    }

    function delete(User $param) {
        $params['idUser'] = $param->getIdUser();
        $r = $this->bd->delete($this->table, 'idUser=:idUser', $params);
        return $r;
    }

    // Borra un usuario de la tabla
    function erase(User $param) {
        return $this->delete($param->getIdUser());
    }

    //Retorna número de filas modificadas
    function set(User $param) {
        $where['idUser'] = $param->getIdUser();
        return $this->bd->update($this->table, $param->get(), $where);
    }

    // Inserta un usuario nuevo y retorna el id del elemento insertado
    function insert(User $param) {
        return $this->bd->insert($this->table, $param->get(), true, 'password');
    }

    // Selecciona todos los registros de una tabla
    function getList() {
        $this->bd->select($this->table);
        $r = array();
        while ($param = $this->bd->getRow()) {
            $user = new User();
            $user->set($param);
            $r[] = $user;
        }
        return $r;
    }

    function count() {
        return $this->bd->count($this->table);
    }

    function login(User $param) {
        
        $params = array();
        foreach ($param->get() as $key => $value) {
            if ($value !== NULL) {
                if ($key === 'password') {
                    $params[$key] = sha1($value);
                } else {
                    $params[$key] = $value;
                }
            }
        }
        
        $this->bd->read($this->table, '*', $params);
        $param = $this->bd->getRow();
        
        if ($param) {
            $user = new User();
            $user->set($param);
            return $user;
        }
        return NULL;
    }

}
