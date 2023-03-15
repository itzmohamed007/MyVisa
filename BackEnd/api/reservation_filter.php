<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

include_once '../config/Database.php';
include_once '../model/ClientReservation.php';

$database = new Database;
$conn = $database->connect();

$reservation = new ClientReservation($conn);

if (empty($_GET['date']) || empty($_GET['time'])) {
    echo json_encode(
        array('message' => 'Missing Required Fields' )
    );
    exit;
} 

$errors = array();

if(!preg_match($reservation->date_pattern, $_GET['date'])) {
    $errors[] = 'invalid reservation date';
}
if(!preg_match($reservation->time_pattern, $_GET['time'])) {
    $errors[] = 'invalid reservation time';
}

if(!empty($errors)) {
    echo json_encode([
        'message' => 'validation failed',
        'errors' => $errors
    ]);
    exit;
}

 
$reservation->reservation_date = $_GET['date'];
$reservation->reservation_time = $_GET['time'];


$result = $reservation->checkReservation();
$numRows = $result->rowCount();

if($numRows > 0){
    
    $times_array = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $time_items = array(
            'id' => $id,
            'time' => $time
        );

        $times_array[] = $time_items;
    }

    // echo json_encode($times_array);

    echo json_encode(
        array(
            'message' => 'Reservation Unavailable'
        )
    );

} else {
    echo json_encode(
        array(
            'message' => 'Reservation Available'
        )
    );
}
