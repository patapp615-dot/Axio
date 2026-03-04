<?php
header('Content-Type: application/json');

$statement = $_POST['statement'] ?? '';

echo json_encode([
    "latex" => $statement
]);