<?php

class LogoutController {
    public function httpGetMethod(Http $http, array $queryFields) {
        $login = new LogoutModel($queryFields);
        $resulta = $login->deconnextion();

        $http->redirectTo('/');
    }
    public function httpPostMethod(Http $http, array $formFields) {
        

    }

}