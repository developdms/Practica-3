<?php

/**
 * Description of Device
 *
 * @author MARTIN
 */
class Device {

    private $idDevice, $rol, $idUser;

    function __construct($idDevice = NULL, $rol = NULL, $idUser = NULL) {
        $this->idDevice = $idDevice;
        $this->rol = $rol;
        $this->idUser = $idUser;
    }

    public function getIdDevice() {
        return $this->idDevice;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdDevice($idDevice) {
        $this->idDevice = $idDevice;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
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
            $r .= $key . ' : ' . $value . '<br/>';
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
