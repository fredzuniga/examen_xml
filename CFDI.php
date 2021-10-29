<?php

include_once './Classes/XML.php';
include_once './Classes/Comprobante.php';
include_once './Classes/Emisor.php';

class CFDI{

    // creación de la variable emisor
    protected $comprobante;
    protected $xml;
    protected $emisor;

    function __construct(){
        $this->comprobante = new Comprobante();
        $this->emisor = new Emisor();
    }

    // el método no debe ser estático y debe ser público
    public function getNode(){
        $this->xml = '<?xml version="1.0" encoding="UTF-8"?> <cfdi:Comprobante  xmlns:cfdi="http://www.sat.gob.mx/cfd/3"  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" ' . $this->comprobante->getAtributes() . ' >';
        $this->xml .= $this->emisor->getNode(); 
        $this->xml .= '</cfdi:Comprobante>';
        return $this->xml;
    }

    // creación de método para acceder al atributo comprobante
    public function getComprobante(){
        return $this->comprobante;
    }
    
    // creación de método para acceder al atributo emisor
    public function getEmisor(){
        return $this->emisor;
    }
}