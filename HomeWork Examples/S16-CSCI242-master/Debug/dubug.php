<form method="POST">
    <input type="text" name="number"/>
    <button type="submit">Submit</button>
</form>

<?php

$number = $_POST["number"];

for($ct = 0 ; $ct < $number ; $ct++)
{
    echo " $ct ";
    
    if($ct % 3 == 0)
    {
        echo " Pop ";
    }
}