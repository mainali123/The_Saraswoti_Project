<?php

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

} else {
    return json_encode(['error' => 'Invalid Request', 'message'=>'Forbidden URL']);
}
