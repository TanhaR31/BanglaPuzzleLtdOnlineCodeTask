<?php
echo "Problem Solving 2<br/><br/>";
$a = 5;
$b = 10;
echo "Before Swapping Var a=".$a.", Var b=".$b."<br>";

echo "<br>1st Method<br>";
$a=$a+$b;
$b=$a-$b;
$a=$a-$b;
echo "After Swapping Var a=".$a.", Var b=".$b."<br>";

echo "<br>2nd Method<br>";
$a = 5;
$b = 10;
list($a, $b) = array($b, $a);
echo "After Swapping Var a=".$a.", Var b=".$b."<br>";
?>