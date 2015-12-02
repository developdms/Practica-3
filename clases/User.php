<?php

/**
 * Description of User
 *
 * @author Usuario
 */
class User {

    private $idUser,$userName,$password;

    function __construct($idUser = NULL, $userName = NULL, $password = NULL) {
        $this->idUser = $idUser;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    
    function set($param) {
        if ($param !== NULL) {
            foreach ($this as $key => $value) {
                $this->$key = $param[$key];
            }
        }
    }
    
    public function __toString() {
        $r = '';
        foreach ($this as $key => $value) {
            $r .= $key.' : '.$value.'<br/>';
        }
        return $r;
    }

    public function get() {
        $r = array();
        foreach ($this as $key => $value) {
            $r[$key] = $value;
        }
        return $r;
    }
}
