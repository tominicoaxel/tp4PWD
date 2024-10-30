<?php
namespace Control;

use Modelo\Id;
use Hashids\Hashids;

//Clase que contiene la logica para manejar la generacion del hash

class Abmid {
    private $hashids;

    public function __construct() {
        $salt = 'mi_salt_secreto'; //cadena "compleja" para evitar que alg descifre el algoritmo.
        $minLength = 8;
        $this->hashids = new Hashids($salt, $minLength);
    }

    // Método que configura un objeto Id con los parámetros dados
    private function cargarObjeto($param) {
        $obj = null;
        if (isset($param['id'])) {
            $obj = new Id();
            $obj->setId($param['id']);
        }
        return $obj;
    }

    // Método para crear un nuevo objeto Id
    public function alta($param) {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objId = $this->cargarObjeto($param);
            if ($objId) {
                $param['hash'] = $this->generarHash($objId);  // Genera el hash y lo guarda
                $resp = true;
            }
        }
        return $resp;
    }

    // Método para eliminar un hash
    public function baja($param) {
        // En este caso, la "baja" podría significar eliminar el hash de un registro en la base de datos o similar
        return "Función baja aún no implementada.";
    }

    // Método para modificar un objeto Id
    public function modificacion($param) {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objId = $this->cargarObjeto($param);
            if ($objId) {
                $param['hash'] = $this->generarHash($objId);  // Regenerar el hash si es necesario
                $resp = true;
            }
        }
        return $resp;
    }

    // Método para buscar un hash
    public function buscar($param) {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['id'])) $where .= " and id =" . $param['id'];
            if (isset($param['hash'])) $where .= " and hash ='" . $param['hash'] . "'";
        }
        return "Función buscar aún no implementada. Criterios de búsqueda: $where";
    }

    // Método que verifica que los campos claves están seteados
    private function seteadosCamposClaves($param) {
        return isset($param['id']);
    }

    // Método que genera el hash a partir del ID
    public function generarHash(Id $id) {
        return $this->hashids->encode($id->getId());
    }

    //encode() es un método proporcionado por la librería Hashids, y su propósito es convertir (o enmascarar) un número entero en una cadena alfanumérica segura (el hash). esta en hasdis.php
}
?>
