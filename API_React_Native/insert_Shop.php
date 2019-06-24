    <?php


require 'Methods.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);

    $retorno = Methods::insert(
        $body['nameShop'],
        $body['priceShop'],
        $body['LastFirstName'],
        $body['Phone']);

    if ($retorno) {
        print json_encode(
            array('status' => '1','message' => 'Added')
        );
    } else {
      
        print json_encode(
            array(
                'status' => '2',
                'message' => 'Error')
        );
    }
}