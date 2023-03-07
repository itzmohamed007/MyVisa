<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Controle-Allow-Method: PUT');
header('Access-Controle-Allow-Headers: Access-Controle-Allow-Headers, Content-Type, Access-Controle-Allow-Method, X-Requested-With');


include_once '../../config/Database.php';
include_once '../../model/Posts.php';

$database = new Database;
$conn = $database->connect();

$post = new Posts($conn);

$data = json_decode(file_get_contents('php://input'));

$post->token = $data->token;
$post->nom_complet = $data->nom_complet;
$post->naissance = $data->naissance;
$post->nationalite = $data->nationalite;
$post->situation = $data->situation;
$post->address = $data->address;
$post->type_visa = $data->type_visa;
$post->date_depart = $data->date_depart;
$post->date_arriver = $data->date_arriver;
$post->type_document = $data->type_document;
$post->numero_document = $data->numero_document;

if ($post->update()) {
    echo json_encode(
        array('message' => 'Post Updated Successfully')
    );
} else {
    echo json_encode(
        array('message' => 'Post Update Failed')
    );
}
