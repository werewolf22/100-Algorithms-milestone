<?php
abstract class EnemyShip
{
	private $name;
	private $amtDamage;
	Private $level;

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
    protected function _setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of amtDamage.
     *
     * @return mixed
     */
    public function getAmtDamage()
    {
        return $this->amtDamage;
    }

    /**
     * Sets the value of amtDamage.
     *
     * @param mixed $amtDamage the amt damage
     *
     * @return self
     */
    protected function _setAmtDamage($amtDamage)
    {
        $this->amtDamage = $amtDamage;

        return $this;
    }

    /**
     * Gets the value of level.
     *
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Sets the value of level.
     *
     * @param mixed $level the amt damage
     *
     * @return self
     */
    protected function _setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    public function enemyAppear()
    {
    	echo $this->getName()." appears.<br>";
    }
    public function enemyFollowHero()
    {
    	echo $this->getName()." follows.<br>";
    }
    public function enemyAttack()
    {
    	echo $this->getName()." attacks.<br>";
    }
}
/**
* derived of EnemyShip
*/
class AeroplaneEnemyship extends EnemyShip
{
	
	function __construct()
	{
		$this->_setName("Aeroplane Enemyship");
		$this->_setAmtDamage(20.5);
		$this->_setLevel(1);
	}
}
/**
* derived of EnemyShip
*/
class RocketEnemyship extends EnemyShip
{
	
	function __construct()
	{
		$this->_setName("Rocket Enemyship");
		$this->_setAmtDamage(41.0);
		$this->_setLevel(2);
	}
}
/**
* factory that has bussiness logic
*/
class EnemyshipFactory
{
	private $level;
	function __construct($level)
	{
		$this->level=$level;
	}
	public function makeEnemyShip()
	{
		if ($this->level==1) {
			return new AeroplaneEnemyship;
		}elseif ($this->level==2) {
			return new RocketEnemyship;
		}
	}
}
$player1= new EnemyshipFactory(1);
$game=$player1->makeEnemyShip();
$game->enemyAppear();
$game->enemyFollowHero();
$game->enemyAttack();
$player2= new EnemyshipFactory(2);
$game=$player2->makeEnemyShip();
$game->enemyAppear();
$game->enemyFollowHero();
$game->enemyAttack();
?>