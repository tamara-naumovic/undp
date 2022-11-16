<?php

//interfejs Oblik
//definise fun povrsinu
//Oblici Krug i Pravougaonik
//racunaju konkretnu povrsinu oblika
// ispisi povrsine liste oblika

interface Oblik {
    public function povrsina();
}
   
class Krug implements Oblik{
    private $precnik;

    public function __construct($pr){
        $this->precnik = $pr;
    }
    public function povrsina(){
        return $this->precnik*$this->precnik*3.14;
    }
}
    
class Kvadrat implements Oblik{
    private $stranica;

    public function __construct($str){
        $this->stranica = $str;
    }
    public function povrsina(){
        return $this->stranica*$this->stranica;
    }
}

class Pravougaonik implements Oblik{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a=$a;
        $this->b=$b;
    }
    public function povrsina(){
        return $this->a*$this->b;
    }

}

class Amerikanac
{
    public function pozdrav()
    {
        return 'Hi!';
    }
    public function interfacePoz(){
        return "Hi from interface";
    }
}
    
function racunajPovrsine(Oblik $oblik){
    echo $oblik->povrsina();
    echo "<br>";

}

racunajPovrsine(new Kvadrat(5));
racunajPovrsine(new Krug(7));
racunajPovrsine(new Pravougaonik(4,6));

// function povrsine_oblika($lista_oblika){
    // ne proverava tip jednog objekta u listi
//     foreach($lista_oblika as $oblik){
//         echo $oblik->povrsina();
//         echo "<br>";
//     }
// }

function povrsine_oblika(Oblik ...$lista_oblika){
    // proverava da li je tip objekta Oblik
    foreach($lista_oblika as $oblik){
        echo $oblik->povrsina();
        echo "<br>";
    }
}

echo "Povrsine oblika <br>";
// Prvi nacin bez provere
// povrsine_oblika([new Krug(3), new Kvadrat(4), new Pravougaonik(3,4), new Amerikanac()]);
// vraca gresku da nema povrsinu kao metodu u Amerikancu, ali ne i da smo prosledili pogresan tip objekta

// povrsine_oblika(...[new Krug(3), new Kvadrat(4), new Pravougaonik(3,4), new Amerikanac()]);
// vraca gresku da Amerikanac nije tip Oblik koji nam treba 
povrsine_oblika(...[new Krug(3), new Kvadrat(4), new Pravougaonik(3,4)]);


?>