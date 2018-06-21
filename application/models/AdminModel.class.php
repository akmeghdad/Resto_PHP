<?php
class AdminModel
{
    public function addProduct(array $product){
        $sqlData = [
            $product['name'],
            $product['description'],
            $product['name_photo'],
            $product['salePrice'],
            $product['buyPrice'],
            $product['initialStock'],
            // $product['userid']
        ];

        $query=
        "INSERT
        INTO
          `products`(
            `name`,
            `description`,
            `photo`,
            `price_sale`,
            `price_buy`,
            `quantity_stock`
          )
        VALUES(
          ?,
          ?,
          ?,
          ?,
          ?,
          ?
        )";
        
        $database = new Database();
        $database->executeSql($query,$sqlData);

        // $nom = './application/www/images/meals/bacon_cheeseburger.jpg';
        // var_dump(realpath($nom));
        // exit;

        $nom = './application/www/images/meals/'. $product['name_photo'];
        $resultat = move_uploaded_file($product['tmp_name_photo'],$nom);

        // var_dump(realpath($resultat));
        // var_dump($resultat);
        // return $resulta;
    }

    
}
