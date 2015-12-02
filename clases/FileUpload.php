<?php

/**
 * Description of FileUpload
 *
 * @author Usuario
 */
class FileUpload {
    /*
     * Queda pendiente crear una variable nombre auxiliar para renombrar los ficheros existentes.
     */

    // Constantes que se usan para saber la politica de nombres a seguir
    const RENAME = 0, NOTOUCH = 1, UPDATE = 2;

    private $store = "./", $name, $size = 100000, $parametro = NULL, $policy = self::RENAME, $operations = false;
    private $extension;
    private $types = array(
        'jpg' => 1,
        'gif' => 1,
        'png' => 1,
        'jpeg' => 1
    );

    function __construct($param) {
        if (isset($_FILES[$param])) {
            $this->parametro = $_FILES[$param];
            if ($this->parametro['name'] != '') {
                //pathinfo devuelve un array asociativo con extension, dirname, basename, filename
                $this->extension = pathinfo($this->parametro['name'])['extension'];
                $this->name = pathinfo($this->parametro['name'])['filename'];
                $this->operations = true;
            }
        }
    }

    private function limitSize() {
        return $this->parametro['size'] <= $this->size;
    }

    private function checkDirectory() {
        if (!is_dir($this->store) || substr($this->store, -1) != '/') {
            return mkdir($this->store . $this->name);
        }
        return true;
    }

    private function policy() {
        switch ($this->policy) {
            case self::NOTOUCH:
                if (file_exists($this->store . $this->name . $this->extension)) {
                    return false;
                }
                break;
            case self::RENAME:
                $c = 1;
                while (file_exists($this->store . $this->name . '.' . $this->extension)) {
                    $this->name .= '_' . $c;
                    $c++;
                }
        }
        return true;
    }

    public function addType($param) {
        if (!$this->isOnType($param)) {
            $this->types[$param] = 1;
            return true;
        }
        return false;
    }

    public function removeType($param) {
        if ($this->isOnType($param)) {
            unset($this->types[$param]);
            return true;
        }
        return false;
    }

    public function isOnType($param) {
        return isset($this->types[$param]);
    }

    function getStore() {
        return $this->store;
    }

    function getName() {
        return $this->name;
    }

    function getSize() {
        return $this->size;
    }

    function setStore($store) {
        $this->store = $store;
    }

    public function getPolicy() {
        return $this->policy;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setPolicy($param) {
        $this->policy = $param;
    }

    function upload() {
        if ($this->operations) {
            if ($this->parametro['error'] == UPLOAD_ERR_OK) {
                if ($this->isOnType($this->extension)) {
                    if ($this->limitSize($this->parametro)) {
                        if ($this->policy()) {
                            return move_uploaded_file($this->parametro["tmp_name"], $this->store . $this->name . '.' . $this->extension);
                        }
                    }else{
                        return -1;
                    }
                }else{
                    return -2;
                }
            }else{
                return $this->parametro['parametro'];
            }
        }
        return false;
    }

}
