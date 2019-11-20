#!/usr/bin/php
<?php
while(!feof(STDIN))
{
	echo "Entrez un nombre: ";
	$n = trim(fgets(STDIN));
	if(feof(STDIN))
		echo "\n";
	else if(is_numeric($n))
	{
		if($n % 2 == 0)
			 echo "Le chiffre $n est Pair\n";
		else
			 echo "Le chiffre $n est Impair\n";
	}
	else
		echo "'$n' n'est pas un chiffre\n";
}
?>