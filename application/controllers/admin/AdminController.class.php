<?php

class AdminController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        if (!LoginModel::isConnexted()) {
            $http->redirectTo('/');
        }
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $formFields['name_photo'] = uniqid().str_replace(' ', '_', $_FILES["photo"]["name"]);
        $formFields['tmp_name_photo'] = $_FILES["photo"]["tmp_name"];
        // var_dump($_SERVER);
        // var_dump($_SERVER['SCRIPT_FILENAME']);
        // var_dump(dirname(__FILE__));

        $addphoto = new AdminModel();
        $resulta = $addphoto->addProduct($formFields);
        // exit;
        $http->redirectTo('/');

        
        // $nom = 'images/meals/'. $formFields['name_photo'];
        // $nom = '/akakak';
        // $nom = './application/www/images/meals/bacon_cheeseburger.jpg';
        // // var_dump(realpath($nom));

        // if (file_exists($nom)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }else{
        //     echo 'il n y a pas';
        // }
        // // mkdir($nom, 0700, true);
        // exit;

        // $resultat = move_uploaded_file($formFields['tmp_name_photo'],$nom);
        // echo $resultat;
        // exit;




        // $nom = "avatars/{$id_membre}.{$extension_upload}";
        // $resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$nom);
        // if ($resultat) echo "Transfert réussi";

        // if everything is ok, try to upload file
        // } else {
        //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //         echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
        //     } else {
        //         echo "Sorry, there was an error uploading your file.";
        //     }
        // }

        // /home/wabap47/sites/3wa-cours/deweloppemont/Restaurant/application/www/images/meals/bacon_cheeseburger.jpg



    }
}