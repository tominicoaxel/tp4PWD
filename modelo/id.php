<?php

namespace Modelo;
use Modelo\Conector\BaseDatos;

require_once 'conector/BaseDatos.php';
//clase que respresenta los valores a enmascarar
class Id {
    private $id;
    private $hash;
    private $mensajeoperacion;

    public function __construct($id = null, $hash = null) {
        $this->id = $id;
        $this->hash = $hash;
        $this->mensajeoperacion = "";
    }

    public function setear($id, $hash) {
        $this->setId($id);
        $this->setHash($hash);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($valor) {
        $this->id = $valor;
    }

    public function getHash() {
        return $this->hash;
    }

    public function setHash($valor) {
        $this->hash = $valor;
    }

    public function getMensajeOperacion() {
        return $this->mensajeoperacion;
    }

    public function setMensajeOperacion($valor) {
        $this->mensajeoperacion = $valor;
    }

    public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM ids WHERE id = " . $this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['hash']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Id->cargar: " . $base->getError());
        }
        return $resp;
    }
    public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        // Usamos el id_original ingresado y lo insertamos junto con el hash
        $sql = "INSERT INTO ids (id_original, hash) VALUES ('" . $this->getId() . "', '" . $this->getHash() . "');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Id->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Id->insertar: " . $base->getError());
        }
        return $resp;
    }
    
    
    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE ids SET hash='" . $this->getHash() . "' WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Id->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Id->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM ids WHERE id=" . $this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Id->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Id->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM ids";
        if ($parametro != "") {
            $sql .= " WHERE " . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Id();
                    $obj->setear($row['id'], $row['hash']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Id->listar: " . $base->getError());
        }
        return $arreglo;
    }
}
?>
