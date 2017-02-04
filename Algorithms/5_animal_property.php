<?php 
	 class animal{
	private $name;
	private $height;
	private $weight;
	private $favFood;
	private $speed;
	private $sound;
	public $flyability;

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    private function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of height.
     *
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Sets the value of height.
     *
     * @param mixed $height the height
     *
     * @return self
     */
    private function _setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Gets the value of weight.
     *
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Sets the value of weight.
     *
     * @param mixed $weight the weight
     *
     * @return self
     */
    private function _setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Gets the value of favFood.
     *
     * @return mixed
     */
    public function getFavFood()
    {
        return $this->favFood;
    }

    /**
     * Sets the value of favFood.
     *
     * @param mixed $favFood the fav food
     *
     * @return self
     */
    private function _setFavFood($favFood)
    {
        $this->favFood = $favFood;

        return $this;
    }

    /**
     * Gets the value of speed.
     *
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Sets the value of speed.
     *
     * @param mixed $speed the speed
     *
     * @return self
     */
    private function _setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Gets the value of sound.
     *
     * @return mixed
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * Sets the value of sound.
     *
     * @param mixed $sound the sound
     *
     * @return self
     */
    protected function _setSound($sound)
    {
        $this->sound = $sound;

        return $this;
    }
    public function tryTofly(){
    	$this->flyability->fly();
    }

}
interface flies{
	public function fly();
}
class canFly implements flies{
	public function fly(){
		echo "i can fly.<br>";

	}
}
class cantFly implements flies{
	public function fly(){
		echo "i can not fly.<br>";

	}
}
/**
* derived class of animal
*/
class cat extends animal
{
	
	function __construct()
	{
		$this->_setSound("meow meow!!<br>");
		$this->flyability= new cantFly;
	}
}
/**
* derived class of animal that can fly
*/
class bird extends animal
{
	
	function __construct()
	{
		$this->_setSound("chrip chrip!!");
		$this->flyability = new canFly;
	}
}
$biralo = new cat;
echo "cat: ";
$biralo->tryTofly();
echo $biralo->getSound();
$pigeon = new bird;
echo "pigeon: ";
$pigeon->tryTofly();
echo $pigeon->getSound();



?>