<?php
	class NightsWatch implements IFighter
	{
		public static $tab = array ();
		public function recruit($f)
		{
			self::$tab[] = $f;
		}
		public function fight()
		{
			foreach (self::$tab as $val)
				if (method_exists($val, "fight"))
					echo $val->fight();
		}
	}
?>