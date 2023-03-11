<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type');

include_once '../../config/Database.php';
include_once '../../model/Posts.php';

$database = new Database;
$conn = $database->connect();

$post = new Posts($conn);

$data = json_decode(file_get_contents('php://input'));

$post->token = $data->token;

if ($post->delete()) {
    echo json_encode(
        array('message' => 'Post Deleted Successfully')
    );
} else {
    echo json_encode(
        array('message' => 'Post Delete Failed')
    );
}
