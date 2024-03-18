<?php

require_once 'dbConnect.php';
require_once 'functions.php';

header('Content-Type: application/json', true, 200);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'signup') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Check if user already exists or not
            $query = "SELECT * FROM user_info WHERE email= '$email'";

            try {
                $res = $pdo->query($query);
                if ($res->rowCount() > 0) {
                    echo json_encode(['success' => false, 'message' => 'User already exists please login']);
                    exit;
                }
            } catch (Exception $exception) {
                echo json_encode(['success' => false, 'message' => $exception, 'errorLine' => __LINE__]);
                exit;
            }

            /*$query = "SELECT past_password from user_info where email = $email";
            try {
                $res = $pdo->query($query);
                $results = json_decode($res['past_password'], true);
                $results[] = $password;
            } catch (Exception $exception) {
                echo json_encode(['success' => false, 'message' => $exception]);
                exit;
            }*/

            $past_password = json_encode($password);

            $curr_date = date('Y-m-d H:i:s');
            $query = "INSERT INTO user_info (user_name, password, email, last_login, past_password) VALUES ('$name', '$password', '$email', '$curr_date', '$past_password')";

            try {
                $res = $pdo->exec($query);
                if ($res) {
                    echo json_encode(['success' => true, 'message' => 'Login Successful']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Login error1']);
                }

            } catch (Exception $exception) {
                echo json_encode(['success' => false, 'message' => 'Login error2']);
            }
        }
    } else {
        return json_encode(['error' => 'Invalid Request', 'message' => 'Forbidden URL']);
    }
} else {
    return json_encode(['error' => 'Invalid Request', 'message' => 'Forbidden URL']);
}