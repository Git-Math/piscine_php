<?php
	class Jaime extends Lannister
	{
		public function sleepWith($x)
		{
			if ($x instanceof Cersei)
				echo "With pleasure, but only in a tower in Winterfell, then.\n";
			else
				parent::sleepWith($x);
		}
	}

?>