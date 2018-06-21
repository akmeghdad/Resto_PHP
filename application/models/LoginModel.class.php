<?php
class LoginModel
{
	public function doConnexion(array $user=array())
    {
    	$sqlData = [
            $user["email"],
            // $user["password"],
        ];

        $query = 
            "SELECT
                *
            FROM
                `users`
            WHERE
                email = ? ";

        $database = new Database();
        $resulta = $database->queryOne($query, $sqlData);

        if (!empty($resulta) && crypt($user["password"], $resulta["password"]) == $resulta["password"]) {
            $_SESSION['userid'] = $resulta['id'];
        }
    }

    public function conexionError(array $user=array())
    {
        $sqlDataEmail = [
            $user["email"],
        ];
    	
        $queryEmail = 
            "SELECT
                *
            FROM
                `users`
            WHERE
                email = ?" ;

        $database = new Database();
        $resulta = $database->queryOne($queryEmail, $sqlDataEmail);

        if ($resulta != true) {
            return "Il n'y a pas de compte utilisateur associé à cette adresse email";
        }elseif(crypt($user["password"], $resulta["password"]) != $resulta["password"]){
            return "Le mot de passe spécifié est incorrect";
            // return ($resulta["password"].'++++++++++++++'.crypt($user["password"], $salt));
        }

        // $sqlDataPassword = [
        //     $user["email"],
        //     $user["password"],
        // ];

        // $queryPassword = 
        //     "SELECT
        //         *
        //     FROM
        //         `users`
        //     WHERE
        //         email = ? AND `password` = ?";

        // $database = new Database();
        // $resulta = $database->queryOne($queryPassword, $sqlDataPassword);

        // if (empty($resulta)) {
            
        // }


    }

    private static function getUserDetail()
    {
        $query = 
            "SELECT
                *
            FROM
                `users`
            WHERE
                `id` = ?";
        $sqlData = [$_SESSION['userid']];

        $database = new Database();
        $result = $database->queryOne($query, $sqlData);

        return $result;
    }

    public static function isConnexted()
    {
        if (isset($_SESSION['userid'])) {
            return true;
        }

        return false;
    }

    public static function getName()
    {
        if (isset($_SESSION['userid'])) {
            $result = self::getUserDetail();
            $name = $result['firstname'].' '.$result['lastname'];

            return $name;
        }
        return '';
    }
}