<?php

class SuccesController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        if (!LoginModel::isConnexted()) {
            $http->redirectTo('/');
        }
        

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $factorPay = new SuccesModel();
        $resulta = $factorPay->factorPaye();
// var_dump($formFields);


    }
}