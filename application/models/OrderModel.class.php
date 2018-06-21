<?php
class OrderModel {
    public function listProduct() {
        $query =
            "SELECT
            `id`,
            `name`
        FROM
            `products`";

        $database       = new Database();
        return $resulta = $database->query($query);

    }

    public function detailProduct($id) {
        $sqlData = [
            $id,
        ];
        $query =
            "SELECT
                *
            FROM
                `products`
            WHERE
                id = ?
                ";

        $database       = new Database();
        return $resulta = $database->queryOne($query, $sqlData);

    }

    public function saveOrder($id, array $order)
    {
        foreach ($order as $key) {
            $sqlData = [
                $id,
                $key['id'],
                Date('Y-m-d H:i:s'),
                // '0000-00-00 00:00:00',
                'wait',
                $key['quantity']
            ];
            $query =
                "INSERT
                INTO
                  `akorder`(
                    `user_id`,
                    `product_id`,
                    `date_order`,
                    `date_payment`,
                    `status`,
                    `quantity`
                  )
                VALUES(
                  ?,
                  ?,
                  ?,
                  NULL,
                  ?,
                  ?
                )
                    ";
    
            $database       = new Database();
            $database->executeSql($query, $sqlData);
        }
    }

}