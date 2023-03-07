<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Posts.php';

$database = new Database;
$conn = $database->connect();

$post = new Posts($conn);

$result = $post->read();
$numRow = $result->rowCount();

if($numRow > 0){

    $posts_array = array();
    $posts_array['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_items = array(
            'id' => $id,
            'token' => $token,
            'nom_complet' => $nom_complet,
            'naissance' => $naissance,
            'nationalite' => $nationalite,
            'situation' => $situation,
            'address' => $address,
            'type_visa' => $type_visa,
            'date_depart' => $date_depart,
            'date_arriver' => $date_arriver,
            'type_document' => $type_document,
            'numero_document' => $numero_document,
        );

        array_push($posts_array['data'], $post_items);
    }

    echo json_encode($posts_array);
} else {
    echo json_encode(
        array(
            'message' => 'No Posts Found'
        )
    );
}
