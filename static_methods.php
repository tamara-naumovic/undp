<?php
//staticke metode i svojstva

class MojaKlasa
{
    public static $staticnoSvojstvo ="Prvobitna vrednost svojstva";
    public static function statickaMetoda($poruka){
        echo "Staticki pozdrav: $poruka <br>";
    }

    public function __construct()
    {
        self::statickaMetoda("Kreiran novi objekat"); //pristup statickim metodama unutar same klase
        // self::$staticnoSvojstvo = "Nova vrednost svojstva"; //nije praksa da menjamo staticno svojstvo
    }
}

// $moj_obj = new MojaKlasa();
// $moj_obj->statickaMetoda(); //generalno ne koristimo kroz objekat vec preko klase

//definicja> naziKlase::statickaMetoda($argumenti)
MojaKlasa::statickaMetoda("poruka"); // nacin pristupa samo statickim metodama

$obj = new MojaKlasa();
echo MojaKlasa::$staticnoSvojstvo."<br>";



?>