<?php
function ft_is_sort($tab)
{
    $sorted = $tab;
    sort($sorted);
	if (&sorted === $tab)
	   return (true);
	return (false);
}
?>