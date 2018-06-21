<?php

class PaymentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        if (!LoginModel::isConnexted()) {
            $http->redirectTo('/');
        }

        $factor = new PaymentModel();
        $resulta = $factor->factor();
        $dateFactor = $factor->hasPaye();
        
        // // $order = new OrderModel;
        // // $resulta = $order->listProduct();

        // // if (isset($queryFields['id'])) {
        // //     $id = $queryFields['id'];
        // //     $get = $order->detailProduct($id);
        // //     echo json_encode($get);

        // //     // echo $id;

        // //     // json_encode($arr); // JSON.parse
        // //     // json_decode($arr); //  JSON.stringify

        // //     exit;
        // // }

        return ['resulta' => $resulta, 'date'=> $dateFactor, 'total'=> 0];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $factor = new PaymentModel();
        $resulta = $factor->factor();
        $dateFactor = $factor->hasPaye();

        return ['resulta' => $resulta, 'date'=> $dateFactor, 'total'=> 0];
        

        // var_dump($formFields);

        // // $login = new BookingModel();
        // // $resulta = $login->getTable($formFields);

    }
}