#!/usr/bin/php
<?php
$i = 0;
$a = array();
while($i++ < $argc - 1)
{
    $argv[$i] = trim($argv[$i]);
    while(strpos($argv[$i], "  "))
        $argv[$i] = str_replace("  ", " ", $argv[$i]);
    $tmp = explode(" ", $argv[$i]);
    $a = array_merge($a, $tmp);
}
$i1 = 0;
$s1 = 0;
$i2 = 0;
$s2 = 0;
$j = 0;
sort($a, SORT_STRING | SORT_FLAG_CASE);
foreach($a as $tmp)
{
	if (ctype_alpha($tmp))
	{
		if (!$s1)
			$s1 = $j;
		$i1++;
	}
	if (ctype_digit($tmp))
	{
		if (!$s2)
			$s2 = $j;
		$i2++;
	}
	$j++;
}
$alpha = array_slice($a, $s1, $i1);
$number = array_slice($a, $s2, $i2);
$tri = array_merge($alpha, $number);
$a = array_diff($a, $tri);
$tri = array_merge($tri, $a);
foreach($tri as $tmp)
	echo $tmp."\n";
?>