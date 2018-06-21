<?php

class LoginController {
    public function httpGetMethod(Http $http, array $queryFields) {
        if (isset($_SESSION['userid'])) {
            $http->redirectTo('/');
        }
    }
    public function httpPostMethod(Http $http, array $formFields) {
        // var_dump($formFields);
        
        $login = new LoginModel();
        $resulta = $login->doConnexion($formFields);

        if (isset($_SESSION['userid'])) {
            $http->redirectTo('/');
        }else{
            return['errorConection'=> $login->conexionError($formFields)];
        }

    }

}