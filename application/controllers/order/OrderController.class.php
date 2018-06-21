<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        if (!LoginModel::isConnexted()) {
            $http->redirectTo('/');
        }
        
        $order = new OrderModel;
        $resulta = $order->listProduct();

        if (isset($queryFields['id'])) {
            $id = $queryFields['id'];
            $get = $order->detailProduct($id);
            echo json_encode($get);

            // echo $id;

            // json_encode($arr); // JSON.parse
            // json_decode($arr); //  JSON.stringify

            exit;
        }

        if (isset($queryFields['payment'])) {
            $id = $_SESSION['userid'];

            $order = new OrderModel;
            $order->saveOrder($id, $queryFields['payment']);

            // var_dump( $queryFields['payment']);
            echo '444';

            // echo $_SESSION['userid'];

            // json_encode($arr); // JSON.parse
            // json_decode($arr); //  JSON.stringify

            exit;
        }

        return ['resulta' => $resulta,'r'=>$queryFields];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        var_dump($formFields);

        // $login = new BookingModel();
        // $resulta = $login->getTable($formFields);




    }
}