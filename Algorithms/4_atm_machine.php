<?php 
interface AtmState{
	function insertCard();
	function ejectCard();
	function insertPin($pinEntered);
	function requestCash($cashWithdraw);
}

class HasCard implements AtmState{
	private $atmMachine;

	function __construct($newAtmMachine){
		$this->atmMachine= $newAtmMachine;
	}

	function insertCard(){
		echo "Aready has a card inserted.<br>";
	}
	function ejectCard(){
		echo "Card ejected. <br>";
		$this->atmMachine->setAtmState($this->atmMachine->getNoCardState());
	}
	function insertPin($pinEntered){
		if ($pinEntered==1234) {
			echo "correct pin. <br>";
			$this->atmMachine->correctPinEntered=true;
			$this->atmMachine->setAtmState($this->atmMachine->getHasPin());
		}else{
			echo "Incorrect pin. <br>";
			$this->atmMachine->correctPinEntered=false;
			echo "Card ejected. <br>";
			$this->atmMachine->setAtmState($this->atmMachine->getNoCardState());
		}
	}
	function requestCash($cashWithdraw){
		echo "enter pin first. <br>";
	}
}

class NoCard implements AtmState{
	private $atmMachine;

	function __construct($newAtmMachine){
		$this->atmMachine= $newAtmMachine;
	}

	function insertCard(){
		echo "Card inserted.<br>Enter pin.<br>";
		$this->atmMachine->setAtmState($this->atmMachine->getHasCardState());
	}
	function ejectCard(){
		echo "No card to eject. <br>";
	}
	function insertPin($pinEntered){
		echo "Insert card first. <br>";
	}
	function requestCash($cashWithdraw){
		echo "enter card first. <br>";
	}
}

class HasPin implements AtmState{
	private $atmMachine;

	function HAsPin($newAtmMachine){
		$this->atmMachine= $newAtmMachine;
	}

	function insertCard(){
		echo "Card already inserted.<br>Enter pin.<br>";
	}
	function ejectCard(){
		echo "Card ejected. <br>";
		$this->atmMachine->setAtmState($this->atmMachine->getNoCardState());
	}
	function insertPin($pinEntered){
		echo "Pin already entered. <br>";
	}
	function requestCash($cashWithdraw){
		if ($cashWithdraw>$this->atmMachine->cashInMachine) {
				echo "money out of reach.<br> Card ejected. <br>";
				$this->atmMachine->setAtmState($this->atmMachine->getNoCashState());
		}else{
			echo $cashWithdraw." is withdrawn.<br> ";
			$this->atmMachine->setCashInMachine($this->atmMachine->cashInMachine - $cashWithdraw);
			echo  "Card ejected. <br>";
				$this->atmMachine->setAtmState($this->atmMachine->getNoCardState());
				if ($this->atmMachine->cashInMachine <= 0) {
					$this->atmMachine->setAtmState($this->atmMachine->getNoCashState());
				}
		}
	}
}
class NoMoney implements AtmState{
	private $atmMachine;

	function __construct($newAtmMachine){
		$this->atmMachine= $newAtmMachine;
	}

	function insertCard(){
		echo "The atm is out of money.<br><br>";
	}
	function ejectCard(){
		echo "The atm is out of money.<br>No card entered.<br>";
	}
	function insertPin($pinEntered){
		echo "The atm is out of money.<br><br>";
	}
	function requestCash($cashWithdraw){
		echo "The atm is out of money.<br><br>";
	}
}
/**
* AtmMachine class
*/
class AtmMachine
{
	private $hasCard;
	private $noCard;
	private $hasCorrectPin;
	private $atmOutOfMoney;
	private $atmState;
	public $cashInMachine= 1000;
	public $correctPinEntered = false;
	function __construct()
	{
		$this->hasCard= new HasCard($this);
		$this->noCard= new NoCard($this);
		$this->hasCorrectPin= new HasPin($this);
		$this->atmOutOfMoney= new NoMoney($this);
		$this->atmState= $this->noCard;
		if ($this->cashInMachine < 0) {
				$this->atmState = $atmOutOfMoney;
		}

	}
	public function setAtmState($newAtmState)
	{
		$this->atmState= $newAtmState;
	}
	public function setCashInMachine($newCashInMachine)
	{
		$this->cashInMachine= $newCashInMachine;
	}
	public function insertCard(){
		$this->atmState->insertCard();
	}
	public function ejectCard(){
		$this->atmState->ejectCard();
	}
	public function requestCash($cashWithdraw){
		$this->atmState->requestCash($cashWithdraw);
	}
	public function insertPin($pinEntered){
		$this->atmState->insertPin($pinEntered);
	}


	public function getHasCardState(){
		return $this->hasCard;
	}
	public function getNoCardState(){
		return $this->noCard;
	}
	public function getHasPin(){
		return $this->hasCorrectPin;
	}
	public function getNoCashState(){
		return $this->atmOutOfMoney;
	}
}
$atmMachine= new AtmMachine;
echo "<pre>";
var_dump($atmMachine);
$atmMachine->insertCard();
var_dump($atmMachine);
$atmMachine->ejectCard();
var_dump($atmMachine);
$atmMachine->insertCard();
var_dump($atmMachine);
$atmMachine->insertPin(1234);
var_dump($atmMachine);
$atmMachine->requestCash(1000);
var_dump($atmMachine);
$atmMachine->insertCard();
var_dump($atmMachine);
$atmMachine->insertPin(1234);
?>