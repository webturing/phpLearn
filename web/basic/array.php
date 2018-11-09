<?php
function disp($arr)
{
    foreach ($arr as $value) {
        echo $value . " ";
    }
    echo "<br>";
}

$a = array(1, 2, 3, 4, 5);
disp($a);
for ($i = 10; $i <= 20; $i++)
    array_push($a, $i);
disp($a);
?>