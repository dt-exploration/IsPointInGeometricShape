<?php

///unesi tacku
$x = 2;
$y = 9;

///unesi tacke figure
$x_t1 = 1.8;  $y_t1 = 4;
$x_t2 = 7;    $y_t2 = 4;
$x_t3 = 1.8;  $y_t3 = 8;

if ($x_t1 >= $x_t2 && $x_t1 >= $x_t3) {
    $max_x = $x_t1;
    if ($x_t2 <= $x_t3) {
        $min_x = $x_t2;
    }
    else {
        $min_x = $x_t3;
    }
}

else if ($x_t2 >= $x_t1 && $x_t2 >= $x_t3) {
    $max_x = $x_t2;
    if ($x_t1 <= $x_t3) {
        $min_x = $x_t1;
    }
    else {
        $min_x = $x_t3;
    }
}

else {
    $max_x = $x_t3;
    if ($x_t1 <= $x_t2) {
        $min_x = $x_t1;
    } else {
        $min_x = $x_t2;
    }
}
//tacka y
if ($y_t1 >= $y_t2 && $y_t1 >= $y_t3) {
    $max_y = $y_t1;
    if ($y_t2 >= $y_t3) {
        $min_y = $y_t3;
    } else {
        $min_y = $y_t2;
    }
}

else if ($y_t2 >= $y_t1 && $y_t2 >= $y_t3) {
    $max_y = $y_t2;
    if ($y_t1 >= $y_t3) {
      $min_y = $y_t3;
    } else {
      $min_y = $y_t1;
    }
}

else {
    $max_y = $y_t3;
    if ($y_t1 <= $y_t2) {
        $min_y=$y_t1;
    } else {
        $min_y = $y_t2;
    }
}


if (($x > $max_x or $x < $min_x) or ($y > $max_y or $y < $min_y)) {
    echo "Tacka se nalazi van geometrijske figure.";
    die();
}

$flag = 0;
$flagg = 0;
if ($y_t2-$y_t1 == 0 or $y_t3-$y_t1==0 or $y_t3-$y_t2==0) {
    $flag = 1;
    $flagg = 1;
}

if ($x_t2-$x_t1 == 0 or $x_t3-$x_t1 == 0 or $x_t3-$x_t2 == 0) {
    $flag = 2;
    if ($flagg == 1) {
        $flag = 3;
    }
}

switch($flag) {
///////////////////////////////////////////////////////////////////////
case 0:
$x_presek1 = (($y-$y_t1) / (($y_t2-$y_t1) / ($x_t2-$x_t1))) + $x_t1;
$x_presek2 = (($y-$y_t1) / (($y_t3-$y_t1) / ($x_t3-$x_t1))) + $x_t1;
$x_presek3 = (($y-$y_t2) / (($y_t3-$y_t2) / ($x_t3-$x_t2))) + $x_t2;

if ($x_presek1 > $max_x or $x_presek1 < $min_x) {
    $niz=array($x_presek2, $x_presek3);
    sort($niz);
}
else if ($x_presek2 > $max_x or $x_presek2 < $min_x) {
    $niz = array($x_presek1,$x_presek3);
    sort($niz);
}
else {
    $niz = array($x_presek1, $x_presek2);
    sort($niz);
}

if ($x >= $niz[0] and $x <= $niz[1] ) {
    echo "Tacka se nalazi unutar geometrijske figure.";
    die();
}
else {
    echo "Tacka se nalazi van geometrijske figure.";
}

break;
////////////////////////////////////////////////////////////////////////////
case 1:

if ($y_t2-$y_t1 == 0) {
    $niz = array($x_t2, $x_t1);
    sort($niz);
    $zastava = 1332;
}
else if ($y_t3-$y_t1 == 0) {
    $niz = array($x_t3, $x_t1);
    sort($niz);
    $zastava = 2123;
}
else {
    $niz = array($x_t3, $x_t2);
    sort($niz);
    $zastava = 1213;
}

$zastava_1 = false;
if ($y == $y_t1 or $y == $y_t2 or $y == $y_t3) {
    $zastava_1 = true;
}

if ($zastava_1) {
    if ($x >= $niz[0] and $x <= $niz[1] ) {
        echo "Tacka se nalazi unutar geometrijske figure.";
        die();
    }
    else {
        echo "Tacka se nalazi van geometrijske figure.";
        die();
    }
}

else {
    switch($zastava) {
    case 1213:
    $x_presek1 = (($y - $y_t1) / (($y_t2 - $y_t1) / ($x_t2 - $x_t1))) + $x_t1;
    $x_presek2 = (($y - $y_t1) / (($y_t3 - $y_t1) / ($x_t3 - $x_t1))) + $x_t1;
    $niz = array($x_presek1, $x_presek2);
    sort($niz);
    break;

  case 2123:
  $x_presek1 = (($y-$y_t1)/(($y_t2-$y_t1)/($x_t2-$x_t1)))+$x_t1;
  $x_presek3 = (($y-$y_t2)/(($y_t3-$y_t2)/($x_t3-$x_t2)))+$x_t2;
  $niz = array($x_presek1,$x_presek3);
  sort($niz);
  break;

  case 1332:
  $x_presek2=(($y-$y_t1)/(($y_t3-$y_t1)/($x_t3-$x_t1)))+$x_t1;
  $x_presek3=(($y-$y_t2)/(($y_t3-$y_t2)/($x_t3-$x_t2)))+$x_t2;
  $niz=array($x_presek1,$x_presek3);
  sort($niz);
  break;
}

if($x>=$niz[0] and $x<=$niz[1] )
{
echo "Tacka se nalazi unutar geometrijske figure.";
die();
}
else{
  echo "Tacka se nalazi van geometrijske figure.";
die();
}

}

break;
////////////////////////////////////////////////////////////////////////////////////////////
case 2:

if($x_t2-$x_t1==0){

  $niz=array($y_t2,$y_t1);
  sort($niz);
  $zastava=1332;
}
else if($x_t3-$x_t1==0){

  $niz=array($y_t3,$y_t1);
  sort($niz);
  $zastava=2123;
}
else{
  $niz=array($y_t3,$y_t2);
  sort($niz);
  $zastava=1213;
}

$zastava_1=false;
if($x==$x_t1 or $x==$x_t2 or $x==$x_t3){
  $zastava_1=true;
}

if($zastava_1){

  if($y>=$niz[0] and $y<=$niz[1] )
  {
  echo "Tacka se nalazi unutar geometrijske figure.";
  die();
  }
  else{
    echo "Tacka se nalazi van geometrijske figure.";
  die();
}
  }

else{
  switch($zastava){
    case 1213:
    $y12=(($y_t2-$y_t1)/($x_t2-$x_t1))*($x-$x_t1)+$y_t1;
    $y13=(($y_t3-$y_t1)/($x_t3-$x_t1))*($x-$x_t1)+$y_t1;
    $niz=array($y12,$y13);
    sort($niz);
    break;

    case 2123:
    $y21=(($y_t2-$y_t1)/($x_t2-$x_t1))*($x-$x_t1)+$y_t1;
    $y23=(($y_t3-$y_t2)/($x_t3-$x_t2))*($x-$x_t2)+$y_t2;
    $niz=array($y21,$y23);
    sort($niz);
    break;

    case 1332:
    $y13=(($y_t3-$y_t1)/($x_t3-$x_t1))*($x-$x_t1)+$t_t1;
    $y32=(($y_t2-$y_t3)/($x_t2-$x_t3))*($x-$x_t3)+$t_t3;
    $niz=array($y13,$y32);
    sort($niz);
    break;
  }
  if($y>=$niz[0] and $y<=$niz[1] )
  {
  echo "Tacka se nalazi unutar geometrijske figure.";
  die();
  }
  else{
    echo "Tacka se nalazi van geometrijske figure.";
  die();
  }
}

break;
////////////////////////////////////////////////////////////////////////////////
case 3:
if ($y_t2 - $y_t1 == 0){

  $niz = array($x_t2, $x_t1);
  sort($niz);
  $zastava="12";
}
else if ($y_t3 - $y_t1 == 0){

  $niz = array($x_t3, $x_t1);
  sort($niz);
  $zastava = "13";
}
else {
  $niz = array($x_t3, $x_t2);
  sort($niz);
  $zastava = "23";
}

$zastava_1 = false;
if ($y==$y_t1 or $y==$y_t2 or $y==$y_t3) {
    $zastava_1=true;
}

if ($zastava_1) {
if ($x >= $niz[0] and $x <= $niz[1] )
{
    echo "Tacka se nalazi unutar geometrijske figure.";
    die();
}
else {
  echo "Tacka se nalazi van geometrijske figure.";
  die();}
}

if ($x_t2 - $x_t1 == 0){

  $niz = array($y_t2, $y_t1);
  sort($niz);
  if($zastava = "13") {
      $hipotenuza=23;
  }
  else {
      $hipotenuza=13;};
  }
        
else if ($x_t3-$x_t1 == 0){

  $niz = array($y_t3,$y_t1);
  sort($niz);
  if ($zastava="12"){$hipotenuza=23;}
  else{$hipotenuza=13;};
}
else{
  $niz=array($y_t3,$y_t2);
  sort($niz);
  if($zastava="12"){$hipotenuza=13;}
  else{$hipotenuza=12;};
}

$zastava_1=false;
if($x==$x_t1 or $x==$x_t2 or $x==$x_t3){
  $zastava_1=true;
}

if($zastava_1){

  if($y>=$niz[0] and $y<=$niz[1] )
  {
  echo "Tacka se nalazi unutar geometrijske figure.";
  die();
  }
  else{
    echo "Tacka se nalazi van geometrijske figure.";
  die();}
  }

switch($hipotenuza){

case 12:
$x_presek=(($y-$y_t1)/(($y_t2-$y_t1)/($x_t2-$x_t1)))+$x_t1;
$niz=array($x_presek,$min_x);
sort($niz);
break;

case 13:
$x_presek=(($y-$y_t1)/(($y_t3-$y_t1)/($x_t3-$x_t1)))+$x_t1;
$niz=array($x_presek,$min_x);
sort($niz);
break;

case 23:
$x_presek=(($y-$y_t2)/(($y_t3-$y_t2)/($x_t3-$x_t2)))+$x_t2;
$niz=array($x_presek,$min_x);
sort($niz);
break;
}

if($x>=$niz[0] and $x<=$niz[1] )
{
echo "Tacka se nalazi unutar geometrijske figure.";
die();
}

else
{
echo "Tacka se nalazi van geometrijske figure.";
die();
}

break;
}

 ?>
