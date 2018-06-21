<?php
class BookingModel
{
	public function getTable(array $user=array())
    {
        $sqlData = [
            $user["bookingYear"].'-'.$user["bookingMonth"].'-'.$user["bookingDay"].' '.$user["bookingHour"].':'.$user["bookingMinute"].':00',
            $_SESSION['userid'],
            $user["numberOfSeats"]
        ];

        
        $query = 
        "INSERT
        INTO `booking`(
            `date`,
            `user_id`,
            `guests`
          )
        VALUES(
            ?,
            ?,
            ?
            )";


        $database = new Database();
        $resulta = $database->query($query, $sqlData);

    }

}