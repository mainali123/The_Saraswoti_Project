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
                echo json_encode(['success' => false, 'message' => $exception]);
                exit;
            }

            $past_password = json_encode($password);

            $query = "INSERT INTO user_info (user_name, password, email, past_password) VALUES ('$name', '$password', '$email', '', '$past_password')";

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
        } elseif ($action == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "SELECT email, password, last_login FROM user_info WHERE email='$email'";
            try {
                $res = $pdo->query($query);

                //$curr_date = date('Y-m-d H:i:s');

                //array_push($last_login, $curr_date);
                //$last_login = json_encode($last_login);
                if ($res->rowCount() < 1) {
                    echo json_encode(['success' => false, 'message' => "User don't exist. Please login"]);
                } else {
                    $row = $res->fetch();
                    if ($row['password'] == $password) {
                        $query = "UPDATE user_info SET last_login = '' WHERE email='$email'";
                        echo json_encode(['success' => true, 'message' => 'Invalid Password']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Invalid Password']);
                    }
                }
            } catch (Exception $exception) {
                echo json_encode(['success' => false, 'message' => $exception]);
            }
        }
    } else {
        return json_encode(['error' => 'Invalid Request', 'message' => 'Forbidden URL']);
    }
} else {
    return json_encode(['error' => 'Invalid Request', 'message' => 'Forbidden URL']);
}