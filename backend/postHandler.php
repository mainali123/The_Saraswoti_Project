<?php



require_once 'functions.php';

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'signup') {
            echo json_encode(['success' => true, 'message' => 'Login Successful']);
        }
    } else {
        return json_encode(['error' => 'Invalid Request', 'message'=>'Forbidden URL']);
    }
} else {
    return json_encode(['error' => 'Invalid Request', 'message'=>'Forbidden URL']);
}