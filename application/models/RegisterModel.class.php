<?php
class RegisterModel
{
    public function addUser(array $user=array())
    {
        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);
        
        
        //https://en.wikipedia.org/wiki/Blowfish_(cipher)

        // '$2y$11$
        //https://en.wikipedia.org/wiki/Bcrypt

        // http://php.net/manual/en/function.crypt.php
        // $hash = crypt($password, $salt);
        
        // var_dump($hash);

        $sqlData = [
            $user["nom"],
            $user["prenom"],
            $user["year"].'-'.$user["month"].'-'.$user["day"],
            $user["adresse"],
            $user["ville"],
            $user["code_postal"],
            $user["phone"],
            "user",
            $user["mail"],
            crypt($user["mdp"], $salt),
            "0"
        ];

        $query = 
        "INSERT
        INTO users(
            `lastname`,
            `firstname`,
            `birthDate`,
            `address`,
            `city`,
            `zipcode`,
            `phone`,
            `status`,
            `email`,
            `password`,
            `uniqid`
          )
        VALUES(
          ?,
          ?,
          ?,
          ?,
          ?,
          ?,
          ?,
          ?,
          ?,
          ?,
          ?
        )";

        $database = new Database();
        $register = $database->query($query, $sqlData);
    }

    public static function hasEmail($email)
    {
        $sqlData = [
            $email
        ];

        $query = 
        "SELECT
            *
        FROM
            `users`
        WHERE
            `email` = ?";

        $database = new Database();
        $register = $database->query($query, $sqlData);

        if (empty($register)) {
            return true;
        }
        return false;
    }
    
}
