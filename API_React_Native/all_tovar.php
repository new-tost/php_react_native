<?php
require 'Methods.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $valFunction = Methods::getAllTovar();

    if ($valFunction) {

        $jsnPrint["status"] = 1;
        $jsnPrint["arrserver"] = $valFunction;

        print json_encode($jsnPrint);
    } else {
        print json_encode(array(
            "status" => 2,
            "arrserver" => "Error All Tovar"
        ));
    }
}