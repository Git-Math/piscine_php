#!/usr/bin/php
<?php 
function    clear_space($s)
{
	while (strpos($s, ' ') !== false)
	{
	if (strpos($s, ' ') !== false)
	   $s = str_replace(' ', '', $s);
	}
	return ($s);
}
if ($argc != 2)
   print("Incorrect Parameters\n");
else
{
	$s = clear_space($argv[1]);
	if (strpos($s, '+', 1) !== FALSE)
        $ope = strpos($s, '+', 1);
	else if (strpos($s, '-', 1) !== FALSE)
		$ope = strpos($s, '-', 1);
	else if (strpos($s, '/', 1) !== FALSE)
		$ope = strpos($s, '/', 1);
	else if (strpos($s, '%', 1) !== FALSE)
		$ope = strpos($s, '%', 1);
	else if (strpos($s, '*', 1) !== FALSE)
        $ope = strpos($s, '*', 1);
    if (!$ope)
        {
            print("Syntax error\n");
            exit();
        }
    $numbers[0] = substr($s, 0, $ope);
    $numbers[1] = substr($s, $ope + 1, strlen($s) - $ope);
    $ope = $s{$ope};
    foreach ($numbers as $el)
    {
        if (!is_numeric($el))
        {
            print("Syntax error\n");
            exit();
        }
    }
    if ($ope == '+')
        echo($numbers[0] + $numbers[1]);
    else if ($ope == '-')
        echo($numbers[0] - $numbers[1]);
    else if ($ope == '*')
        echo($numbers[0] * $numbers[1]);
    else if ($ope == '/')
        echo($numbers[0] / $numbers[1]);
    else if ($ope == '%')
        echo($numbers[0] % $numbers[1]);
    echo("\n");
}
?>