<?php
function ft_split($s) {
	$a = explode(" ", $s);
    $a = array_filter($a);
    sort($a);
	return ($a);
}
?>