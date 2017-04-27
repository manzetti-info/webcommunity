<?php

require "./etc/lib/Database.php";
require "./etc/lib/Auth.php";

echo "<pre>";

$db = new Database($db_host, $db_user, $db_pass, $db_name);
$auth = new Auth($db, true);

$auth->register("nico@gmail.com", "nicogorr");
// $auth->login("nico@gmail.com", "nicogorr");

echo "<br>";

print_r($_SESSION);

// print_r($db->select("*", "users")->getArray(MYSQLI_ASSOC));

