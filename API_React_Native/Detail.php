<?php
require 'Methods.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['idPost'])) {
        $valid = $_GET['idPost'];
        $nParam = Methods::getByIdTovar($valid);


        if ($nParam) {

         
        $jsnPrint["arrserver"] = $nParam;
        $out["arrserver"] = array_values($jsnPrint);
           print json_encode($out);
        } else {
            print json_encode(array('status' => '2','arrserver' => 'Error general'));
        }
    } else {
        print json_encode(array('status' => '3','arrserver' => 'Error Identitif') );
    }
}