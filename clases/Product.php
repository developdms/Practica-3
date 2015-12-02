<?php
/**
 * Description of Product
 *
 * @author MARTIN
 */
class Product {
    private $idProduct, $description,$price,$image;
    
    function __construct($idProduct =  NULL, $description = NULL, $price = NULL, $image = NULL) {
        $this->idProduct = $idProduct;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getImage() {
        return $this->image;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setImage($image) {
        $this->image = $image;
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
