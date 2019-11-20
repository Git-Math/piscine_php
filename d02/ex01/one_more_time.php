#!/usr/bin/php
<?php
if ($argc != 2)
    return 0;
$nb = preg_match_all("/ /", $argv[1]);
$tab = explode(" ", $argv[1]);
if (count($tab) != 5)
{
    echo "Wrong Format\n";
    return 0;
}
$nb = 0;
if (!preg_match("/\bLundi\b|\blundi\b|\bMardi\b|\bmardi\b|\bMercredi\b|\bmercredi\b|\bJeudi\b|\bjeudi\
\b|\bVendredi\b|\bvendredi\b|\bSamedi\b|\bsamedi\b|\bDimanche\b|\bdimanche\b/", $tab[0]))
{
    echo "Wrong Format\n";
   return 0;
}
if ($tab[1] < 1 || $tab[1] > 31 || !ctype_digit($tab[1]))
{
    echo "Wrong Format\n";
    return 0;
}
$nb = 0;
if (!preg_match_all("/\bJanvier\b|\bjanvier\b|\bFevrier\b|\bfevrier\b|\bMars\b|\bmars\b|\bAvril\b|\ba\
vril\b|\bMai\b|\bmai\b|\bJuin\b|\bjuin\b|\bJuillet\b|\bjuillet\b|\bAout\b|\baout\b|\bSeptembre\b|\bse\
ptembre\b|\bOctobre\b|\boctobre\b|\bNovembre\b|\bnovembre\b|\bDecembre\b|\bdecembre\b/", $tab[2]))
{
    echo "Wrong Format\n";
   return 0;
}

if ($tab[3] < 1970 || strlen($tab[3]) != 4 || !ctype_digit($tab[3]))
{
    echo "Wrong Format\n";
    return 0;
}
$nb = preg_match_all("/:/", $tab[4]);
if ($nb != 2)
{
    echo "Wrong Format\n";
   return 0;
}
$tbh = explode(":", $tab[4]);
if (count($tbh) != 3)
{
    echo "Wrong Format\n";
   return 0;
}
if ($tbh[0] < 0 || $tbh[0] > 23 || strlen($tbh[0]) != 2 || !ctype_digit($tbh[0]))
{
    echo "Wrong Format\n";
   return 0;
}
if ($tbh[1] < 0 || $tbh[1] > 59 || strlen($tbh[1]) != 2 || !ctype_digit($tbh[1]))
{
    echo "Wrong Format\n";
   return 0;
}
if ($tbh[2] < 0 || $tbh[2] > 59 || strlen($tbh[2]) != 2 || !ctype_digit($tbh[2]))
{
    echo "Wrong Format\n";
   return 0;
}
date_default_timezone_set('Europe/Paris');
if ($tab[2] =="janvier" || $tab[2] == "Janvier")
    $n = 1;
else if ($tab[2] =="fevrier" || $tab[2] == "Fevrier")
    $n = 2;
else if ($tab[2] =="mars" || $tab[2] == "Mars")
    $n = 3;
else if ($tab[2] =="avril" || $tab[2] == "Avril")
    $n = 4;
  else if ($tab[2] =="mai" || $tab[2] == "Mai")
    $n = 5;
else if ($tab[2] =="juin" || $tab[2] == "Juin")
    $n = 6;
else if ($tab[2] =="juillet" || $tab[2] == "Juillet")
    $n = 7;
else if ($tab[2] =="aout" || $tab[2] == "Aout")
    $n = 8;
else if ($tab[2] =="septembre" || $tab[2] == "Septembre")
    $n = 9;
else if ($tab[2] =="octobre" || $tab[2] == "Octobre")
    $n = 10;
else if ($tab[2] =="novembre" || $tab[2] == "Novembre")
    $n = 11;
else if ($tab[2] =="decembre" || $tab[2] == "Decembre")
    $n = 12;
if (!checkdate($n, $tab[1], $tab[3]))
{
    echo "Wrong Format\n";
   return 0;
}
echo mktime($tbh[0],$tbh[1],$tbh[2],$n,$tab[1],$tab[3]). "\n";
?>