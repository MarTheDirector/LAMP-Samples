<?php
	
try
{
	$num1 = 10;
	$num2 = 0;
	
	$calc = $num1 + $num2;
	
	throw new MySQLException('Ouch!');
	
	$calc = $num1;
}
catch(MySQLException $ex)
{
	echo $calc;
	$calc = 10;
}

echo $calc;