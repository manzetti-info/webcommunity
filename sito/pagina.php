<?php

require "./lib/Database.php";
require "./lib/Auth.php";

echo "<pre>";

$db = new Database($db_host, $db_user, $db_pass, $db_name);
$auth = new Auth($db, true);

$auth->register("nico@gmail.com", "patata");
// $auth->login("thieu@gmail.com", "patata");

echo "<br>";

print_r($_SESSION);

// print_r($db->select("*", "users")->getArray(MYSQLI_ASSOC));

