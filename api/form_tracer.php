<?php
require_once "method_tracer.php";
$mhs = new Mahasiswa();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
    case 'GET':
        if (!empty($_GET["nim"])) {
            $nim = intval($_GET["nim"]);
            $mhs->get_mhs($nim);
        } else {
            $mhs->get_mhss();
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
        break;
}
?>