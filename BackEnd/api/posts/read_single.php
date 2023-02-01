<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../model/Posts.php';

$database = new Database;
$conn = $database->connect();

$post = new Posts($conn);

if(isset($_GET['id'])){
    $post->id = $_GET['id'];
} else {
    die();
}

$post->read_single();

$post_arr = array(
    'id' => $post->id,
    'token' => $post->token,
    'nom_complet' => $post->nom_complet,
    'naissance' => $post->naissance,
    'nationalite' => $post->nationalite,
    'situation' => $post->situation,
    'address' => $post->address,
    'type_visa' => $post->type_visa,
    'date_depart' => $post->date_depart,
    'date_arriver' => $post->date_arriver,
    'type' => $post->type,
    'numero_document' => $post->numero_document,
    'date_reservation' => $post->date_reservation
);

print_r(json_encode($post_arr));

