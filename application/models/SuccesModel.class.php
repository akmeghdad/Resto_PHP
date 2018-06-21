<?php
class SuccesModel
{
    public function factorPaye(){
        $sqlData = [
            Date('Y-m-d H:i:s'),
            $_SESSION['userid']
        ];

        $query=
        "UPDATE
            akorder a
        SET
            date_payment = ?
        WHERE
            a.date_payment IS NULL AND a.user_id = ?";
        
        $database = new Database();
        $database->executeSql($query,$sqlData);

        // return $resulta;
    }

    // public function hasPaye()
    // {
    //     $sqlData = [
    //         $_SESSION['userid']
    //     ];

    //     $query=
    //     "SELECT
    //         a.date_order,
    //         a.date_payment
    //     FROM
    //         akorder a
    //     WHERE
    //         a.user_id = ? 
    //     ORDER BY
    //         a.date_payment DESC";
        
    //     $database = new Database();
    //     $resulta = $database->queryOne($query,$sqlData);

    //     return $resulta;
    // }
    
}
