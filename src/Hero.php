<?php

namespace HeroGame;

class Hero extends Player{

    private $rapidStrikeChance, $magicShieldChance;

    public function __construct($name, $type, $charStats)
    {
        parent::__construct($name, $type, $charStats);
        echo "EMAG (Hero) created!<br>";
        $this->rapidStrikeChance = 10;
        $this->magicShieldChance = 20;
    }

    public function setChance($int, $skill)
    {
        $this->$skill = (int) $int;
    }

    //RapidStrike makes the Hero attack twice (same chances apply for defense on each attack but cannot attack more than twice)
    public function RapidStrike()
    {
        $skill_chance = rand(0, 100);

        if( $skill_chance <= $this->rapidStrikeChance ){

            echo "<b>Rapid Strike</b> was used! (Hero attacks twice)<br><br>";

            return true;

        } else return false;
    }

    //MagicShield absorbs half of the damage taken by the Hero
    public function MagicShield($damage){

        $skill_chance = rand(0, 100);
        
        if( $skill_chance <= $this->magicShieldChance ){

            echo "<b>Magic Shield</b> was used! (Hero takes twice less DAMAGE)<br>";

            return $damage/2;
        } else return $damage;
    }

}