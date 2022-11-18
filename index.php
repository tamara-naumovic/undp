<?php
//klasa proizvod -> id, cena, naziv, kat
//klasa kategorija - > id naziv
//zajednicke metode -> apstraktna klasa
require "app/templates/ModelTemplate.php";
require "app/models/Category.php";
require "app/models/Item.php";

// use App\Models\Category;
// use App\Models\Item;
use App\Models\{Category, Item};

$kat = new Category(1,"Monitor");
$proizvod1 = new Item(1, "Philips", 350, $kat);
print_r($proizvod1->getCategory());

?>
