<?PHP

class color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = false;

	function __construct(array $kwargs) 
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$kwargs['rgb'] = (int)$kwargs['rgb'];
			$this->red = ($kwargs['rgb'] >> 16) & 255;
			$this->green = ($kwargs['rgb'] >> 8) & 255;
			$this->blue = $kwargs['rgb'] & 255;
		}
		else if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs))
		{
			$kwargs['red'] = (int)$kwargs['red'];
			$kwargs['green'] = (int)$kwargs['green'];
			$kwargs['blue'] = (int)$kwargs['blue'];
			$this->red = $kwargs['red'];
			$this->green = $kwargs['green'];
			$this->blue = $kwargs['blue'];
		}
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		return;
	}

	public function __toString()
	{
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	public static function doc() 
	{
		if (file_exists("Color.doc.txt"))
			return file_get_contents("Color.doc.txt");
		else
			return false;
	}

	public function add(Color $rhs) 
	{
		return new Color(array("red" => $this->red + $rhs->red, "green" =>  $this->green + $rhs->green, "blue" =>  $this->blue + $rhs->blue));
	}

	public function sub(Color $rhs) 
	{
		return new Color(array("red" => $this->red - $rhs->red, "green" =>  $this->green - $rhs->green, "blue" =>  $this->blue - $rhs->blue));
	}

	public function mult($f) 
	{
		return new Color(array("red" => $this->red * $f, "green" =>  $this->green * $f, "blue" =>  $this->blue * $f));
	}

	function __destruct() 
	{
		if (self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		return;
	}
}
?>