#!/usr/bin/php
<?php
$handle = fopen($argv[1], "rw");
$content = fread($handle, filesize($argv[1]));
preg_match_all("#<a(.*?)/a>#si", $content, $m);
$i = 0;
while ($m[0][$i])
{
    preg_match_all("#>(.*?)<#s" , $m[0][$i], $link_content);
	for ($j = 0; $j < count($link_content[0]); $j++)
		$content = str_replace($link_content[0][$j], strtoupper($link_content[0][$j]), $content);
	$i++;
}
$i = 0;
while ($m[0][$i])
{
	preg_match_all('#title=(.+?)"#s', $m[0][$i], $title);
	for ($j = 0; $j < count($title[1]); $j++)
		$content = str_replace($title[1][$j], strtoupper($title[1][$j]), $content);
	$i++;
}
echo($content);
?>