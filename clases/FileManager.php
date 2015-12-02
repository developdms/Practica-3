<?php

/**
 * Description of FileManager
 *
 * @author MARTIN
 */
class FileManager {

    private $param=NULL, $info=NULL;

    function __construct($param) {
        if (isset($_FILES[$param])) {
            $this->param = $_FILES[$param];
            if ($this->param['name'] != '') {
                //pathinfo devuelve un array asociativo con extension, dirname, basename, filename
                $this->info = pathinfo($this->param['name']);
            }else{
                $this->param = NULL;
            }
        }
    }

    function getisFile() {
        return $this->param;
    }

    function getExtension() {
        return $this->info['extension'];
    }

}
