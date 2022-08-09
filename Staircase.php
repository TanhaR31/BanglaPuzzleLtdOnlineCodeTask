<?php
echo "Task_1<br/><br/>";
function Staircase($N)
{
    for ($i = 1; $i <=$N ; $i++)
    {
        $hash = 0;
        while ($hash < $i)
        {
            echo "#";
            $hash++;
        }
        echo "<br/>";
    }
}
Staircase(5);
?>