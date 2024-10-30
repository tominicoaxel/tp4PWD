<?php
$PROYECTO = 'Tp4';
$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/";
include_once("utiles/funciones.php");

$INICIO = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/vista/home/index.php";

$_SESSION['ROOT'] = $ROOT;

?>