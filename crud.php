<?php
//insert
if (isset($_POST['dodaj'])) {
    $student = [
        "ime" => $_POST['ime'],
        "prezime" => $_POST['prezime'],
        "_id" => $_POST['indeks'],
        "grad" => "Beograd",
        "smer" => "prog",
    ];
    $insertRez = $coll_students->insertOne($student);
}
// Delete student by Id
if (isset($_POST['obrisi'])) {
    if (isset($_POST['indeks'])) {

        $id = $_POST['indeks'];

        // Delete
        $deleteRez = $coll_students->deleteOne(['_id' => $id]);
    }
}

// PREDMETI

// Insert course
if (isset($_POST['dodajPredmet'])) {
    if (isset($_POST['naziv']) && isset($_POST['sifra'])) {
        $predmet = [
            'naziv' => $_POST['naziv'],
            '_id' => $_POST['sifra']
        ];

        // Insert
        $insertRez = $coll_courses->insertOne($predmet);
    }
}

// Delete course by Id
if (isset($_POST['obrisiPredmet'])) {
    if (isset($_POST['sifra'])) {

        $id = $_POST['sifra'];

        // Delete
        $deleteRez = $coll_courses->deleteOne(['_id' => $id]);
    }
}

?>