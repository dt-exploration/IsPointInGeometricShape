<?php

class Trougao 
{
    private $a;
    private $b;
    private $c;

    public function __construct($teme1, $teme2, $teme3) 
    {
        $this->a = $teme1;
        $this->b = $teme2;
        $this->c = $teme3;     
    }
    
    public function get_Teme($param) 
    {
        if ($param == "a") {
            return $this->a;
        }
        else if ($param == "b") {
            return $this->b;
        }
        else {
            return $this->c;
        }
    }  
}

class Tacka
{

    private $x;
    private $y;
    
    public function __construct($x_kordinata,$y_kordinata)
    {
        $this->x=$x_kordinata;
        $this->y=$y_kordinata;
    }

    public function baryTransformacija($trougao)
    {
        $s=(($trougao->get_Teme("b")->y)-($trougao->get_Teme("c")->y))*(($this->x)-($trougao->get_Teme("c")->x))+
        (($trougao->get_Teme("c")->x)-($trougao->get_Teme("b")->x))*(($this->y)-($trougao->get_Teme("c")->y));

        $l=(($trougao->get_Teme("c")->y)-($trougao->get_Teme("a")->y))*(($this->x)-($trougao->get_Teme("c")->x))+
        (($trougao->get_Teme("a")->x)-($trougao->get_Teme("c")->x))*(($this->y)-($trougao->get_Teme("c")->y));

        $d=(($trougao->get_Teme("b")->y)-($trougao->get_Teme("c")->y))*(($trougao->get_Teme("a")->x)-($trougao->get_Teme("c")->x))+
        (($trougao->get_Teme("c")->x)-($trougao->get_Teme("b")->x))*(($trougao->get_Teme("a")->y)-($trougao->get_Teme("c")->y));

        $lambda1=$s/$d;
        $lambda2=$l/$d;
        $lambda3=1-$lambda1-$lambda2;

        return array($lambda1,$lambda2,$lambda3);
    }

    public function uTrouglu($trougao)
    {
        $flag_niz=$this->baryTransformacija($trougao);

        $zastava = $zastava1 = $zastava2 = 0;
        foreach($flag_niz as $element) {
            $zastava1++;
            if ($element == 0) {
                $zastava++;
            }
            if ($zastava1 == 3) {
                if($zastava == 2) {
                    echo "Tacka se nalazi u temenu figure";
                    die();
           }
           if ($zastava==1) {
               echo "Tacka se nalazi na granici figure";
               die();
           }
}

      if($zastava!=0){
        continue;
      }

      if($element<0){
        echo "Tacka je van geometrijske figure";
        die("");}

      if($element<1 ){

          $zastava2++;
          if($zastava2==3){
          echo "Tacka se nalazi unutar geometrijske figure";
          die();}
        }
}}}

$tacka1 = new Tacka(3, 3);
$tacka2 = new Tacka(7, 7);
$tacka3 = new Tacka(12, 4);
$trougao = new Trougao($tacka1, $tacka2, $tacka3);

$tacka = new Tacka(3,3);
$tacka->uTrouglu($trougao);

?>
