<?php
/**
* singleton implementation in class 
*/
class singleton
{
	private $property= "i am the singleton. <br>";
	private static $firstinstance= false;
	public static function getSingleton()
	{
		if (!self::$firstinstance) {
			self::$firstinstance = new singleton;
		}
		return  self::$firstinstance; 
	}
	

    /**
     * Gets the value of property.
     *
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Sets the value of property.
     *
     * @param mixed $property the property
     *
     * @return self
     */
    public function _setProperty($property)
    {
        $this->property = $property;

        return $this;
    }

}
$instance = singleton::getSingleton();
echo $instance->getProperty();
$instance->_setProperty("i am the singleton again.<br>");
$instance1 = singleton::getSingleton();
echo $instance->getProperty();
var_dump($instance);
echo "<br>";
var_dump($instance1);
?>