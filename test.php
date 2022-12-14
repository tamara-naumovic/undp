<?php
// testiranje MongoDB konekcije
// require_once __DIR__.'/vendor/autoload.php';
// echo __DIR__; //putanja do roott direktorijuma (npr > C:\xampp\htdocs\undp\mongo-proj)
require_once 'vendor/autoload.php';

$dbhost = "localhost:27017";
$dbname = "test";

$db_client = new MongoDB\Client("mongodb://$dbhost");

// $db = $db_client->test;
$db = $db_client->$dbname;
$coll_users = $db->users;

// $insertOneRez = $coll_users->insertOne([
//     'username'=>'admin',
//     'email'=>'admin@email.com',
//     'name'=> 'Admin name'
// ]);


printf("Ubaceno je %d dokumenata\n", $insertOneRez->getInsertedCount());

?>