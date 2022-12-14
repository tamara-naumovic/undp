<?php

$dbhost = "localhost:27017";
$dbname = "obuka";
$kolekcija_1 = "students";
$kolekcija_2 = "grades";
$kolekcija_3 = "courses";

$client = new MongoDB\Client("mongodb://$dbhost"); //ovo je obavezno
$db = $client->$dbname; //$client->obuka
$coll_students = $db->$kolekcija_1; // $client->obuka->students
$coll_grades = $db->$kolekcija_2; // $client->obuka->grades
$coll_courses = $db->$kolekcija_3; // $client->obuka->courses

?>