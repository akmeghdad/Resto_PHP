<?php

class BookingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        if (!LoginModel::isConnexted()) {
            $http->redirectTo('/');
        }
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        // var_dump($formFields);

        $login = new BookingModel();
        $resulta = $login->getTable($formFields);

    }
}