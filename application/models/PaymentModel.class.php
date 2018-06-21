<?php
class PaymentModel
{
    public function factor(){
        $sqlData = [
            $_SESSION['userid']
        ];

        $query=
        "SELECT
            SUM(a.quantity) AS prodID,
            a.product_id,
            b.id,
            b.firstname,
            b.lastname,
            b.address,
            b.city,
            b.zipcode,
            c.name,
            c.price_sale,
            c.photo
        FROM
            akorder a
        INNER JOIN
            users b ON b.id = a.user_id
        INNER JOIN
            products c ON c.id = a.product_id
        WHERE
            a.user_id = ? AND  a.date_payment IS NULL
        GROUP BY
            a.product_id";
        
        $database = new Database();
        $resulta = $database->query($query,$sqlData);

        return $resulta;
    }

    public function hasPaye()
    {
        $sqlData = [
            $_SESSION['userid']
        ];

        $query=
        "SELECT
            a.date_order,
            a.date_payment
        FROM
            akorder a
        WHERE
            a.user_id = ? 
        ORDER BY
            a.date_payment DESC";
        
        $database = new Database();
        $resulta = $database->queryOne($query,$sqlData);

        return $resulta;
    }
    
}
