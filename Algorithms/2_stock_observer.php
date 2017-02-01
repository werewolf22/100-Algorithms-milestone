<?php
/**
* strategy pattern
*/
class Subject
{
	private $changes=[];
	private $ibmprice;
	private $aplprice;

	    /**
     * Sets the value of ibmprice.
     *
     * @param mixed $ibmprice the ibmprice
     *
     * @return self
     */
    public function _setIbmprice($ibmprice)
    {
        $this->ibmprice = $ibmprice;
        $this->notifyObserver();
        return $this;
    }

    /**
     * Sets the value of aplprice.
     *
     * @param mixed $aplprice the aplprice
     *
     * @return self
     */
    public function _setAplprice($aplprice)
    {
        $this->aplprice = $aplprice;
        $this->notifyObserver();
        return $this;
    }
	public function register($observer)
	{
		$this->changes[]=$observer;

	}
	public function unRegister($remove)
	{
		if(($key=array_search($remove,$this->changes))){
				array_splice($this->changes,$key,1);
				echo "Observer".++$key."deleted.<br>";
			}
		}
	public function notifyObserver()
	{
		foreach ($this->changes as $change) {
			$change->update($this->ibmprice,$this->aplprice);
		}
	}
}
interface Observer{
	public function update($ibmprice,$aplprice);
}
/**
* dependencies of subject
*/
class StockObserver implements Observer{
	private $ibmprice;
	private $aplprice;
	private static $observerIdTracer=0;
	private $observerId;
	// private $stockGrabber;
	function __construct(/**$stockGrabber*/){

		// $this->stockGrabber=$stockGrabber; showed recursion in var_dump() due to iterative call of subject class
		$this->observerId=++self::$observerIdTracer;
		echo "New observer".$this->observerId;
		// var_dump($this->stockGrabber);
	}
	public function update($ibmprice=0.0,$aplprice=0.0)
	{
		$this->ibmprice = $ibmprice;
		$this->aplprice = $aplprice;
		$this->printPrices();
	}
	public function printPrices()
	{
		echo "<br>IBM: ".$this->ibmprice;
		echo "<br>APL: ".$this->aplprice,"<br>";
	}
}

$stockGrabber= new Subject;
$ovserver1= new StockObserver(/**$stockGrabber*/);
$stockGrabber->register($ovserver1);
$stockGrabber->_setAplprice(120.22);
$stockGrabber->_setIbmprice(125.05);
echo "<pre>";
var_dump($stockGrabber);



?>