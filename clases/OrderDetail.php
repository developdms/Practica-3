<?php
/**
 * Description of OrderDetail
 *
 * @author MARTIN
 */
class OrderDetail {
    private $idOrderDetail, $amount, $price, $idBill, $idProduct;
    
    function __construct($idOrderDetail = NULL, $amount = NULL, $price = NULL, $idBill = NULL, $idProduct = NULL) {
        $this->idOrderDetail = $idOrderDetail;
        $this->amount = $amount;
        $this->price = $price;
        $this->idBill = $idBill;
        $this->idProduct = $idProduct;
    }
    
    public function getIdOrderDetail() {
        return $this->idOrderDetail;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getIdBill() {
        return $this->idBill;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdOrderDetail($idOrderDetail) {
        $this->idOrderDetail = $idOrderDetail;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setIdBill($idBill) {
        $this->idBill = $idBill;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
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
