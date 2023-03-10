<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

include_once '../../config/Database.php';
include_once '../../model/Posts.php';

$database = new Database;
$conn = $database->connect();

$post = new Posts($conn);

if (isset($_GET['token'])) {
    $post->token = $_GET['token'];
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
    'type_document' => $post->type_document,
    'numero_document' => $post->numero_document
);

echo (json_encode($post_arr));