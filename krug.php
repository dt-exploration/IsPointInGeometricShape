<?php

class tacka
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
      $this->x=$x;
      $this->y=$y;
    }

    public function uKruznici($kruznica)
    {
        $x=$kruznica->getCo("x");
        $y=$kruznica->getCo("y");
        $d=$kruznica->getPoluprecnik();
        $r=sqrt(($this->y-$y)**2+($this->x-$x)**2);

        if ($r > $d) {
            echo "VAN";

        }   else if ($r == $d) {
            echo "Tacka je na kruznici";

        }   else {
            echo "Tacka je unutra";
        }
    }
}

class kruznica
{
    private $r;
    private $x;
    private $y;

    public function __construct($x, $y, $r)
    {
        $this->r=$r;
        $this->x=$x;
        $this->y=$y;
    }

    public function getCo($param)
    {
        if ($param == "x") {
            return $this->x;
        }   else {
            return $this->y;
        }
    }

    public function getPoluprecnik()
    {
        return $this->r;
    }
}

$tackica=new tacka(6, 8.97);
$kruznica=new kruznica(6, 9, 5);

$tackica->uKruznici($kruznica);

?>
