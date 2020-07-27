<?php

namespace HeroGame;

class Player{
    private $name, $type, $health, $strength, $defence, $speed, $luck;

    public function __construct($name, $type, $charStats)
    {
        
        $this->name = $name;
        $this->type = $type;
        $this->health = $charStats["health"];
        $this->strength = $charStats["strength"];
        $this->defence = $charStats["defence"];
        $this->speed = $charStats["speed"];
        $this->luck = $charStats["luck"];
        
    }

    public function setHealth($int)
    {
        $this->health = (int) $int;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getDefence()
    {
        return $this->defence;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getLuck()
    {
        return $this->luck;
    }

    public function showStats()
    {
        return $this->name." stats: HP: ".$this->health."; STR: ".$this->strength."; DEF: ".$this->defence."; SPD: ".$this->speed."; LUCK: ".$this->luck.";<br><br>";
    }

    public function attack($defender)
    {
        
        $damage = $this->getStrength() - $defender->getDefence();
        $def_health = $defender->getHealth();

		echo $this->getName()." attacks ".$defender->getName()." with ".$damage." DMG<br>";

        if( $defender->getType() == "beast" ){
            if( $this->RapidStrike() && $this->defend($defender) ) $defender->setHealth($defender->getHealth() - $damage);
            if( $this->defend($defender) ) $defender->setHealth($defender->getHealth() - $damage);
        }else {
            $damage = $defender->MagicShield($damage);
            if( $this->defend($defender) ) $defender->setHealth($defender->getHealth() - $damage);
        }

        echo $defender->getName()." HP: ".$defender->getHealth()."<br><br>";

    }

    public function defend($defender){
        $defender_luck_chance = rand(0,100);
        
        if($defender_luck_chance <= $defender->getLuck())
        {
            echo $defender->getName()." was lucky! ".$this->getName()." attack missed!<br><br>";
            return false;
        }
        else 
        {
            echo $this->getName()." attack hit!<br><br>";
            return true;
        }
    }

}
