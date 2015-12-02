<?php
/**
 * Description of Bill
 *
 * @author MARTIN
 */
class Bill {
    private $idBill, $status, $infoDateTime;
    
    function __construct($idBill = NULL, $status = NULL, $infoDateTime = NULL) {
        $this->idBill = $idBill;
        $this->status = $status;
        $this->infoDateTime = $infoDateTime;
    }

    public function getIdBill() {
        return $this->idBill;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getInfoDateTime() {
        return $this->infoDateTime;
    }

    public function setIdBill($idBill) {
        $this->idBill = $idBill;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setInfoDateTime($infoDateTime) {
        $this->infoDateTime = $infoDateTime;
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
