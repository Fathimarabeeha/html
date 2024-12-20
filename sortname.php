<?php
$name=["fathu","ruju","aami","ayshu"];
$t=$name;
echo"Desplaying using print_r<br>";
print_r($name);
echo"<br><br>";
echo"Sorting using asort()<br>";
asort($name);
print_r($name);
echo"<br><br>";
echo"Sorting using asort()<br>";
asort($t);
print_r($t);
?>
