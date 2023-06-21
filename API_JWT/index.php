<?php

require_once("database/Database.php");


$db = new Database();


$objectValue = $db->getConection();


echo "<pre>";

print_r ($objectValue);











