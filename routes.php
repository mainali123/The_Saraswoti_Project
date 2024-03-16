<?php

require_once __DIR__ . '/router.php';

// ##################################################
// ##################################################
// ##################################################
$baseUrl = $_SERVER["SERVER_NAME"] . "/The_Saraswoti_Project";
// Static GET
// In the URL -> http://localhost
// The output -> Index

//get method
get($baseUrl . "", "frontend/home.php");
get($baseUrl . "/uploadBook", "frontend/uploadBook.php");
get($baseUrl . "/login", "frontend/loginregister.php");

//post method
post($baseUrl . "/post", "frontend/post.php");


//404 error
any($baseUrl . "/404", "frontend/404.php");
// ##################################################