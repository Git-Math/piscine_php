#!/usr/bin/php
<?php
if ($argc != 4)
   echo "Incorrect Parameters\n";
else
{
	$i = 1;
	while ($i < 4)
	{
		$argv[$i] = trim($argv[$i]);
    	while(strpos($argv[$i], " "))
        	$argv[$i] = str_replace(" ", "", $argv[$i]);
    	$i++;
	}
	if ($argv[2] == "+")
			echo $argv[1] + $argv[3] . "\n";
	else if ($argv[2] == "-")
            echo $argv[1] - $argv[3] . "\n";
	else if ($argv[2] == "*")
            echo $argv[1] * $argv[3] . "\n";
	else if ($argv[2] == "/")
            echo $argv[1] / $argv[3] . "\n";
	else if ($argv[2] == "%")
            echo $argv[1] % $argv[3] . "\n";
}
?>