<?php
date_default_timezone_set('America/Tegucigalpa');




$f_a = date('H:i:s', time());

$f_i = date('06:00:00', time());

$f_f = date('18:00:00', time());

echo $f_a;

if ($f_a<$f_f && $f_a>$f_i) {
    echo "Estas en horario";
    # code...
}else  {
    # code...
    echo "No estas en el tiempo aceptado";
}


?>
